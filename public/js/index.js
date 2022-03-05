function ShowPassword(input) {
    document.getElementById(input).type = document.getElementById(input).type == "password" ? "text" : "password";
}

function handlePasswordChange() {
    successAlert.style.display = "none";
    let pass1 = document.getElementById("signUpPass1");
    let pass2 = document.getElementById("signUpPass2");
    if (pass1.value != pass2.value) {
        pass1.classList.add("invalid");
        pass2.classList.add("invalid");
        dangerAlert.innerHTML = "<p>Different passwords<p/>";
        dangerAlert.style.display = "block";
    } else {
        pass1.classList.remove("invalid");
        pass2.classList.remove("invalid");
        dangerAlert.innerHTML = "";
        dangerAlert.style.display = "none";
    }
}

function handleSignUpSubmit(event, form) {
    event.preventDefault();
    if (dangerAlert.innerHTML) dangerAlert.innerHTML = "";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signUp");
    let data = new FormData(document.forms[`${form.name}`]);
    if (data.get('password1') === data.get('password2')) {
        xhr.send(data);
        xhr.onload = () => {
            response = JSON.parse(xhr.response);
            if (response.result == "success") {
                successAlert.style.display = "block";
                dangerAlert.style.display = "none";
                dangerAlert.innerHTML = "";

                form.reset();
            } else {
                Object.values(response.errors).forEach(error => {
                    dangerAlert.innerHTML += `<p>${error}<p/>`;
                })

                dangerAlert.style.display = "block";
                successAlert.style.display = "none";
            }
        }
    } else {
        dangerAlert.innerHTML = "<p>Different passwords<p/>"
        dangerAlert.style.display = "block";
    }
}

function handleSignInSubmit(event, form) {
    event.preventDefault();
    if (dangerAlert.innerHTML) dangerAlert.innerHTML = "";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signIn");
    let data = new FormData(document.forms[`${form.name}`]);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            window.location.assign('/');
        } else {
            Object.values(response.errors).forEach(error => {
                dangerAlert.innerHTML += `<p>${error}<p/>`;
            });
            dangerAlert.style.display = "block";
        }
    }
}