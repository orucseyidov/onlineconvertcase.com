
const bubbleCharacters = {
    A: 'Ⓐ',
    B: 'Ⓑ',
    C: 'Ⓒ',
    D: 'Ⓓ',
    E: 'Ⓔ',
    F: 'Ⓕ',
    G: 'Ⓖ',
    H: 'Ⓗ',
    I: 'Ⓘ',
    J: 'Ⓙ',
    K: 'Ⓚ',
    L: 'Ⓛ',
    M: 'Ⓜ',
    N: 'Ⓝ',
    O: 'Ⓞ',
    P: 'Ⓟ',
    Q: 'Ⓠ',
    R: 'Ⓡ',
    S: 'Ⓢ',
    T: 'Ⓣ',
    U: 'Ⓤ',
    V: 'Ⓥ',
    W: 'Ⓦ',
    X: 'Ⓧ',
    Y: 'Ⓨ',
    Z: 'Ⓩ',
    '0': '⓪',
    '1': '①',
    '2': '②',
    '3': '③',
    '4': '④',
    '5': '⑤',
    '6': '⑥',
    '7': '⑦',
    '8': '⑧',
    '9': '⑨',
    ' ': ' ',
};

const bubbleCharactersBold = {
    A: '🅐',
    B: '🅑',
    C: '🅒',
    D: '🅓',
    E: '🅔',
    F: '🅕',
    G: '🅖',
    H: '🅗',
    I: '🅘',
    J: '🅙',
    K: '🅚',
    L: '🅛',
    M: '🅜',
    N: '🅝',
    O: '🅞',
    P: '🅟',
    Q: '🅠',
    R: '🅡',
    S: '🅢',
    T: '🅣',
    U: '🅤',
    V: '🅥',
    W: '🅦',
    X: '🅧',
    Y: '🅨',
    Z: '🅩',
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




function generateBubbleText() {
    var outputText = "";
    var inputText = textCaseInput.value;
    var lines = inputText.split('\n');

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var words = line.split(' ');

        for (var j = 0; j < words.length; j++) {
            var word = words[j];
            var bubbleTextWord = "";

            for (var k = 0; k < word.length; k++) {
                var character = word[k];
                if (bubbleCharacters[character]) {
                    bubbleTextWord += bubbleCharacters[character];
                } else {
                    bubbleTextWord += character;
                }
            }

            outputText += bubbleTextWord;
            if (j < words.length - 1) {
                outputText += ' ';
            }
        }

        outputText += '<br>';
    }

    document.getElementById("output").innerHTML = outputText;
}


textCaseInput.addEventListener("input", function(e) {
    generateBubbleText();
});