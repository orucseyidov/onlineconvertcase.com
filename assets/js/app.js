
const textCaseInput   = document.getElementById("textCaseInput");


textCaseInput.addEventListener("input", function () {
    counter();    
});


function counter(){
    let characterCount  = document.getElementById("characterCount");
    let wordCount       = document.getElementById("wordCount");
    let lineCount       = document.getElementById("lineCount");

    let text = textCaseInput.value;
    // Character count
    characterCount.textContent = text.length;

    // Word count
    let words = text.split(/\s+/).filter(word => word.length > 0);
    wordCount.textContent = words.length;

    // Line count
    let lines = text === '' ? 0 : text.split('\n').length;
    lineCount.textContent = lines;
}


function toSentenceCase() {
  let text = textCaseInput.value;
  const sentences = text.toLowerCase().split('. ');

  const sentenceCaseSentences = sentences.map((sentence) => {
    if (sentence.length > 1) {
      return sentence.charAt(0).toUpperCase() + sentence.slice(1);
    } else {
      return sentence;
    }
  });

  let result = sentenceCaseSentences.join('. ');
  textCaseInput.value = result;
}


function toLowerCaseText() {
	let text = textCaseInput.value;
    textCaseInput.value = text.toLowerCase();
}


function toUpperCaseText() {
	let text = textCaseInput.value;
  	textCaseInput.value = text.toUpperCase();
}


function toCapitalizedCase() {
  let text = textCaseInput.value;
  const words = text.split(' ');

  const capitalizedWords = words.map((word) => {
    if (word.length > 1) {
      return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    } else {
      return word;
    }
  });
  textCaseInput.value = capitalizedWords.join(' ');
}


function toAlternatingCase() {
  let text = textCaseInput.value;
  let alternatingText = "";
  for (let i = 0; i < text.length; i++) {
    if (i % 2 === 0) {
      alternatingText += text[i].toUpperCase();
    } else {
      alternatingText += text[i].toLowerCase();
    }
  }
  textCaseInput.value = alternatingText;
}


function toTitleCase() {
  let text = textCaseInput.value;
  const words = text.toLowerCase().split(' ');

  const titleCaseWords = words.map((word) => {
    if (word.length > 1) {
      return word.charAt(0).toUpperCase() + word.slice(1);
    } else {
      return word;
    }
  });

  textCaseInput.value = titleCaseWords.join(' ');
}


function toInverseCase() {
	let text = textCaseInput.value;
	let inverseText = "";
	for (let i = 0; i < text.length; i++) {
	const char = text[i];
	if (char === char.toUpperCase()) {
	  inverseText += char.toLowerCase();
	} else {
	  inverseText += char.toUpperCase();
	}
	}
	textCaseInput.value = inverseText;
}


function downloadTextAsFile() {
  let filename = 'online-text-convert';
  let text = textCaseInput.value;
  // const blob = new Blob([text], { type: 'text/plain' });
  let blob = new Blob([new TextEncoder().encode(text)], { type: 'text/plain;charset=UTF-8' });
  let a = document.createElement('a');
  a.href = URL.createObjectURL(blob);
  a.download = filename;
  a.style.display = 'none';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(a.href);
}


function copyTextToClipboard() {
  textCaseInput.select();
  document.execCommand('copy');
}


function clearText() {
  textCaseInput.value = '';
  counter();
}


// Yeni funksialar 

function generateCursedText() {
    let inputText = textCaseInput.value;
    const cursedOutput = document.getElementById("cursedOutput");

    let cursedText = inputText.split('').map(char => {
        if (char.match(/[a-zA-Z]/)) {
            const randomChar = String.fromCharCode(97 + Math.floor(Math.random() * 26)); // Rastgele küçük harf
            return randomChar;
        }
        return char;
    }).join('');

    cursedOutput.textContent = cursedText;
}


// document.querySelectorAll('.feedback li').forEach(entry => entry.addEventListener('click', e => {
//     if(!entry.classList.contains('active')) {
//         document.querySelector('.feedback li.active').classList.remove('active');
//         entry.classList.add('active');
//     }
//     e.preventDefault();
// }));


document.querySelectorAll('.feedback li').forEach(entry => entry.addEventListener('click', e => {
    // Diğer seçili "li" öğelerini temizle
    document.querySelectorAll('.feedback li.active').forEach(activeLi => {
        activeLi.classList.remove('active');
        let inputToUncheck = document.querySelector('.feedback-input[checked]');
        if (inputToUncheck) {
            inputToUncheck.checked = false;
        }
        let input = activeLi.querySelector('.feedback-input');
        if (input) {
            input.checked = false;
        }
    });

    // Şu anki "li" öğesini seçili hale getir
    entry.classList.add('active');
    
    // Şu anki "li" öğesinin içindeki "input" elemanını işaretle
    let input = entry.querySelector('.feedback-input');
    if (input) {
        input.checked = true;
    }

    e.preventDefault();
}));



document.querySelector('body').addEventListener('click', function(e) {
    let comment = document.getElementById('commentFeedback').value;
    let target = e.target;
    if (target.id === 'feedbackBtn') {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/feedback', true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.response);
                    Swal.fire({
                        html: response.message,
                        type: response.status
                    });
                    if (response.status == 'success') {
                      document.getElementById('feedback').style.display = 'none';
                    }
                } else {
                    Swal.fire({
                        title: 'Sistem Xətası!',
                        html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
                        type: 'error'
                    });
                }
            }
        };
      let checkedInput = document.querySelector('.feedback-input:checked');
      let rate = checkedInput.value;
      xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
      xhr.send(JSON.stringify({ rate: rate,comment: comment }));
    }
    return false;
});



document.querySelector('body').addEventListener('submit', function(e) {
    let target = e.target;
    if (target.id === 'recommendForm') {
        e.preventDefault();
        let xhr = new XMLHttpRequest();
        xhr.open('POST', '/recommend', true);
        xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4) {
                if (xhr.status === 200) {
                    let response = JSON.parse(xhr.response);
                    Swal.fire({
                        html: response.message,
                        type: response.status
                    });
                    if (response.status == 'success') {
                      let close = document.getElementById('recomModalclose');
                      close.click();
                    }
                } else {
                    Swal.fire({
                        title: 'Sistem Xətası!',
                        html: 'Sistem Xətası baş verdi zəhmət olmasa sistem adminstratru ilə əlaqə saxlayın!',
                        type: 'error'
                    });
                }
            }
        };
      let form = document.getElementById("recommendForm");
      let formData = new FormData(form);
      let jsonFormData = {};
      formData.forEach((value, key) => {
          jsonFormData[key] = value;
      });
      xhr.setRequestHeader('Content-Type', 'application/json;charset=UTF-8');
      xhr.send(JSON.stringify(jsonFormData));
    }
    return false;
});