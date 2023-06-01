<html>
<head>
  <title>Sign Up</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<div class="form">
<h1>Sign up</h1>
<p>Already have an account? <a href='login.php'>LOG IN</a></p>
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

</div>

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