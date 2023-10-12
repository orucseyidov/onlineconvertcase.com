
var strikethroughCharacters = {
    A: "𝗔̶",
    B: "𝗕̶",
    C: "𝗖̶",
    D: "𝗗̶",
    E: "𝗘̶",
    F: "𝗙̶",
    G: "𝗚̶",
    H: "𝗛̶",
    I: "𝗜̶",
    J: "𝗝̶",
    K: "𝗞̶",
    L: "𝗟̶",
    M: "𝗠̶",
    N: "𝗡̶",
    O: "𝗢̶",
    P: "𝗣̶",
    Q: "𝗤̶",
    R: "𝗥̶",
    S: "𝗦̶",
    T: "𝗧̶",
    U: "𝗨̶",
    V: "𝗩̶",
    W: "𝗪̶",
    X: "𝗫̶",
    Y: "𝗬̶",
    Z: "𝗭̶",
    a: "𝗮̶",
    b: "𝗯̶",
    c: "𝗰̶",
    d: "𝗱̶",
    e: "𝗲̶",
    f: "𝗳̶",
    g: "𝗴̶",
    h: "𝗵̶",
    i: "𝗶̶",
    j: "𝗷̶",
    k: "𝗸̶",
    l: "𝗹̶",
    m: "𝗺̶",
    n: "𝗻̶",
    o: "𝗼̶",
    p: "𝗽̶",
    q: "𝗾̶",
    r: "𝗿̶",
    s: "𝘀̶",
    t: "𝘁̶",
    u: "𝘂̶",
    v: "𝘃̶",
    w: "𝘄̶",
    x: "𝘅̶",
    y: "𝘆̶",
    z: "𝘇̶",
    0: "𝟬̶",
    1: "𝟭̶",
    2: "𝟮̶",
    3: "𝟯̶",
    4: "𝟰̶",
    5: "𝟱̶",
    6: "𝟲̶",
    7: "𝟳̶",
    8: "𝟴̶",
    9: "𝟵̶",
};




// function textToStrikethrough(inputText) {
//     var outputText = "";
//     var inputText   = textCaseInput.value;
//     for (var i = 0; i < inputText.length; i++) {
//         var character = inputText[i];
//         if (strikethroughCharacters[character]) {
//             outputText += strikethroughCharacters[character];
//         } else {
//             outputText += character;
//         }
//     }
//     return outputText;
// }


function textToStrikethrough() {
    var outputText = "";
    var inputText   = textCaseInput.value;
    var lines = inputText.split('\n');

    for (var i = 0; i < lines.length; i++) {
        var line = lines[i];
        var words = line.split(' ');

        for (var j = 0; j < words.length; j++) {
            var word = words[j];
            var strikethroughWord = "";

            for (var k = 0; k < word.length; k++) {
                var character = word[k];
                if (strikethroughCharacters[character]) {
                    strikethroughWord += strikethroughCharacters[character];
                } else {
                    strikethroughWord += character;
                }
            }

            outputText += strikethroughWord;
            if (j < words.length - 1) {
                outputText += ' ';
            }
        }

        outputText += '<br>';
    }

    document.getElementById("output").innerHTML = outputText;
}



textCaseInput.addEventListener("input", function(e) {
    textToStrikethrough();
});