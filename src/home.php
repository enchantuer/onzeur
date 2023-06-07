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
    <form method="post" class="searchBar">
        <input type="text" placeholder="Search" id="search">
        <button type="submit">
            <div id="img_item_container">
                <img src="icons/broken/search_191919.svg" class="icon">
                <img src="icons/broken/search_ffffff.svg" class="icon_dark">
            </div>
        </button>
        <div class="select-container">
            <select id="filter">
                <option name="searchBy" value="0">All</option>
                <option name="searchBy" value="1">Artist</option>
                <option name="searchBy" value="2">Album</option>
                <option name="searchBy" value="3">Track</option>
            </select>
        </div>
    </form>

  <h2>History</h2>
  <div class="history" id="history-container">
    <!-- <div class="track">
      <img src="img" alt="album">
      <a href="audio_player.html?id=1" class="track_name_link">titre</a>
    </div> -->
  </div>

  <h2>Playlists</h2>
  <div class="playlists">
    <!-- apperçu de quelques playlists qui redirigent vers la page playlists.html -->
    
  </div>

  <h2>Favorites</h2>
  <div class="favorites">
    <!-- apperçu de quelques favoris qui redirigent vers la page favorites.html -->
   
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
