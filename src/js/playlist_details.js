console.log('allo');
let params = new URLSearchParams(document.location.search);
let playlistId = params.get('id');

if(playlistId){

    ajaxRequest('GET', '../api.php/playlist/' + playlistId, function(playlist){
        console.log(playlist);
        document.getElementById('playlist-name').textContent = playlist.name;
        document.getElementById('creation-date').textContent = playlist.creationDate;

        ajaxRequest('GET', '../api.php/track/playlist/' + playlistId, function(trackList) {
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
                    deleteTrackFromPlaylist(track.id, playlistId);
                });
                trackHtml.appendChild(deleteButton);

                const likeButton = document.createElement('button');
                likeButton.className = 'like-track';
                likeButton.textContent = 'Like';
                likeButton.addEventListener('click', function() {
                    addTrackToFavorites(track.id);
                });
                trackHtml.appendChild(likeButton);
              
              
              /*  const trackHtml = '<div class="track">' +
                  `<img src="${track.image}" alt="album">` +
                  `<a href="audio_player.php?id=${track.id}" class="track_name_link">${(i+1)}. ${track.title} - ${track.addDate}</a>` +
                  `<button class="delete-track" onclick="deleteTrackFromPlaylist(${track.id}, ${playlistId})">Delete</button>` +
                  `<button class="like-track" onclick="addTrackToFavorites(${track.id})">Like</button>` +
                  '</div>';*/
              trackListContainer.appendChild(trackHtml);
            }
          });
        });
    }

function addTrackToFavorites(trackId) {
    ajaxRequest('POST', '../api.php/favorites', function() {
      console.log('Track added to favorites');
    },
    `id=${trackId}`);
}

function deleteTrackFromPlaylist(trackId, playlistId) {
    ajaxRequest(
        'DELETE',
        '../api.php/playlist/track',
        function() {
            console.log('Track deleted from playlist');
            window.location.reload();
        },
        `trackId=${trackId}&playlistId=${playlistId}`
    );
}