<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
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

<?php echo get_nav(); ?>

<main>
  <div class="filter_search">

  </div>

  <h2>History</h2>
  <div class="history" id="history-container">
    <!-- <div class="track">
      <img src="img" alt="album">
      <a href="audio_player.html?id=1" class="track_name_link">titre</a>
    </div> -->
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
