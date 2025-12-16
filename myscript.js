

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
    fetch('./session.php', { method: 'GET' })
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

loadLoginStatus();