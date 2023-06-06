<?php
require_once '../php/connection.php';
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

<nav>
  <div class="logo"></div>
  <div class="nav_item">
    <a href="home.php">
      <img class="nav_icon" src="icons/broken/home_191919.svg" alt="home">
      <img class="nav_icon_dark" src="icons/broken/home_ffffff.svg" alt="home">
      <p>Home</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="search.php">
      <img class="nav_icon" src="icons/broken/search_191919.svg" alt="search">
      <img class="nav_icon_dark" src="icons/broken/search_ffffff.svg" alt="search">
      <p>Search</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="playlists.php">
      <img class="nav_icon" src="icons/broken/playlists_191919.svg" alt="playlists">
      <img class="nav_icon_dark" src="icons/broken/playlists_ffffff.svg" alt="playlists">
      <p>Playlists</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="#">
      <img class="nav_icon" src="icons/broken/profile_191919.svg" alt="profile">
      <img class="nav_icon_dark" src="icons/broken/profile_ffffff.svg" alt="profile">
      <p>Profile</p>
    </a>
  </div>
</nav>

<form name="registration" action="" method="post" id="form">
  <label for="firstname">First Name:</label>
  <input type="text" name="firstName" id="firstname" placeholder="First Name" required readonly/>
  <label for="lastname">Last Name:</label>
  <input type="text" name="lastName" id="lastname" placeholder="Last Name" required readonly/>
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