function displayPlaylists(playlistList) {
    console.log(playlistList);
    const playlistListContainer = document.getElementById('playlist-list');
    playlistListContainer.innerHTML = '';
    for (let i = 0; i < playlistList.length; i++) {
        const playlist = playlistList[i];
        const playlistHtml = '<div class="playlist">' +
            `<a href="playlist_details.php?id=${playlist.id}" class="playlist_name_link">${playlist.name} - ${playlist.creationDate}</a>` +
            '</div>';
        playlistListContainer.insertAdjacentHTML('beforeend', playlistHtml);
    }
}

ajaxRequest('GET', '../api.php/playlist', displayPlaylists);

ajaxRequest('GET', '../api.php/favorites', function(favorites) {
    console.log(favorites);
    document.getElementById('favorites-name').textContent = favorites.name;
});

const form = document.querySelector("form");
form.addEventListener('submit', event => {
    event.preventDefault();
    const name = document.getElementById('playlist_name').value;
    ajaxRequest(
        'POST',
        '../api.php/playlist',
        function(playlist){
            console.log(playlist);
            ajaxRequest('GET', '../api.php/playlist', displayPlaylists);
        },
        "name="+ name
    ) 
});