// Get Started

// Get ID Form
var loginRegister = $("loginRegister");
var emailQuickError = $("#emailQuickError");
var passwordQuickError = $("#passwordQuickError");
var submitQuickError = $("#submitQuick");

// Function Email / Logic
$("#emailQuick").focus(function () {
	var email = $("#emailQuick").val();

	if (email.length == 0) {
		$("#emailQuick").attr("class", "is-invalid form-control");
		emailQuickError.attr("class", "invalid-feedback ml-1");
		emailQuickError.html("Email tidak boleh kosong!");
		submitQuickError.attr("disabled", true);
	} else {
	}
});
// Validation Email
function quickValidationEmail() {
	var email = $("#emailQuick").val();

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
		$("#emailQuick").attr("class", "is-invalid form-control");
		emailQuickError.attr("class", "invalid-feedback ml-1");
		emailQuickError.html("Email tidak boleh kosong!");
		submitQuickError.attr("disabled", true);

		return false;
	}

	if (!email.match(/^[A-Za-z\._\-[0-9]*[@][A-Za-z]*[\.][a-z]{2,4}$/)) {
		$("#emailQuick").attr("class", "is-invalid form-control");
		emailQuickError.attr("class", "invalid-feedback ml-1");
		emailQuickError.html("Email harus benar!");
		submitQuickError.attr("disabled", true);

		return false;
	}

	submitQuickError.removeAttr("disabled");
	$("#emailQuick").attr("class", "is-valid form-control");
	emailQuickError.attr("class", "valid-feedback ml-1");
	emailQuickError.html("");
}
// Function Password / Logic
$("#passwordQuick").focus(function () {
	var password = $("#passwordQuick").val();

	if (password.length == 0) {
		$("#passwordQuick").attr("class", "is-invalid form-control");
		passwordQuickError.attr("class", "invalid-feedback ml-1");
		passwordQuickError.html("Kata Sandi tidak boleh kosong!");
		submitQuickError.attr("disabled", true);
	} else {
	}
});
// Validation Password Form
function quickValidationPassword() {
	var password = $("#passwordQuick").val();

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
		$("#passwordQuick").attr("class", "is-invalid form-control");
		passwordQuickError.attr("class", "invalid-feedback ml-1");
		passwordQuickError.html("Kata Sandi tidak boleh kosong!");
		submitQuickError.attr("disabled", true);

		return false;
	}

	if (password.length <= 6) {
		$("#passwordQuick").attr("class", "is-invalid form-control");
		passwordQuickError.attr("class", "invalid-feedback ml-1");
		passwordQuickError.html("Kata Sandi minimal 6 karakter!");
		submitQuickError.attr("disabled", true);

		return false;
	}

	submitQuickError.removeAttr("disabled");
	$("#passwordQuick").attr("class", "is-valid form-control");
	passwordQuickError.attr("class", "valid-feedback ml-1");
	passwordQuickError.html("");
}
