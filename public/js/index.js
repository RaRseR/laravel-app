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
        signUpDangerAlert.innerHTML = "<p>Different passwords<p/>";
        signUpDangerAlert.style.display = "block";
    } else {
        pass1.classList.remove("invalid");
        pass2.classList.remove("invalid");
        signUpDangerAlert.style.display = "none";
        signUpDangerAlert.innerHTML = "";
    }
}

function handleSignUpSubmit(event, form) {
    event.preventDefault();
    if (signUpDangerAlert.innerHTML) signUpDangerAlert.innerHTML = "";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signUp");
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);
    let data = new FormData(document.forms[`${form.name}`]);
    if (data.get('password1') === data.get('password2')) {
        xhr.send(data);
        xhr.onload = () => {
            response = JSON.parse(xhr.response);
            if (response.result == "success") {
                form.reset();
                successAlert.style.display = "block";
                signUpDangerAlert.style.display = "none";
                signUpDangerAlert.innerHTML = "";
            } else {
                Object.values(response.errors).forEach(error => {
                    signUpDangerAlert.innerHTML += `<p>${error}<p/>`;
                })
                signUpDangerAlert.style.display = "block";
                successAlert.style.display = "none";
            }
        }
    } else {
        signUpDangerAlert.innerHTML = "<p>Different passwords<p/>"
        signUpDangerAlert.style.display = "block";
    }
}

function handleSignInSubmit(event, form) {
    event.preventDefault();
    if (signInDangerAlert.innerHTML) signInDangerAlert.innerHTML = "";
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signIn");
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);
    let data = new FormData(document.forms[`${form.name}`]);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            window.location.assign('/');
        } else {
            signInDangerAlert.innerHTML += `<p>Incorrect username or password<p/>`;
            signInDangerAlert.style.display = "block";
        }
    }
}

function signOut() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "/signOut");
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);
    xhr.send();
    xhr.onload = () => {
        window.location.assign('/');
    }
}