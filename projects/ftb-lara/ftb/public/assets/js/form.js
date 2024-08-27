
//display image
function displayImage(input, imgId) {
if (input.files && input.files[0]) {
var reader = new FileReader();
reader.onload = function(e) {
document.getElementById(imgId).src = e.target.result;
}
reader.readAsDataURL(input.files[0]);
}
}


