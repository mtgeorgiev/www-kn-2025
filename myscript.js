

function revealLoginForm(event) {
    const loginForm = document.getElementById('login-form');
    loginForm.style.display = 'block';
    console.log(event);
}

function hideLoginForm(event) {
    const loginForm = document.getElementById('login-form');
    loginForm.style.display = 'none';
}

function selectListElement(event) {

    if (selectedElements.has(event.target)) {
        event.target.classList.remove('selected');
        selectedElements.delete(event.target);
        return;
    }
    event.target.classList.add('selected');
    selectedElements.add(event.target);
}

function selectListElementV2(event) {

    if (event.target.getAttribute('data-selected') === 'true') {
        event.target.removeAttribute('data-selected');
        event.target.classList.remove('selected');
        return;
    }
    event.target.classList.add('selected');
    event.target.setAttribute('data-selected', 'true');
}

function getSelectedElements() {
    return selectedElements;
}

function getSelectedElementsV2() {
    return document.querySelectorAll('#container div[data-selected="true"]');
}

function loadLoginStatus() {
    fetch('./session.php', {
            method: 'GET',
            headers: {
                'Accept': 'application/json' // works even without this line
            }
        })
        .then(unreadResponse => unreadResponse.json())
        .then(response => {
            if (response.loggedIn) {
                document.getElementById('logout-button').classList.remove('session-controls');
            } else {
                document.getElementById('login-button').classList.remove('session-controls');
            }
        });
}

const loginButton = document.getElementById('login-button');
loginButton.addEventListener('click', revealLoginForm);

const closeButton = document.getElementById('close-button');
closeButton.addEventListener('click', hideLoginForm);

let selectedElements = new Set();

document.querySelectorAll('#container div').forEach(element => {
    element.addEventListener('click', selectListElementV2);
});

document.querySelector('#login-form form')
    .addEventListener('submit', event => {
        event.preventDefault();

        // using form data
        let formData = new FormData(event.target);
        fetch('./session.php', {
            method: 'POST',
            body: formData
        })
        .then(unreadResponse => unreadResponse.json());


        // using json format
        // let email = event.target.querySelector('input[name="email"]').value;
        // let password = event.target.querySelector('input[name="password"]').value;

        // fetch('./session.php', {
        //     method: 'POST',
        //     body: JSON.stringify({ email, password })
        // })
        // .then(unreadResponse => unreadResponse.json());
    });


loadLoginStatus();