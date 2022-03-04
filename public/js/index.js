function ShowPassword(input) {
    document.getElementById(input).type = document.getElementById(input).type == "password" ? "text" : "password";
}

function handlePasswordChange() {
    let pass1 = document.getElementById("signUpPass1");
    let pass2 = document.getElementById("signUpPass2");
    if (pass1.value != pass2.value) {
        pass1.classList.add("invalid");
        pass2.classList.add("invalid");
        dangerAlert.innerHTML = "<span>Different passwords<span/>"
        dangerAlert.style.display = "block";
    } else {
        pass1.classList.remove("invalid");
        pass2.classList.remove("invalid");
        dangerAlert.innerHTML = "";
        dangerAlert.style.display = "none";
    }
}

function handleSubmit(event, form) {
    event.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signUp");
    let data = new FormData(document.forms[`${form.name}`]);
    if (data.get('password1') === data.get('password2')) {
        xhr.send(data);
        xhr.onload = () => {
            response = JSON.parse(xhr.response);
            if (result.result == "success") {

            } else {
                result.errors.forEach(error => {
                    dangerAlert.innerHTML += `<span>${error}<span/><br/>`
                });
                dangerAlert.style.display = "block";
            }
        }
    } else {
        dangerAlert.innerHTML = "<span>Different passwords<span/>"
        dangerAlert.style.display = "block";
    }
}