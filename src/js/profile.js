let params = new URLSearchParams(document.location.search);
let userId = params.get('id');

if(userId){

  ajaxRequest('GET', '../api.php/user/' + userId, function(user){
    console.log(user);
    document.getElementById('firstname').textContent = user.first_name;
    document.getElementById('lastname').textContent = user.name;
    document.getElementById('birthdate').textContent = user.birthdate;
    document.getElementById('email').textContent = user.email;
  });
}
