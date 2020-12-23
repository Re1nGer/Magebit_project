let form_submit = document.getElementById("input-validation");
let checkbox = document.getElementById("input-box");
let message = document.getElementById("message");
let errorMessage = "";
let causeOfError = "";

//handling real-time validation of the email input field
form_submit.addEventListener("input", input);

function input(event) {
  event.preventDefault();
  validate();
  switch (causeOfError) {
    case "Invalid email":
      errorMessage = "Please, provide a valid e-mail address";
      break;
    case "Forbidden Provider":
      errorMessage = "We are not accepting subscriptions from Colombia emails";
      break;
    default:
      errorMessage = "";
  }

  if (errorMessage) {
    message.textContent = errorMessage;
    form_submit.style.backgroundColor = "#FFBABA";
  } else {
    message.textContent = errorMessage;
    form_submit.style.backgroundColor = "#FFFFFF";
  }
}
//handling submission of the form by pressig Enter key
form_submit.addEventListener("keypress", function (event) {
  if (event.code === "Enter") {
    event.preventDefault();
    if (validate()) {
      document.getElementById("submit").click();
    }
  }
});

// function which validates email input field
function validate() {
  const regular_expression = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
  const valueInput = form_submit.value;
  const forbiddenProvider = valueInput.slice(
    valueInput.length - 2,
    valueInput.length
  );
  if (
    !regular_expression.test(String(form_submit.value).toLowerCase()) &&
    form_submit.value.length !== 0
  ) {
    causeOfError = "Invalid email";
    return false;
  } else if (forbiddenProvider === "co") {
    causeOfError = "Forbidden Provider";
    return false;
  }
  causeOfError = "";
  return true;
}
