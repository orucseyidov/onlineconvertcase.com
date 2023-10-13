
 const upsideDownCharacters = {
        a: 'ɐ',
        b: 'q',
        c: 'ɔ',
        d: 'p',
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
        p: 'd',
        q: 'b',
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
        B: 'B',
        C: 'Ɔ',
        D: 'D',
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
        R: 'R',
        S: 'S',
        T: '⊥',
        U: '∩',
        V: 'Λ',
        W: 'M',
        X: 'X',
        Y: '⅄',
        Z: 'Z',
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


function generateUpsideDownText() {
    var outputText = "";
    var inputText = textCaseInput.value;
    var lines = inputText.split('\n');

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var words = line.split(' ');

        for (var j = 0; j < words.length; j++) {
            var word = words[j];
            var upsideDownTextWord = "";

            for (var k = 0; k < word.length; k++) {
                var character = word[k];
                if (upsideDownCharacters[character]) {
                    upsideDownTextWord += upsideDownCharacters[character];
                } else {
                    upsideDownTextWord += character;
                }
            }

            outputText += upsideDownTextWord;
            if (j < words.length - 1) {
                outputText += ' ';
            }
        }

        outputText += '<br>';
    }

    document.getElementById("output").innerHTML = outputText;
}


textCaseInput.addEventListener("input", function(e) {
    generateUpsideDownText();
});