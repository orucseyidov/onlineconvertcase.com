
function hexToText(hex) {
  hex = hex.replace(/\s/g, '').toLowerCase();
  const hexArray = hex.match(/.{1,2}/g);
  const textArray = hexArray.map(hexValue => String.fromCharCode(parseInt(hexValue, 16)));
  const text = textArray.join('');
  return text;
}


function textToHex(text) {
  const hexArray = text.split('').map(char => char.charCodeAt(0).toString(16));
  const hex = hexArray.join('');
  return hex;
}

var typeStyleElement = document.getElementById("typeStyle");

textCaseInput.addEventListener("input", function(e) {
    let typeStyle = typeStyleElement.value;
    if (typeStyle == 1) {
      document.getElementById("output").innerHTML = hexToText(this.value);
    }
    else{
      document.getElementById("output").innerHTML = textToHex(this.value);
    }
});


typeStyleElement.addEventListener("change", function() {
    if (this.value == 1) {
      document.getElementById("output").innerHTML = hexToText(textCaseInput.value);
    }
    else{
      document.getElementById("output").innerHTML = textToHex(textCaseInput.value);
    }
});



