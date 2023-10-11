
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



function copyTextToClipboard() {
  textCaseInput.select();
  document.execCommand('copy');
}


function clearText() {
  textCaseInput.value = '';
  counter();
}



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

