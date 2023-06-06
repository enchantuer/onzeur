console.log('allo');
let params = new URLSearchParams(document.location.search);
let albumId = params.get('id');

if(albumId){

  ajaxRequest('GET', '../api.php/album/' + albumId, function(album){
    console.log(album);
    document.getElementById('album-name').textContent = album.title;
    ajaxRequest('GET', '../api.php/artist/' + album.artistId, function(artist){
      console.log(artist);
      document.getElementById('artist-name').textContent = artist.name;
    });
    document.getElementById('release-date').textContent = album.releaseDate;
    document.getElementById('album-cover').src = album.imageUrl;

    // Mettre à jour la liste des titres
    ajaxRequest('GET', '../api.php/playlist', function(playlists) {
      console.log(playlists);
      ajaxRequest('GET', '../api.php/track/album/' + albumId, (trackList) => displayTracks(trackList, playlists)); 
    });

    function displayTracks(trackList, playlists) {
      console.log(trackList, playlists);
      const trackListContainer = document.getElementById('tracklist-container');
      for (let i = 0; i < trackList.length; i++) {
        const track = trackList[i];
        
        const trackHtml = document.createElement('div');
        trackHtml.className = 'track';
        
        const trackImg = document.createElement('img');
        trackImg.src = album.imageUrl;
        trackImg.alt = 'album';
        trackHtml.appendChild(trackImg);
        
        const trackNameLink = document.createElement('a');
        trackNameLink.href = `audio_player.php?id=${track.id}`;
        trackNameLink.className = 'track_name_link';
        trackNameLink.textContent = `${(i+1)}. ${track.title}`;
        trackHtml.appendChild(trackNameLink);
        
        const selectContainer = document.createElement('div');
        selectContainer.className = 'select-container';
        const select = document.createElement('select');
        select.id = 'filter';
        selectContainer.appendChild(select);
        
        const option = document.createElement('option');
        option.name = 'searchBy';
        option.value = 'disabled';
        option.disabled = true;
        option.selected = true;
        option.textContent = 'Chose Playlist';

        select.appendChild(option);
        for (const playlist of playlists) {
          const option = document.createElement('option');
          option.name = 'searchBy';
          option.value = playlist.id;
          option.textContent = playlist.name;
          select.appendChild(option);
        }
        trackHtml.appendChild(selectContainer);
        trackListContainer.appendChild(trackHtml);
      }
    }
  });
}

function addTrackToPlaylist(trackId, playlistId) {
  ajaxRequest('POST', '../api.php/playlist/' + playlistId + '/track/' + trackId, function() {
    console.log('Track added to playlist');
  });
}

function playTrack(audioUrl, title) {
  const urlParams = new URLSearchParams();
  urlParams.append('audioUrl', audioUrl);
  urlParams.append('title', title);
  window.location.href = 'audio_player.php?' + urlParams.toString();
}





