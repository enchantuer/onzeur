<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
  <title>Track</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style/main_style.css"/>
  <script src="js/ajax.js" defer></script>
  <script src="js/audio_player.js" defer></script>
  <script src="js/theme_switch.js" defer></script>
</head>
<body>

<?php echo get_nav(); ?>

<main>
  <h1 id="track-title"><!--titre--></h1>
  <h2 id="album-name"><!--titre--></h2>
  <h3 id="artist-name"><!--titre--></h3>
  <img src="" alt="album" id="trackImage">
  <div class="audio-player">
    <audio id="audio" controls>
      <source id="audio-source" type="audio/mp3">
    </audio>
    <!--
      work in progress progress bar à la mano
      <div class="progress-bar">
        <div class="progress"></div>
      </div>
      <button id="play-pause-button" class="play"></button>
    -->
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
