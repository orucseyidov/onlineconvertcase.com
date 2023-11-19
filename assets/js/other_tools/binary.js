

function textToBinary(text) {
  let binary = '';
  for (let i = 0; i < text.length; i++) {
    const charCode = text.charCodeAt(i);
    const binaryCode = charCode.toString(2);
    const paddedBinary = '00000000'.slice(binaryCode.length) + binaryCode;
    binary += paddedBinary + ' ';
  }
  return binary.trim();
}



function binaryToText(binary) {
  const binaryArray = binary.split(' ');
  let text = '';
  for (let i = 0; i < binaryArray.length; i++) {
    const binaryCode = binaryArray[i];
    const charCode = parseInt(binaryCode, 2);
    text += String.fromCharCode(charCode);
  }
  return text;
}

var typeStyleElement = document.getElementById("typeStyle");

textCaseInput.addEventListener("input", function(e) {
    let typeStyle = typeStyleElement.value;
    if (typeStyle == 1) {
      document.getElementById("output").innerHTML = textToBinary(this.value);
    }
    else{
      document.getElementById("output").innerHTML = binaryToText(this.value);
    }
});


typeStyleElement.addEventListener("change", function() {
    if (this.value == 1) {
      document.getElementById("output").innerHTML = textToBinary(textCaseInput.value);
    }
    else{
      document.getElementById("output").innerHTML = binaryToText(textCaseInput.value);
    }
});

