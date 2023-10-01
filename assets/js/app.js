
const textCaseInput   = document.getElementById("textCaseInput");


textCaseInput.addEventListener("input", function () {

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
});


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


document.querySelectorAll('.feedback li').forEach(entry => entry.addEventListener('click', e => {
    if(!entry.classList.contains('active')) {
        document.querySelector('.feedback li.active').classList.remove('active');
        entry.classList.add('active');
    }
    e.preventDefault();
}));


