<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../php/database.php';
$conn = dbConnect();
session_start();

if (isset($_SESSION['userId']) && isValidUser($conn, $_SESSION['userId'])) {
    header('Location: home.php');
    exit();
}
?>

<html>
<head>
  <title>Login</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
</head>
<body>

<header>
  <h1>Login</h1>
  <p>Don't have an account? <a href='signup.php'>SIGN UP</a></p>
</header>

<form name="login" action="" method="post">
  <label for="email">Email:</label>
  <input type="email" name="email" placeholder="Email" required/>
  <label for="password">Password:</label>
  <input type="password" name="password" placeholder="Password" required/>
  <input class="button" type="submit" name="submit" value="Login"/>
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

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userId = dbVerifyPassword($conn, $email, $password);
    if ($userId === false) {
        echo 'Incorrect Credentials';
    } else {
        $_SESSION['userId'] = $userId;
        header('Location: home.php');
        exit();
    }
}
?>

</body>
</html>
