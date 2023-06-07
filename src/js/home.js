ajaxRequest('GET', '../api.php/history', function(history){
  console.log(history);
  const historyContainer = document.getElementById('history-container');
  for (let i = 0; i < history.length; i++) {
    const track = history[i];
    const trackHtml = '<div class="track">' +
        `<img src="${track.image}" alt="album">` +
        `<a href="audio_player.php?id=${track.id}" class="track_name_link">${(i+1)}. ${track.title}</a>` +
        '</div>';
    historyContainer.insertAdjacentHTML('beforeend', trackHtml);
  }
});



const searchBar = document.querySelector('form');
searchBar.addEventListener('submit', event => {
    event.preventDefault();
    const filter = Number(document.querySelector('#filter').value);
    const search = document.querySelector('#search').value;
    document.location.href =`search.php?search=${search}&filter=${filter}`;
});

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
// Display favorites
ajaxRequest('GET', '../api.php/favorites', function(playlist){
    console.log(playlist);
    document.getElementById('favorites-name').textContent = playlist.name;

    ajaxRequest('GET', '../api.php/track/playlist/' + playlist.id_playlist, function(trackList) {
        console.log(trackList);
        const trackListContainer = document.getElementById('favorites-container');
        for (let i = 0; i < trackList.length; i++) {
            const track = trackList[i];
            track.addDate = track.addDate.slice(0, -7);
            const trackHtml = document.createElement('div');
            trackHtml.className = 'track';

            const trackImg = document.createElement('img');
            trackImg.src = track.image;
            trackImg.alt = 'album';
            trackHtml.appendChild(trackImg);

            const trackNameLink = document.createElement('a');
            trackNameLink.href = `audio_player.php?id=${track.id}`;
            trackNameLink.className = 'track_name_link';
            trackNameLink.textContent = `${(i+1)}. ${track.title} - ${track.addDate}`;
            trackHtml.appendChild(trackNameLink);

            const deleteButton = document.createElement('button');
            deleteButton.className = 'delete-track';
            deleteButton.textContent = 'Delete';
            deleteButton.addEventListener('click', function() {
                deleteTrackFromPlaylist(track.id, playlist.id_playlist);
            });
            trackHtml.appendChild(deleteButton);

            trackListContainer.appendChild(trackHtml);
        }
    });
});
function deleteTrackFromPlaylist(trackId, playlistId) {
    ajaxRequest(
        'DELETE',
        '../api.php/playlist/track',
        function () {
            console.log('Track deleted from favorites');
            window.location.reload();
        },
        `trackId=${trackId}&playlistId=${playlistId}`
    );
}