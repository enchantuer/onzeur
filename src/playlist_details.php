<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
  <title>Playlist</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/playlist_details.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

<?php echo get_nav(); ?>

<main>
  <div class="playlist_details">
    <p class="playlist_title" id="playlist-name"><!--ici--></p>
    <p class="creation_date" id="creation-date"><!--ici--></p>
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
