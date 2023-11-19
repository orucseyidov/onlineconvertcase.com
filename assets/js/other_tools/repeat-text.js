
function repeatText(text) {

  let count = document.getElementById("repetitions").value;
  if (!count) {
    count = 5;
  }
  let repeatedText = '';
  for (let i = 0; i < count; i++) {
    repeatedText += text;
  }

  return repeatedText;
}


textCaseInput.addEventListener("input", function(e) {
    document.getElementById("output").innerHTML = repeatText(this.value);
});



