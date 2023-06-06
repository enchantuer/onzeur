
function get_nav(){
  navstr=
  <nav>
  <div class="logo"></div>
  <div class="nav_item<?php if($_SERVER['PHP_SELF']==='/src/home.php') echo ' active';?>">
    <a href="#">
      `.
        if($_SERVER['PHP_SELF']==='/src/home.php'){
          echo '<img class="nav_icon" src="icons/broken/home_191919.svg" alt="home">';
          echo '<img class="nav_icon_dark" src="icons/broken/home_ffffff.svg" alt="home">';
        }else{
          echo '<img class="nav_icon" src="icons/broken/home_ee7733.svg" alt="home">';
        }
      ;?>
      <p>Home</p>
    </a>
  </div>
  <div class="nav_item<?php if($_SERVER['PHP_SELF']==='/src/search.php') echo ' active';?>">
    <a href="search.php">
      <?php
        if($_SERVER['PHP_SELF']==='/src/search.php'){
          echo '<img class="nav_icon" src="icons/broken/search_191919.svg" alt="search">';
          echo '<img class="nav_icon_dark" src="icons/broken/search_ffffff.svg" alt="search">';
        }else{
          echo '<img class="nav_icon" src="icons/broken/search_ee7733.svg" alt="search">';
        }
      ;?>
      <p>Search</p>
    </a>
  </div>
  <div class="nav_item<?php if($_SERVER['PHP_SELF']==='/src/playlists.php') echo ' active';?>">
    <a href="playlists.php">
      <?php
        if($_SERVER['PHP_SELF']==='/src/playlists.php'){
          echo '<img class="nav_icon" src="icons/broken/playlists_191919.svg" alt="playlists">';
          echo '<img class="nav_icon_dark" src="icons/broken/playlists_ffffff.svg" alt="playlists">';
        }else{
          echo '<img class="nav_icon" src="icons/broken/playlists_ee7733.svg" alt="playlists">';
        }
      ;?>
      <p>Playlists</p>
    </a>
  </div>
  <div class="nav_item<?php if($_SERVER['PHP_SELF']==='/src/profile.php') echo ' active';?>">
    <a href="profile.php">
      <?php
        if($_SERVER['PHP_SELF']==='/src/profile.php'){
          echo '<img class="nav_icon" src="icons/broken/profile_191919.svg" alt="profile">';
          echo '<img class="nav_icon_dark" src="icons/broken/profile_ffffff.svg" alt="profile">';
        }else{
          echo '<img class="nav_icon" src="icons/broken/profile_ee7733.svg" alt="profile">';
        }
      ;?>
      <p>Profile</p>
    </a>
  </div>
</nav>
  `;
  return navstr;
}