var romanNumerals = [
    ["", "I", "II", "III", "IV", "V", "VI", "VII", "VIII", "IX"],
    ["", "X", "XX", "XXX", "XL", "L", "LX", "LXX", "LXXX", "XC"],
    ["", "C", "CC", "CCC", "CD", "D", "DC", "DCC", "DCCC", "CM"],
    ["", "M", "MM", "MMM"]
];

function convertToRoman(textInput) {
    let outputContainer = "";

    for (var i = 0; i < textInput.length; i++) {
        var letter = textInput.charAt(i);
        var romanValue = getRomanValue(letter);
        outputContainer += (romanValue !== undefined ? romanValue : letter);
    }

    return outputContainer;
}

function getRomanValue(letter) {
    letter = letter.toUpperCase();
    for (var i = 0; i < romanNumerals.length; i++) {
        for (var j = 0; j < romanNumerals[i].length; j++) {
            if (romanNumerals[i][j] === letter) {
                return romanNumerals[i][j];
            }
        }
    }
    return letter;
}

var textCaseInput = document.getElementById("textCaseInput");

textCaseInput.addEventListener("input", function (e) {
    document.getElementById("output").innerHTML = convertToRoman(this.value);
});
