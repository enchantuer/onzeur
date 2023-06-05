
function displayProfile(user) {
    document.getElementById('firstname').value = user.firstName;
    document.getElementById('lastname').value = user.lastName;
    document.getElementById('birthdate').value = user.birthdate;
    document.getElementById('email').value = user.email;
    getAge(user);
}

function getAge(user){
    let birthdate= new Date(user.birthdate);
    let today = new Date();
    let age = today.getFullYear() - birthdate.getFullYear();
    if (today.getMonth() < birthdate.getMonth() || (today.getMonth() == birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
        age--;
    }
    document.getElementById('age').value = age;
}


ajaxRequest('GET', '../api.php/user', displayProfile);

const form = document.querySelector("form");
form.addEventListener('submit', event => {
    event.preventDefault();
    const firstName = document.querySelector('#firstname').value;
    const lastName = document.querySelector('#lastname').value;
    const birthdate = document.querySelector('#birthdate').value;
    const email = document.querySelector('#email').value;
    const password = document.querySelector('#password').value;
    ajaxRequest('PUT', '../api.php/user', updateResponse, `firstName=${firstName}&lastName=${lastName}&birthdate=${birthdate}&email=${email}&password=${password}`);

});


function updateResponse(status) {
    if (status === 400) {
        ajaxRequest('GET', '../api.php/user', displayProfile);
    } else {
        document.querySelector('#errors').style.display='none';
    }
}
