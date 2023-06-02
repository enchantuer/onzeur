<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
</head>
<body>

<header>
  <h1>Sign Up</h1>
  <p>Already have an account? <a href='login.php'>LOG IN</a></p>
</header>

<form name="registration" action="" method="post">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstname" placeholder="First Name" required/>
  <label for="lastname">Last Name:</label>
  <input type="text" name="lastname" placeholder="Last Name" required/>
  <label for="birthdate">Birthdate:</label>
  <input type="date" name="birthdate" placeholder="Birthdate" required/>
  <label for="email">Email:</label>
  <input type="email" name="email" placeholder="Email" required/>
  <label for="password">Password:</label>
  <input type="password" name="password" placeholder="Password" required/>
  <label for="password2">Password Verification:</label>
  <input type="password" name="password2" placeholder="Password Verification" required/>
  <input class="button" type="submit" name="submit" value="Sign Up"/>
</form>

<label id="theme_switch" for="theme">
  <img class="moon" src="icons/broken/moon_191919.svg" alt="moon"/>
  <img class="sun" src="icons/broken/sun_ffffff.svg" alt="sun"/>
  <input type="checkbox" id="theme"/>
  <div class="slider round"></div>
</label>

<script>
  const toggle=document.getElementById('theme');
  const elements=document.getElementsByTagName('*');

  toggle.addEventListener('input',e=>{
    const checked=e.target.checked;

    if(checked){
      for(let i=0;i<elements.length;i++){
        elements[i].classList.add('dark');
      }
    }else{
      for(let i=0;i<elements.length;i++){
        elements[i].classList.remove('dark');
      }
    }
  });
</script>

</body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once '../../php/database.php';
    require_once '../../php/add.php';
    $conn = dbConnect();

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $birthdate = $_POST['birthdate'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    if ($password != $password2) {
        echo "Les mots de passe ne correspondent pas.";
        exit();
    }

    $success = dbAddUser($conn, $firstname, $lastname, $birthdate, $email, $password);
    if ($success) {
        echo "Votre compte a bien été créé.";
    } else {
        echo "Une erreur est survenue lors de la création de votre compte.";
    }

}
?>




</html>