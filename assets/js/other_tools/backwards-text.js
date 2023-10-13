const backwardsCharacters = {
    A: '∀',
    B: 'q',
    C: 'ɔ',
    D: 'p',
    E: 'Ǝ',
    F: 'Ⅎ',
    G: 'ƃ',
    H: 'ɥ',
    I: 'ᴉ',
    J: 'ſ',
    K: 'ʞ',
    L: 'l',
    M: 'ɯ',
    N: 'u',
    O: 'o',
    P: 'd',
    Q: 'b',
    R: 'ɹ',
    S: 's',
    T: '⊥',
    U: 'ʎ',
    V: 'ʌ',
    W: 'ʍ',
    X: 'x',
    Y: 'ʎ',
    Z: 'z',
    '0': '0',
    '1': '1',
    '2': '2',
    '3': '3',
    '4': '4',
    '5': '5',
    '6': '6',
    '7': '7',
    '8': '8',
    '9': '9',
    ' ': ' ',
};

function generateBackwardsText() {
    var inputText = textCaseInput.value;
    var lines = inputText.split('\n');
    var outputText = "";

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var reversedLine = reverseText(line);

        outputText += reversedLine;

        if (i < lines.length - 1) {
            outputText += '\n';
        }
    }

    document.getElementById("output").innerHTML = outputText;
}

function reverseText(text) {
    var reversedText = "";
    for (var i = text.length - 1; i >= 0; i--) {
        var character = text[i];
        if (backwardsCharacters[character]) {
            reversedText += backwardsCharacters[character];
        } else {
            reversedText += character;
        }
    }
    return reversedText;
}

textCaseInput.addEventListener("input", function(e) {
    generateBackwardsText();
});