// Display favorites
ajaxRequest('GET', '../api.php/favorites', function(playlist){
    console.log(playlist);
    document.getElementById('favorites-name').textContent = playlist.name;

    ajaxRequest('GET', '../api.php/track/playlist/' + playlist.id_playlist, function(trackList) {
        console.log(trackList);
        const trackListContainer = document.getElementById('tracklist-container');
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