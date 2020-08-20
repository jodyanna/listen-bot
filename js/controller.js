// Controller stuff? kana...


const ajaxRequest = (url, cFunction) => {
  const xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState === 4 && this.status === 200) cFunction(this);
  };
  xhttp.open("POST", url, true);
  xhttp.send();
}


// index.html set-up on load
window.addEventListener("load", function () {
  if (document.body.id !== "index") return;
  validateForm();
})


// listen.html set-up on load
window.addEventListener("load", function () {
  if (document.body.id !== "listen") return;
  ajaxRequest("http://localhost/listen-bot/php/get_rand_post.php", renderRandomPostResponse);
});


// validate text field in form
const validateForm = () => {
  if (document.body.id !== "index") return;
  validateTextField();
  renderCurrentCharCount();
}
document.getElementById("user-post").addEventListener("keydown", validateForm);
document.getElementById("user-post").addEventListener("keyup", validateForm);
document.getElementById("user-post").addEventListener("cut", validateForm);
document.getElementById("user-post").addEventListener("paste", validateForm);