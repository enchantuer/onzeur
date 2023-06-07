<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
  <title>Album</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/album_details.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

<?php echo get_nav(); ?>

<main>
  <div class="album_details">
    <img class="main_cover" id="album-cover" src="#" alt="album">
    <div class="album_info">
      <p class="album_title" id="album-name"><!--ici--></p>
      <p class="album_artist" id="artist-name"><!--ici--></p>
      <p class="album_year"><span id="release-date"><!--ici--></span> | <span id="album-type"><!--ici--></span></p>
    </div>
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
