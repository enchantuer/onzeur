
function displayProfile(user) {
    console.log(user);
    document.getElementById('firstname').value = user.firstName;
    document.getElementById('lastname').value = user.lastName;
    document.getElementById('birthdate').value = user.birthdate;
    document.getElementById('email').value = user.email;
    getAge();
}

function getAge(){
    let birthdate= new Date(user.birthdate);
    let today = new Date();
    let age = today.getFullYear() - birthdate.getFullYear();
    if (today.getMonth() < birthdate.getMonth() || (today.getMonth() == birthdate.getMonth() && today.getDate() < birthdate.getDate())) {
        age--;
    }
    document.getElementById('age').value = age;
}


ajaxRequest('GET', '../api.php/user', displayProfile(user));

ajaxRequest('PUT', '../api.php/user', displayProfile(user), `first_name=${user.firstName}&last_name=${user.lastName}&birth_date=${user.birthdate}&email=${user.email}&password=${user.password}`);



