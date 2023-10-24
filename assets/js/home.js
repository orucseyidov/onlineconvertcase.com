
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



let swiper = new Swiper(".usefullLinksCarusel", {
  // slidesPerView: 4,
  // spaceBetween:15,
  direction: 'horizontal',
  loop: true,
  breakpoints: {
      350: {
          slidesPerView: 1,
      },
      750: {
          slidesPerView: 4,
          spaceBetween: 15,
      },
      1000: {
          slidesPerView: 4,
          spaceBetween: 15,
      }
  },
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
});
