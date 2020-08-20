// js for main app's appearance and styling

// Form Validation
const validateTextField = () => {
  const textField = document.getElementById("user-post");
  const textFieldContent = document.getElementById("user-post").value;
  const charCountSpan = document.getElementById("char-count");

  if (textFieldContent.length > 255) {
    textField.style.borderColor = "#ff00ff";
    charCountSpan.style.color = "#ff00ff";
    document.getElementById("submit-button").disabled = true;
  }
  else if (textFieldContent.length === 0) {
    document.getElementById("submit-button").disabled = true;
  } else {
    textField.style.borderColor = "#ffffff";
    charCountSpan.style.color = "#cccccc";
    document.getElementById("submit-button").disabled = false;
  }
}

