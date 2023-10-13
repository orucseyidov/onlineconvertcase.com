const mirrorCharacters = {
    a: 'ɒ',
    b: 'd',
    c: 'ɔ',
    d: 'b',
    e: 'ǝ',
    f: 'ɟ',
    g: 'ƃ',
    h: 'ɥ',
    i: 'ᴉ',
    j: 'ɾ',
    k: 'ʞ',
    l: 'l',
    m: 'ɯ',
    n: 'u',
    o: 'o',
    p: 'q',
    q: 'p',
    r: 'ɹ',
    s: 's',
    t: 'ʇ',
    u: 'n',
    v: 'ʌ',
    w: 'ʍ',
    x: 'x',
    y: 'ʎ',
    z: 'z',
    A: '∀',
    B: 'q',
    C: 'Ɔ',
    D: 'p',
    E: 'Ǝ',
    F: 'Ⅎ',
    G: 'פ',
    H: 'H',
    I: 'I',
    J: 'ſ',
    K: 'ʞ',
    L: '˥',
    M: 'W',
    N: 'N',
    O: 'O',
    P: 'Ԁ',
    Q: 'Q',
    R: 'ɹ',
    S: 'S',
    T: '⊥',
    U: '∩',
    V: 'Λ',
    W: 'M',
    X: 'X',
    Y: '⅄',
    Z: 'Z',
    '0': '0',
    '1': 'Ɩ',
    '2': 'ᄅ',
    '3': 'Ɛ',
    '4': 'ㄣ',
    '5': 'ϛ',
    '6': '9',
    '7': 'ㄥ',
    '8': '8',
    '9': '6',
    ' ': ' ',
};



function generateMirrorText() {
    var inputText = textCaseInput.value;
    var lines = inputText.split('\n');
    var outputText = "";

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var words = line.split(' ');

        for (var j = 0; j < words.length; j++) {
            var word = words[j];
            var mirroredWord = "";

            for (var k = 0; k < word.length; k++) {
                var character = word[k];
                if (mirrorCharacters[character]) {
                    mirroredWord += mirrorCharacters[character];
                } else {
                    mirroredWord += character;
                }
            }

            outputText += mirroredWord;
            if (j < words.length - 1) {
                outputText += ' ';
            }
        }

        outputText += '<br>';
    }

    document.getElementById("output").innerHTML = outputText;
}


textCaseInput.addEventListener("input", function(e) {
    generateMirrorText();
});