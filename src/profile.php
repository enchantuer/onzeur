<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
  <title>Profile</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/profile.js" defer></script>
</head>
<body>

<header>
  <h1>Profile</h1>
</header>

<?php echo get_nav(); ?>

<form name="registration" action="" method="post" id="form">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstName" id="first_name" placeholder="First Name" required readonly/>
  <label for="lastname">Last Name:</label>
  <input type="text" name="lastName" id="last_name" placeholder="Last Name" required readonly/>
  <label for="birthdate">Birthdate:</label>
  <input type="date" name="birthdate" id="birthdate" placeholder="Birthdate" required readonly/>
  <label for="birthdate">Age:</label>
  <input type="number" name="age" id="age" placeholder="Age" disabled/>
  <label for="email">Email:</label>
  <input type="email" name="email" id="email" placeholder="Email" required readonly/>
  <label for="password">Password:</label>
  <input type="password" name="password" id="password" placeholder="New Password" readonly/>
  <label for="password2">Password Verification:</label>
  <input type="password" name="password2" id="password2" placeholder="Password Verification" readonly/>
  <input class="button" type="button" name="edit" id="edit" value="Edit"/>
  <input class="button" type="submit" name="submit" value="Save"/>
  <p id="errors" style="display: none"></p>
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

</html>