// Get Started

// Get ID Form
var formRegister = $("formRegister");
var nameError = $("#nameError");
var emailError = $("#emailError");
var passwordError = $("#passwordError");
var passwordRepeatError = $("#passwordRepeatError");
var submitError = $("#submit");

// Function Name / Logic
$("#name").focus(function () {
	var name = $("#name").val();

	if (name.length == 0) {
		$("#name").attr("class", "is-invalid form-control");
		nameError.attr("class", "invalid-feedback ml-1");
		nameError.html("Nama Lengkap tidak boleh kosong!");
		submitError.attr("disabled", true);
	} else {
	}
});
// Validation Form Name
function validationName() {
	var name = $("#name").val();

	if (
		name.length == 0 ||
		name == "" ||
		name == " " ||
		name == "  " ||
		name == "   " ||
		name == "   " ||
		name == "    " ||
		name == "     " ||
		name == "      " ||
		name == "       " ||
		name == "        " ||
		name == "         " ||
		name == "          "
	) {
		$("#name").attr("class", "is-invalid form-control");
		nameError.attr("class", "invalid-feedback ml-1");
		nameError.html("Nama Lengkap tidak boleh kosong!");
		submitError.attr("disabled", true);

		return false;
	}

	submitError.removeAttr("disabled");
	$("#name").attr("class", "is-valid form-control");
	nameError.attr("class", "valid-feedback ml-1");
	nameError.html("");
}

// Function Email / Logic
$("#email").focus(function () {
	var email = $("#email").val();

	if (email.length == 0) {
		$("#email").attr("class", "is-invalid form-control");
		emailError.attr("class", "invalid-feedback ml-1");
		emailError.html("Email tidak boleh kosong!");
		submitError.attr("disabled", true);
	} else {
	}
});
// Validation Email
function validationEmail() {
	var email = $("#email").val();

	if (
		email.length == 0 ||
		email == "" ||
		email == " " ||
		email == "  " ||
		email == "   " ||
		email == "   " ||
		email == "    " ||
		email == "     " ||
		email == "      " ||
		email == "       " ||
		email == "        " ||
		email == "         " ||
		email == "          "
	) {
		$("#email").attr("class", "is-invalid form-control");
		emailError.attr("class", "invalid-feedback ml-1");
		emailError.html("Email tidak boleh kosong!");
		submitError.attr("disabled", true);

		return false;
	}

	if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
		$("#email").attr("class", "is-invalid form-control");
		emailError.attr("class", "invalid-feedback ml-1");
		emailError.html("Email harus benar!");
		submitError.attr("disabled", true);

		return false;
	}

	submitError.removeAttr("disabled");
	$("#email").attr("class", "is-valid form-control");
	emailError.attr("class", "valid-feedback ml-1");
	emailError.html("");
}
// Function Password / Logic
$("#password").focus(function () {
	var password = $("#password").val();

	if (password.length == 0) {
		$("#password").attr("class", "is-invalid form-control");
		passwordError.attr("class", "invalid-feedback ml-1");
		passwordError.html("Kata Sandi tidak boleh kosong!");
		submitError.attr("disabled", true);
	} else {
	}
});
// Validation Password Form
function validationPassword() {
	var password = $("#password").val();

	if (
		password.length == 0 ||
		password == "" ||
		password == " " ||
		password == "  " ||
		password == "   " ||
		password == "   " ||
		password == "    " ||
		password == "     " ||
		password == "      " ||
		password == "       " ||
		password == "        " ||
		password == "         " ||
		password == "          "
	) {
		$("#password").attr("class", "is-invalid form-control");
		passwordError.attr("class", "invalid-feedback ml-1");
		passwordError.html("Kata Sandi tidak boleh kosong!");
		submitError.attr("disabled", true);

		return false;
	}

	if (password.length <= 6) {
		$("#password").attr("class", "is-invalid form-control");
		passwordError.attr("class", "invalid-feedback ml-1");
		passwordError.html("Kata Sandi minimal 6 karakter!");
		submitError.attr("disabled", true);

		return false;
	}

	submitError.removeAttr("disabled");
	$("#password").attr("class", "is-valid form-control");
	passwordError.attr("class", "valid-feedback ml-1");
	passwordError.html("");
}

// Function Password Repeat / Logic
$("#passwordRepeat").focus(function () {
	var passwordRepeat = $("#passwordRepeat").val();

	if (passwordRepeat.length == 0) {
		$("#passwordRepeat").attr("class", "is-invalid form-control");
		passwordRepeatError.attr("class", "invalid-feedback ml-1");
		passwordRepeatError.html("Ulangi Kata Sandi tidak boleh kosong!");
		submitError.attr("disabled", true);
	} else {
	}
});
// Validation Password Repeat Form
function validationPasswordRepeat() {
	var passwordRepeat = $("#passwordRepeat").val();
	var password = $("#password").val();
	if (
		passwordRepeat.length == 0 ||
		passwordRepeat == "" ||
		passwordRepeat == " " ||
		passwordRepeat == "  " ||
		passwordRepeat == "   " ||
		passwordRepeat == "   " ||
		passwordRepeat == "    " ||
		passwordRepeat == "     " ||
		passwordRepeat == "      " ||
		passwordRepeat == "       " ||
		passwordRepeat == "        " ||
		passwordRepeat == "         " ||
		passwordRepeat == "          "
	) {
		$("#passwordRepeat").attr("class", "is-invalid form-control");
		passwordRepeatError.attr("class", "invalid-feedback ml-1");
		passwordRepeatError.html("Ulangi Kata Sandi tidak boleh kosong!");
		submitError.attr("disabled", true);

		return false;
	}

	if (passwordRepeat.length <= 6) {
		$("#passwordRepeat").attr("class", "is-invalid form-control");
		passwordRepeatError.attr("class", "invalid-feedback ml-1");
		passwordRepeatError.html("Ulangi Kata Sandi minimal 6 karakter!");
		submitError.attr("disabled", true);

		return false;
	}
	if (passwordRepeat != password) {
		$("#passwordRepeat").attr("class", "is-invalid form-control");
		passwordRepeatError.attr("class", "invalid-feedback ml-1");
		passwordRepeatError.html("Ulangi Kata Sandi harus sama dengan Kata Sandi!");
		submitError.attr("disabled", true);

		return false;
	}

	submitError.removeAttr("disabled");
	$("#passwordRepeat").attr("class", "is-valid form-control");
	passwordRepeatError.attr("class", "valid-feedback ml-1");
	passwordRepeatError.html("");
}
