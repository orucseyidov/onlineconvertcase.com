

function textToNato(text) {
  const natoAlphabet = {
    'A': 'Alpha', 'B': 'Bravo', 'C': 'Charlie', 'D': 'Delta', 'E': 'Echo',
    'F': 'Foxtrot', 'G': 'Golf', 'H': 'Hotel', 'I': 'India', 'J': 'Juliett',
    'K': 'Kilo', 'L': 'Lima', 'M': 'Mike', 'N': 'November', 'O': 'Oscar',
    'P': 'Papa', 'Q': 'Quebec', 'R': 'Romeo', 'S': 'Sierra', 'T': 'Tango',
    'U': 'Uniform', 'V': 'Victor', 'W': 'Whiskey', 'X': 'X-ray', 'Y': 'Yankee', 'Z': 'Zulu',
    '1': 'One', '2': 'Two', '3': 'Three', '4': 'Four', '5': 'Five',
    '6': 'Six', '7': 'Seven', '8': 'Eight', '9': 'Nine', '0': 'Zero',
    ' ': 'Space'
  };

  const natoArray = text.toUpperCase().split('').map(char => natoAlphabet[char] || char);
  return natoArray.join(' ');
}


function natoToText(natoText) {
  const natoAlphabetReverse = {
    'Alpha': 'A', 'Bravo': 'B', 'Charlie': 'C', 'Delta': 'D', 'Echo': 'E',
    'Foxtrot': 'F', 'Golf': 'G', 'Hotel': 'H', 'India': 'I', 'Juliett': 'J',
    'Kilo': 'K', 'Lima': 'L', 'Mike': 'M', 'November': 'N', 'Oscar': 'O',
    'Papa': 'P', 'Quebec': 'Q', 'Romeo': 'R', 'Sierra': 'S', 'Tango': 'T',
    'Uniform': 'U', 'Victor': 'V', 'Whiskey': 'W', 'X-ray': 'X', 'Yankee': 'Y', 'Zulu': 'Z',
    'One': '1', 'Two': '2', 'Three': '3', 'Four': '4', 'Five': '5',
    'Six': '6', 'Seven': '7', 'Eight': '8', 'Nine': '9', 'Zero': '0',
    'Space': ' '
  };

  const words = natoText.split(' ');
  const textArray = words.map(word => natoAlphabetReverse[word] || word);
  return textArray.join('');
}





var typeStyleElement = document.getElementById("typeStyle");

textCaseInput.addEventListener("input", function(e) {
    let typeStyle = typeStyleElement.value;
    if (typeStyle == 1) {
      document.getElementById("output").innerHTML = textToNato(this.value);
    }
    else{
      document.getElementById("output").innerHTML = natoToText(this.value);
    }
});


typeStyleElement.addEventListener("change", function() {
    if (this.value == 1) {
      document.getElementById("output").innerHTML = textToNato(textCaseInput.value);
    }
    else{
      document.getElementById("output").innerHTML = natoToText(textCaseInput.value);
    }
});



