const form = document.getElementById("form");
const email = document.getElementById("email");
const passwd = document.getElementById("passwd");

form.addEventListener("submit", (e) => {
	e.preventDefault();

	checkInputs();
});

function checkInputs() {
	const emailValue = email.value.trim();
	const my_messageValue = my_message.value.trim();

	if (emailValue === "") {
		setErrorFor(email, "Enter email!");
	} else if (!isEmail(emailValue)) {
		setErrorFor(email, "Invalid email!");
	} else {
		setSuccessFor(email);
	}

	if (passwdValue === "") {
		setErrorFor(passwd, "Enter password!");
}

function setErrorFor(input, message) {
	const formControl = input.parentElement;
	const small = formControl.querySelector("small");
	formControl.className = "form-control error";
	small.innerText = message;
}

function setSuccessFor(input) {
	const formControl = input.parentElement;
	formControl.className = "form-control success";
}

function setErrorFor(textarea, message) {
	const formControl = textarea.parentElement;
	const small = formControl.querySelector("small");
	formControl.className = "form-control error";
	small.innerText = message;
}

function setSuccessFor(textarea) {
	const formControl = textarea.parentElement;
	formControl.className = "form-control success";
}

function isEmail(email) {
	return /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(
		email
	);
}
}