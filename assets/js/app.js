
const textCaseInput   = document.getElementById("textCaseInput");

toastr.options = {
  "closeButton": false,
  "debug": false,
  "newestOnTop": false,
  "progressBar": false,
  "positionClass": "toast-top-right",
  "preventDuplicates": false,
  "onclick": null,
  "showDuration": "300",
  "hideDuration": "1000",
  "timeOut": "5000",
  "extendedTimeOut": "1000",
  "showEasing": "swing",
  "hideEasing": "linear",
  "showMethod": "fadeIn",
  "hideMethod": "fadeOut"
};

function toastrMessage(text,type = 'success'){
    toastr[type](text);
}



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
  toastrMessage("The output has been copied to the clipboard.");
}


function clearText() {
  textCaseInput.value = '';
  counter();
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
  toastrMessage("Your output has been uploaded successfully");
}

// Other tools functions

function copyTextToClipboardOther() {
    var outputDiv = document.getElementById('output');
    var range = document.createRange();
    range.selectNode(outputDiv);
    window.getSelection().removeAllRanges();
    window.getSelection().addRange(range);
    try {
        document.execCommand('copy');
        toastrMessage("The output has been copied to the clipboard.");
    } catch (err) {
        toastrMessage("Copying text failed: " + err);
        console.error('Metin kopyalama işlemi başarısız oldu: ', err);
    }
    window.getSelection().removeAllRanges();
}

function downloadTextAsFileOther() {
    let filename = 'online-text-convert';
    let text = document.getElementById('output').innerText; // "output" div içeriğini alır
    let blob = new Blob([new TextEncoder().encode(text)], { type: 'text/plain;charset=UTF-8' });
    let a = document.createElement('a');
    a.href = URL.createObjectURL(blob);
    a.download = filename;
    a.style.display = 'none';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    URL.revokeObjectURL(a.href);
    toastrMessage("Your output has been uploaded successfully");
}


if (document.getElementById("feedback")) {
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
}




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





