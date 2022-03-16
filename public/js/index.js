function ShowPassword(input) {
    let inputField = document.getElementById(input);
    inputField.type = inputField.type == "password" ? "text" : "password";
}


function handlePasswordChange(first, second) {
    successAlert.style.display = "none";
    let pass1 = document.getElementById(first.id);
    let pass2 = document.getElementById(second);
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

function addOrder(event, form) {
    event.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", `/addOrder`);

    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);

    let data = new FormData(document.forms[`${form.name}`]);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            window.location.assign('/');
        } else {
            addOrderAlert.style.display = "block";
        }
    }
}

function sortOrders(currentCategory) {
    currentCategory = currentCategory.value;
    let orders = document.querySelectorAll(`div[data-category]`);
    if (currentCategory == 0) {
        orders.forEach(order => {
            order.style.display = "block";
        });
    } else {
        orders.forEach(order => {
            if (order.dataset.category == currentCategory) {
                order.style.display = "block";
            } else {
                order.style.display = "none";
            }
        });
    }
}

function addCategory(event, form) {
    event.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", `/addCategory`);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);

    let data = new FormData(document.forms[`${form.name}`]);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            location.reload();
        } else {
            addCategoryAlert.style.display = "block";
        }
    }
}

function deleteCategory() {
    let xhr = new XMLHttpRequest();
    let inputs = [...document.querySelectorAll("input[type='checkbox']")];
    let categories = inputs.filter(input => input.checked).map(input => Number(input.dataset.category));
    let data = new FormData();
    data.append('categories', categories);
    xhr.open("POST", `/deleteCategory`);
    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            location.reload();
        }
    }
}

function showChangesMenu() {
    if (category_changes.style.height == 0 || category_changes.style.height == '0px') {
        category_changes.style.height = "100%";
    } else {
        category_changes.style.height = '0px';
    }
    // category_changes.style.height = category_changes.style.height == '0px' ? "100%": "0px";
}

function selectNewStatus(select, orderId) {
    let first = document.querySelector(`form[name=firstStatusForm${orderId}]`);
    let second = document.querySelector(`form[name=secondStatusForm${orderId}]`);
    let currentValue = select.value;
    switch (currentValue) {
        case '1':
            first.style.display = "block";
            second.style.display = "none";
            break;
        case '2':
            first.style.display = "none";
            second.style.display = "block";
            break;
        default:
            first.style.display = "none";
            second.style.display = "none";
            break;
    }
}

function changeStatus(event, form, orderId) {
    event.preventDefault();
    let xhr = new XMLHttpRequest();
    xhr.open("POST", `/changeStatus`);

    xhr.setRequestHeader('X-CSRF-TOKEN', document.querySelector("meta[name='csrf-token']").content);

    let data = new FormData(document.forms[`${form.name}`]);
    data.append('orderId', orderId);
    xhr.send(data);
    xhr.onload = () => {
        response = JSON.parse(xhr.response);
        if (response.result == "success") {
            location.reload();
        }
        console.log(response);
        console.log(response.data);
    }
}