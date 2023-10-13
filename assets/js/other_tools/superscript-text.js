var superscriptCharacters = {
    a: 'ᵃ',
    b: 'ᵇ',
    c: 'ᶜ',
    d: 'ᵈ',
    e: 'ᵉ',
    f: 'ᶠ',
    g: 'ᵍ',
    h: 'ʰ',
    i: 'ⁱ',
    j: 'ʲ',
    k: 'ᵏ',
    l: 'ˡ',
    m: 'ᵐ',
    n: 'ⁿ',
    o: 'ᵒ',
    p: 'ᵖ',
    q: 'ᑫ',
    r: 'ʳ',
    s: 'ˢ',
    t: 'ᵗ',
    u: 'ᵘ',
    v: 'ᵛ',
    w: 'ʷ',
    x: 'ˣ',
    y: 'ʸ',
    z: 'ᶻ',
    0: '⁰',
    1: '¹',
    2: '²',
    3: '³',
    4: '⁴',
    5: '⁵',
    6: '⁶',
    7: '⁷',
    8: '⁸',
    9: '⁹',
};


function generateSuperscriptText() {
    var outputText = "";
    var inputText = textCaseInput.value;
    var lines = inputText.split('\n');

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var words = line.split(' ');

        for (var j = 0; j < words.length; j++) {
            var word = words[j];
            var superscriptWord = "";

            for (var k = 0; k < word.length; k++) {
                var character = word[k];
                if (superscriptCharacters[character]) {
                    superscriptWord += superscriptCharacters[character];
                } else {
                    superscriptWord += character;
                }
            }

            outputText += superscriptWord;
            if (j < words.length - 1) {
                outputText += ' ';
            }
        }

        outputText += '<br>';
    }

    document.getElementById("output").innerHTML = outputText;
}


textCaseInput.addEventListener("input", function(e) {
    generateSuperscriptText();
});
