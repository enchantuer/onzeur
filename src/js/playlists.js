ajaxRequest('GET', '../api.php/playlist', function(playlistList) {
    console.log(playlistList);
    const playlistListContainer = document.getElementById('playlist-list-container');
    for (let i = 0; i < playlistList.length; i++) {
        const playlist = playlistList[i];
        const playlistHtml = '<div class="playlist">' +
            `<a href="playlist_details.html?id=${playlist.id}" class="playlist_name_link">${playlist.name}</a>` +
            '</div>';
        playlistListContainer.insertAdjacentHTML('beforeend', playlistHtml);
    }
});