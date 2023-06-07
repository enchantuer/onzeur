<?php
require_once '../php/connection.php';
checkConnection();
?>

<html>
<head>
  <title>Favorites</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/favorites_details.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

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
    <a href="profile.php">
      <img class="nav_icon" src="icons/broken/profile_191919.svg" alt="profile">
      <img class="nav_icon_dark" src="icons/broken/profile_ffffff.svg" alt="profile">
      <p>Profile</p>
    </a>
  </div>
</nav>

<main>
  <div class="favorites_details">
    <p class="favorites_title" id="favorites-name"><!--ici--></p>
  </div>

  <div class="tracklist" id="tracklist-container">
    <!--ici-->
  </div>
  
</main>

<label id="theme_switch" for="theme">
  <img class="moon" src="icons/broken/moon_191919.svg" alt="moon"/>
  <img class="sun" src="icons/broken/sun_ffffff.svg" alt="sun"/>
  <input type="checkbox" id="theme"/>
  <div class="slider round"></div>
</label>

</body>
</html>
