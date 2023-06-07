<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
  <title>Artist</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/artist_details.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

<?php echo get_nav(); ?>

<main>
  <div class="artist">
    <img class="artist_picture" id="artist-picture" src="#" alt="artist">
    <div class="artist_info">
      <p class="artist_name" id="artist-name"><!--ici--></p>
      <p class="artist_type" id="artist-type"><!--ici--></p>
    </div>
  </div>

  <div class="album_list" id="album-list-container">
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
