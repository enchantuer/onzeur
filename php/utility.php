<?php
function get_nav(): string {
    echo $_SERVER['PHP_SELF'];
    if($_SERVER['PHP_SELF']!=='/onzeur/src/home.php'){
        $homeIcon = '<img class="nav_icon" src="icons/broken/home_191919.svg" alt="home"><img class="nav_icon_dark" src="icons/broken/home_ffffff.svg" alt="home">';
    }else{
        $homeIcon = '<img class="nav_icon" src="icons/broken/home_ee7733.svg" alt="home">';
    }
    if($_SERVER['PHP_SELF']==='/onzeur/src/home.php') {
        $home = 'active';
    } else {
        $home = '';
    }

    if ($_SERVER['PHP_SELF'] === '/onzeur/src/search.php') {
        $search = 'active';
    } else {
        $search = '';
    }
    if ($_SERVER['PHP_SELF'] !== '/onzeur/src/search.php') {
        $searchIcon = '<img class="nav_icon" src="icons/broken/search_191919.svg" alt="search"><img class="nav_icon_dark" src="icons/broken/search_ffffff.svg" alt="search">';
    } else {
        $searchIcon = '<img class="nav_icon" src="icons/broken/search_ee7733.svg" alt="search">';
    }

    if ($_SERVER['PHP_SELF'] === '/onzeur/src/playlists.php') {
        $playlist = 'active';
    } else {
        $playlist = '';
    }
    if ($_SERVER['PHP_SELF'] !== '/onzeur/src/playlists.php') {
        $playlistIcon = '<img class="nav_icon" src="icons/broken/playlists_191919.svg" alt="search"><img class="nav_icon_dark" src="icons/broken/playlists_ffffff.svg" alt="search">';
    } else {
        $playlistIcon = '<img class="nav_icon" src="icons/broken/playlists_ee7733.svg" alt="search">';
    }

    if ($_SERVER['PHP_SELF'] === '/onzeur/src/profile.php') {
        $profile = 'active';
    } else {
        $profile = '';
    }
    if ($_SERVER['PHP_SELF'] !== '/onzeur/src/profile.php') {
        $profileIcon = '<img class="nav_icon" src="icons/broken/profile_191919.svg" alt="search"><img class="nav_icon_dark" src="icons/broken/profile_ffffff.svg" alt="search">';
    } else {
        $profileIcon = '<img class="nav_icon" src="icons/broken/profile_ee7733.svg" alt="search">';
    }

    return "
    <nav>
    <div class='logo'></div>
    <div class='nav_item $home'>
        <a href='home.php'>
            $homeIcon
            <p>Home</p>
        </a>
    </div>
    <div class='nav_item $search'>
        <a href='search.php'>
            $searchIcon
            <p>Search</p>
        </a>
    </div>
    <div class='nav_item $playlist'>
        <a href='playlists.php'>
            $playlistIcon
            <p>Playlists</p>
        </a>
    </div>
    <div class='nav_item $profile'>
        <a href='profile.php'>
            $profileIcon
            <p>Profile</p>
        </a>
    </div>
    <div class='nav_item'>
        <a href='disconnect.php'>
            <p>Logout</p>
        </a>
    </div>
    </nav>
    ";
}