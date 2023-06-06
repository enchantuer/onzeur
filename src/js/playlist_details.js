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
              const trackHtml = '<div class="track">' +
                  `<img src="${album.imageUrl}" alt="album">` +
                  `<a href="audio_player.html?id=${track.id}" class="track_name_link">${(i+1)}. ${track.title}</a>` +
                  '</div>';
              trackListContainer.insertAdjacentHTML('beforeend', trackHtml);
            }
          });
        });
    }

function displayTrack(track){
    console.log(track);
    

}