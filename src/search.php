<?php
require_once '../php/connection.php';
require_once '../php/utility.php';
checkConnection();
?>

<html>
<head>
    <title>Search</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style/main_style.css"/>
    <script src="js/ajax.js" defer></script>
    <script src="js/search.js" defer></script>
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
    <div class="cards" id="artistes">
<!--        <div class="card">
            <h3 class="card-title">Un artiste de merde</h3>
            <div class="card-body">
                Artist
            </div>
            <div class="card-footer">
                <span class="left">tracks : 126</span>
                <span class="left">|</span>
                <span class="right">albums : 6</span>
            </div>
        </div>
        <div class="card">
            <h1 class="card-title"></h1>
            <div class="card-body">

            </div>
            <div class="card-footer"></div>
        </div>-->
    </div>
    <!-- <hr> -->
    <div class="cards" id="albums">
<!--        <div class="card">
            <h3 class="card-title">Une albume de merde</h3>
            <img src="https://api.deezer.com/album/385146707/image" alt="cover" class="card-img">
            <div class="card-body">
                Album
            </div>
            <div class="card-footer">
                <span class="left">tracks : 26</span>
                <span class="left">|</span>
                <span class="right">artist : Youpi Art.D</span>
            </div>
        </div>
        <div class="card">
            <h1 class="card-title"></h1>
            <div class="card-body">
                <img src="" alt="" class="card-img">
            </div>
            <div class="card-footer"></div>
        </div>-->
    </div>
    <!-- <hr> -->
    <div class="cards" id="tracks">
<!--        <div class="card">
            <h3 class="card-title">Une music de merde</h3>
            <img src="https://api.deezer.com/album/385146707/image" alt="cover" class="card-img">
            <div class="card-body">
                Track
            </div>
            <div class="card-footer">
                <span class="left">duration : 14523s</span>
                <span class="left">|</span>
                <span class="right">artist : Youpi Art.D</span>
            </div>
        </div>
        <div class="card">
            <h1 class="card-title"></h1>
            <div class="card-body">
                <img src="" alt="" class="card-img">
            </div>
            <div class="card-footer"></div>
        </div>-->
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
