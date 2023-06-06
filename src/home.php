<?php
require_once '../php/connection.php';
checkConnection();
?>

<html>
<head>
  <title>Home</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/home.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

<nav>
  <div class="logo"></div>
  <div class="nav_item">
    <a href="#">
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
  <div class="filter_search">

  </div>

  <div class="history">
    <!-- last 10 tracks played -->
    
  </div>

  <div class="playlists">
    <!-- apperçu de quelques playlists qui redirigent vers la page playlists.html -->
    <div class="playlist_item">
      <img class="playlist_cover" src="images/album_covers/cover_1.jpg" alt="cover"/>
      <div class="playlist_info">
        <p class="playlist_title">Title</p>
        <p class="playlist_artist">Artist</p>
      </div>
  </div>

  <div class="favorites">
    <!-- apperçu de quelques favoris qui redirigent vers la page favorites.html -->
    <div class="favorite_item">
      <img class="favorite_cover" src="images/album_covers/cover_1.jpg" alt="cover"/>
      <div class="favorite_info">
        <p class="favorite_title">Title</p>
        <p class="favorite_artist">Artist</p>
      </div>
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
