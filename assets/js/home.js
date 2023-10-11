function toSentenceCase() {
  let text = textCaseInput.value;
  const sentences = text.toLowerCase().split('. ');

  const sentenceCaseSentences = sentences.map((sentence) => {
    if (sentence.length > 1) {
      return sentence.charAt(0).toUpperCase() + sentence.slice(1);
    } else {
      return sentence;
    }
  });

  let result = sentenceCaseSentences.join('. ');
  textCaseInput.value = result;
}


function toLowerCaseText() {
    let text = textCaseInput.value;
    textCaseInput.value = text.toLowerCase();
}


function toUpperCaseText() {
    let text = textCaseInput.value;
    textCaseInput.value = text.toUpperCase();
}


function toCapitalizedCase() {
  let text = textCaseInput.value;
  const words = text.split(' ');

  const capitalizedWords = words.map((word) => {
    if (word.length > 1) {
      return word.charAt(0).toUpperCase() + word.slice(1).toLowerCase();
    } else {
      return word;
    }
  });
  textCaseInput.value = capitalizedWords.join(' ');
}


function toAlternatingCase() {
  let text = textCaseInput.value;
  let alternatingText = "";
  for (let i = 0; i < text.length; i++) {
    if (i % 2 === 0) {
      alternatingText += text[i].toUpperCase();
    } else {
      alternatingText += text[i].toLowerCase();
    }
  }
  textCaseInput.value = alternatingText;
}


function toTitleCase() {
  let text = textCaseInput.value;
  const words = text.toLowerCase().split(' ');

  const titleCaseWords = words.map((word) => {
    if (word.length > 1) {
      return word.charAt(0).toUpperCase() + word.slice(1);
    } else {
      return word;
    }
  });

  textCaseInput.value = titleCaseWords.join(' ');
}


function toInverseCase() {
    let text = textCaseInput.value;
    let inverseText = "";
    for (let i = 0; i < text.length; i++) {
    const char = text[i];
    if (char === char.toUpperCase()) {
      inverseText += char.toLowerCase();
    } else {
      inverseText += char.toUpperCase();
    }
    }
    textCaseInput.value = inverseText;
}


function downloadTextAsFile() {
  let filename = 'online-text-convert';
  let text = textCaseInput.value;
  // const blob = new Blob([text], { type: 'text/plain' });
  let blob = new Blob([new TextEncoder().encode(text)], { type: 'text/plain;charset=UTF-8' });
  let a = document.createElement('a');
  a.href = URL.createObjectURL(blob);
  a.download = filename;
  a.style.display = 'none';
  document.body.appendChild(a);
  a.click();
  document.body.removeChild(a);
  URL.revokeObjectURL(a.href);
}


function copyTextToClipboard() {
  textCaseInput.select();
  document.execCommand('copy');
}


function clearText() {
  textCaseInput.value = '';
  counter();
}


// Yeni funksialar 

function generateCursedText() {
    let inputText = textCaseInput.value;
    const cursedOutput = document.getElementById("cursedOutput");

    let cursedText = inputText.split('').map(char => {
        if (char.match(/[a-zA-Z]/)) {
            const randomChar = String.fromCharCode(97 + Math.floor(Math.random() * 26)); // Rastgele küçük harf
            return randomChar;
        }
        return char;
    }).join('');

    cursedOutput.textContent = cursedText;
}


const tabsBox = document.querySelector(".tabs-box"),
allTabs = tabsBox.querySelectorAll(".tab"),
arrowIcons = document.querySelectorAll(".icon i");

let isDragging = false;

const handleIcons = (scrollVal) => {
    let maxScrollableWidth = tabsBox.scrollWidth - tabsBox.clientWidth;
    arrowIcons[0].parentElement.style.display = scrollVal <= 0 ? "none" : "flex";
    arrowIcons[1].parentElement.style.display = maxScrollableWidth - scrollVal <= 1 ? "none" : "flex";
}

arrowIcons.forEach(icon => {
    icon.addEventListener("click", () => {
        // if clicked icon is left, reduce 350 from tabsBox scrollLeft else add
        let scrollWidth = tabsBox.scrollLeft += icon.id === "left" ? -340 : 340;
        handleIcons(scrollWidth);
    });
});

allTabs.forEach(tab => {
    tab.addEventListener("click", () => {
        tabsBox.querySelector(".active").classList.remove("active");
        tab.classList.add("active");
    });
});

const dragging = (e) => {
    if(!isDragging) return;
    tabsBox.classList.add("dragging");
    tabsBox.scrollLeft -= e.movementX;
    handleIcons(tabsBox.scrollLeft)
}

const dragStop = () => {
    isDragging = false;
    tabsBox.classList.remove("dragging");
}

tabsBox.addEventListener("mousedown", () => isDragging = true);
tabsBox.addEventListener("mousemove", dragging);
document.addEventListener("mouseup", dragStop);