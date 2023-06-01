<?php
$album_name="VV5";
$artist_name="Vald";
$realease_date="16/12/2022";
$tracklist=array("Forfait","Satan 3","Show","Echelon Freestyle","Feelings","Technique","Ruff Ryderz","Bad","Tellement Toi","Reflexions Très Basses","Aucun Retour","Microphone Check","Sushi");
?>

<html>
<head>
  <title>Album</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css"/>
</head>
<body>

<nav>
  <div class="nav_item">
    <a href="#">
      <img src="icons/light/home1.svg" alt="home">
      <p>Home</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="#">
      <img src="icons/light/search1.svg" alt="search">
      <p>Search</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="#">
      <img src="icons/light/playlists1.svg" alt="playlists">
      <p>Playlists</p>
    </a>
  </div>
  <div class="nav_item">
    <a href="#">
      <img src="icons/light/profile1.svg" alt="profile">
      <p>Profile</p>
    </a>
  </div>
</nav>

<main>
  <div class="album">
    <img class="main_cover" src="img/album_covers/vv5.jpg" alt="album">
    <div class="album_info">
      <p class="album_title"><?php echo $album_name; ?></h1>
      <p class="album_artist"><?php echo $artist_name; ?></p>
      <p class="album_year"><?php echo $realease_date; ?></p>
    </div>
  </div>

  <div class="tracklist">
    <?php
    for($i=0;$i<count($tracklist);$i++){
      echo "<div class='track'>";
      echo "<img src='img/album_covers/vv5.jpg' alt='album'>";
      echo "<p class='track_name'>".$i+1 .'. '."$tracklist[$i]</p>";
      echo "</div>";
    }
    ?>
  </div>
  
</main>