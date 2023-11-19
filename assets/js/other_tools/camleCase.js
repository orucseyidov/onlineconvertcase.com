

function toCamelCase(text) {
  return text.replace(/[-_\s]\w/g, function (match) {
    return match.charAt(1).toUpperCase();
  });
}


function fromCamelCase(camelCaseText) {
  return camelCaseText.replace(/[A-Z]/g, function (match) {
    return '_' + match.toLowerCase();
  });
}





var typeStyleElement = document.getElementById("typeStyle");

textCaseInput.addEventListener("input", function(e) {
    let typeStyle = typeStyleElement.value;
    if (typeStyle == 1) {
      document.getElementById("output").innerHTML = toCamelCase(this.value);
    }
    else{
      document.getElementById("output").innerHTML = fromCamelCase(this.value);
    }
});


typeStyleElement.addEventListener("change", function() {
    if (this.value == 1) {
      document.getElementById("output").innerHTML = toCamelCase(textCaseInput.value);
    }
    else{
      document.getElementById("output").innerHTML = fromCamelCase(textCaseInput.value);
    }
});



