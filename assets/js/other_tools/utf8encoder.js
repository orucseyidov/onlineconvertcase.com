

function utf8Encode(text) {
  const utf8 = [];

  for (let i = 0; i < text.length; i++) {
    let charCode = text.charCodeAt(i);

    if (charCode < 0x80) {
      utf8.push(charCode);
    } else if (charCode < 0x800) {
      utf8.push(0xc0 | (charCode >> 6), 0x80 | (charCode & 0x3f));
    } else if (charCode < 0xd800 || charCode >= 0xe000) {
      utf8.push(0xe0 | (charCode >> 12), 0x80 | ((charCode >> 6) & 0x3f), 0x80 | (charCode & 0x3f));
    } else {
      // Bu durumda Unicode 1.1 özel durumu (surrogate pair)
      i++;
      charCode = 0x10000 + (((charCode & 0x3ff) << 10) | (text.charCodeAt(i) & 0x3ff));
      utf8.push(
        0xf0 | (charCode >> 18),
        0x80 | ((charCode >> 12) & 0x3f),
        0x80 | ((charCode >> 6) & 0x3f),
        0x80 | (charCode & 0x3f)
      );
    }
  }

  return new Uint8Array(utf8);
}


function utf8Decode(utf8) {
  let text = '';
  let i = 0;

  while (i < utf8.length) {
    const byte = utf8[i++];

    if (byte < 0x80) {
      text += String.fromCharCode(byte);
    } else if (byte < 0xe0) {
      const charCode = ((byte & 0x1f) << 6) | (utf8[i++] & 0x3f);
      text += String.fromCharCode(charCode);
    } else if (byte < 0xf0) {
      const charCode = ((byte & 0x0f) << 12) | ((utf8[i++] & 0x3f) << 6) | (utf8[i++] & 0x3f);
      text += String.fromCharCode(charCode);
    } else {
      // Bu durumda Unicode 1.1 özel durumu (surrogate pair)
      const charCode =
        ((byte & 0x07) << 18) |
        ((utf8[i++] & 0x3f) << 12) |
        ((utf8[i++] & 0x3f) << 6) |
        (utf8[i++] & 0x3f);
      text += String.fromCharCode((charCode >> 10) + 0xd800, (charCode & 0x3ff) + 0xdc00);
    }
  }

  return text;
}





var typeStyleElement = document.getElementById("typeStyle");

textCaseInput.addEventListener("input", function(e) {
    let typeStyle = typeStyleElement.value;
    if (typeStyle == 1) {
      document.getElementById("output").innerHTML = utf8Encode(this.value);
    }
    else{
      document.getElementById("output").innerHTML = utf8Decode(this.value);
    }
});


typeStyleElement.addEventListener("change", function() {
    if (this.value == 1) {
      document.getElementById("output").innerHTML = utf8Encode(textCaseInput.value);
    }
    else{
      document.getElementById("output").innerHTML = utf8Decode(textCaseInput.value);
    }
});



