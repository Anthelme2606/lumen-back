const textElement = document.getElementById("welcome-text");
const text = "Bienvenue sur la plateforme de Lumen.  Nous sommes prets pour vous..";
let index = 0;

function typeText() {
  if (index < text.length) {
    textElement.textContent += text[index];
    index++;
    setTimeout(typeText, 200); 
  }
}

typeText();