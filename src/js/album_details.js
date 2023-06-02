document.addEventListener('DOMContentLoaded', function() {
  let params = new URLSearchParams(document.location.search);
  let albumId = params.get('id');

  if(albumId){

    ajaxRequest('GET', 'api.php/album/' + albumId, function(response){
      document.getElementById('album-name').textContent = response.album_name;
      document.getElementById('artist-name').textContent = response.artist_name;
      document.getElementById('release-date').textContent = response.release_date;

      // Mettre à jour la liste des titres
      var tracklist = response.tracklist;
      var tracklistContainer = document.getElementById('tracklist-container');
      for (var i = 0; i < tracklist.length; i++) {
        var track = tracklist[i];
        var trackHtml = '<div class="track">' +
                        '<img src="img/album_covers/vv5.jpg" alt="album">' +
                        '<p class="track_name">' + (i+1) + '. ' + track + '</p>' +
                        '</div>';
        tracklistContainer.insertAdjacentHTML('beforeend', trackHtml);
      }
    });
  }
});
