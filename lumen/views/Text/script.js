document.getElementById("loginButton").addEventListener("click", function () {
    var loginForm = document.getElementById("loginForm");
    if (loginForm.style.display === "none" || loginForm.style.display === "") {
      loginForm.style.display = "block";
    } else {
      loginForm.style.display = "none";
    }
  });
const loginButton = document.getElementById("loginButton");
const loginForm = document.getElementById("loginForm");

loginButton.addEventListener("click", function() {
  if (loginForm.classList.contains("hidden")) {
    loginForm.classList.remove("hidden");
  } else {
    loginForm.classList.add("hidden");
  }
});