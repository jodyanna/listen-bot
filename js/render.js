// Code for view

const renderRandomPostResponse = xhttp => {
  document.getElementById("response-text").textContent = JSON.parse(xhttp.responseText)[0];
  document.getElementById("response-date").textContent = JSON.parse(xhttp.responseText)[1];
}



const renderCurrentCharCount = () => {
  const charCountSpan = document.getElementById("char-count");
  const currentCharCount = document.getElementById("user-post").value.length;

  charCountSpan.textContent = `${currentCharCount}`;
}

