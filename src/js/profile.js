document.querySelector('#birthdate').max = new Date().toLocaleDateString('fr-ca');

function displayProfile(user){
    console.log(user.firstName);
    document.getElementById('first_name').value = user.firstName;
    document.getElementById('last_name').value = user.lastName;
    document.getElementById('birthdate').value = user.birthdate;
    document.getElementById('email').value = user.email;
    document.getElementById('age').value = getAge(user.birthdate);
}

function getAge(birthdate){
    let birthdateObject = new Date(birthdate);
    let today = new Date();
    let age = today.getFullYear() - birthdateObject.getFullYear();
    if (today.getMonth() < birthdateObject.getMonth() || (today.getMonth() === birthdateObject.getMonth() && today.getDate() < birthdateObject.getDate())) {
        age--;
    }
    return age;
}


ajaxRequest('GET', '../api.php/user', displayProfile);

const form = document.querySelector("form");
form.addEventListener('submit', event => {
    event.preventDefault();
    const firstName = document.querySelector('#first_name').value;
    const lastName = document.querySelector('#last_name').value;
    const birthdate = document.querySelector('#birthdate').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password');
    const confirmPassword = document.querySelector('#password2');
    if (password.value === confirmPassword.value) {
        ajaxRequest('PUT', '../api.php/user', updateResponse, `firstName=${firstName}&lastName=${lastName}&birthdate=${birthdate}&email=${email}&password=${password.value}`);
    } else {
        document.getElementById('errors').innerText = 'The password are not the same.'
    }
    password.value = '';
    confirmPassword.value = '';

    document.querySelector('#age').value = getAge(document.querySelector('#birthdate').value);
});


function updateResponse(status) {
    if (status === 400) {
        ajaxRequest('GET', '../api.php/user', displayProfile);
    } else {
        document.querySelector('#errors').style.display='none';
    }
}


function toggleFields() {
    const emailInput = document.getElementById('email');
    const firstNameInput = document.getElementById('first_name');
    const lastNameInput = document.getElementById('last_name');
    const dateOfBirthInput = document.getElementById('birthdate');
    const passwordInput = document.getElementById('password');
    const passwordConfirmation = document.getElementById('password2');
    const editBtn = document.getElementById('edit');

    // Activer la modification des champs lors du clic sur le bouton "Edit"
    editBtn.addEventListener('click', function() {
        emailInput.removeAttribute('readonly');
        firstNameInput.removeAttribute('readonly');
        lastNameInput.removeAttribute('readonly');
        dateOfBirthInput.removeAttribute('readonly');
        passwordInput.removeAttribute('readonly');
        passwordConfirmation.removeAttribute('readonly');
    });

    // Desactive les modifications lors du clic sur le bouton "Save"
    form.addEventListener('submit', function() {
        emailInput.setAttribute('readonly', 'true');
        firstNameInput.setAttribute('readonly', 'true');
        lastNameInput.setAttribute('readonly', 'true');
        dateOfBirthInput.setAttribute('readonly', 'true');
        passwordInput.setAttribute('readonly', 'true');
        passwordConfirmation.setAttribute('readonly', 'true');
    });
}
toggleFields();