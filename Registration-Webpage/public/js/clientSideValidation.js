//Full name validation
function checkFullName(fullName) {
    var regex = /^[a-zA-Z\s]+$/;
    return regex.test(fullName);
}
function showFullNameErr() {
    var fullNameInput = document.getElementById("fname").value;
    if (checkFullName(fullNameInput)) {
        document.getElementById("name-error").style.display = "none";
        return true;
    } else {
        if (fullNameInput === "") {
            document.getElementById("name-error").style.display = "none";
            return true;
        } else {
            document.getElementById("name-error").style.display = "block";
            document.getElementById("name-error").innerText =
                "Full name must contain only letters!";
            return false;
        }
    }
}

//Email validation
function checkEmail(email) {
    var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    return regex.test(email);
}
function showEmailErr() {
    const email = document.getElementById("email").value;
    if (checkEmail(email)) {
        document.getElementById("email-error").innerText = "";
        return true;
    } else {
        if (email === "") {
            document.getElementById("email-error").innerText = "";
            return true;
        } else {
            document.getElementById("email-error").style.display = "block";
            document.getElementById("email-error").innerText =
                "Invalid email address";
            return false;
        }
    }
}

//Password validation
function checkPass(password) {
    var regex = /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,}$/;
    return regex.test(password);
}
function showPassErr() {
    const pass = document.getElementById("pass").value;
    if (checkPass(pass)) {
        document.getElementById("pass-error").innerText = "";
        return true;
    } else {
        if (pass === "") {
            document.getElementById("pass-error").innerText = "";
            return true;
        } else {
            document.getElementById("pass-error").style.display = "block";
            document.getElementById("pass-error").innerText =
                "Password must be at least 8 characters long and contain at least 1 number and 1 special character";
            return false;
        }
    }
}
function showConfirmPassErr() {
    const cpass = document.getElementById("cpass").value;
    const pass = document.getElementById("pass").value;
    if (cpass === "" || pass == cpass) {
        document.getElementById("cpass-error").innerText = "";
        return true;
    }
    if (pass !== cpass) {
        document.getElementById("cpass-error").style.display = "block";
        document.getElementById("cpass-error").innerText =
            "Password and confirm password do not match";
        return false;
    }
}

//Phone number validation
function checkPhone(phone) {
    var regex = /^[0-9]*$/;
    return regex.test(phone);
}
function showPhoneErr() {
    const phone = document.getElementById("phone").value;
    if (phone === "" || checkPhone(phone)) {
        document.getElementById("phone-error").innerText = "";
        return true;
    }
    if (!checkPhone(phone)) {
        document.getElementById("phone-error").style.display = "block";
        document.getElementById("phone-error").innerText =
            "Phone number must contain only digits";
        return false;
    }
}

document.getElementById("form").addEventListener("keyup", function (event) {
    event.preventDefault();
    showFullNameErr();
    showEmailErr();
    showPassErr();
    showConfirmPassErr();
    showPhoneErr();
    console.log("fullname", showFullNameErr());
    console.log("email", showEmailErr());
    console.log("pass", showPassErr());
    console.log("cpas", showConfirmPassErr());
    console.log("phone", showPhoneErr());
    let button = document.getElementById("submitB");
    if (
        showFullNameErr &&
        showEmailErr() &&
        showPassErr() &&
        showConfirmPassErr() &&
        showPhoneErr()
    ) {
        console.log("ENABLED");
        button.removeAttribute("disabled");
    } else {
        button.setAttribute("disabled", "");
    }
});

function closePopup() {
    const popup = document.getElementById("popup-container");
    popup.style.display = "none";
    popup.style.visibility = "hidden";
}
