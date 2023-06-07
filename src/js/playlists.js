function displayPlaylists(playlistList) {
    console.log(playlistList);
    const playlistListContainer = document.getElementById('playlist-list');
    playlistListContainer.innerHTML = '';
    for (let i = 0; i < playlistList.length; i++) {
        const playlist = playlistList[i];

        const playlistHtml = document.createElement('div');
        playlistHtml.className = 'playlist';
        playlistHtml.innerHTML = `<a href="playlist_details.php?id=${playlist.id}" class="playlist_name_link">${playlist.name} - ${playlist.creationDate}</a>`;

        const deleteButton = document.createElement('button');
        deleteButton.className = 'delete-track';
        deleteButton.textContent = 'Delete';
        deleteButton.addEventListener('click', function() {
            deletePlaylist(playlist.id);
        });
        playlistHtml.appendChild(deleteButton);

        playlistListContainer.appendChild(playlistHtml);
    }
}

function deletePlaylist(playlistId) {
    ajaxRequest(
        'DELETE',
        '../api.php/playlist',
        function () {
            console.log('Playlist deleted');
            window.location.reload();
        },
        `id=${playlistId}`
    );
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