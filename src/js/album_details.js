console.log('allo');
let params = new URLSearchParams(document.location.search);
let albumId = params.get('id');

if(albumId){

  ajaxRequest('GET', '../api.php/album/' + albumId, function(album){
    console.log(album);
    document.getElementById('album-name').textContent = album.title;
    ajaxRequest('GET', '../api.php/artist/' + album.artistId, function(artist) {
      console.log(artist);
      document.getElementById('artist-name').textContent = artist.name;
    });
    document.getElementById('release-date').textContent = album.releaseData;
    document.getElementById('album-cover').src = album.imageUrl;

    // Mettre à jour la liste des titres
    ajaxRequest('GET', '../api.php/track/album/' + albumId, function(trackList) {
      console.log(trackList);
      const trackListContainer = document.getElementById('tracklist-container');
      for (let i = 0; i < trackList.length; i++) {
        const track = trackList[i];
        const trackHtml = '<div class="track">' +
            `<img src="${album.imageUrl}" alt="album">` +
            '<p class="track_name">' + (i+1) + '. ' + track.title + '</p>' +
            '</div>';
        trackListContainer.insertAdjacentHTML('beforeend', trackHtml);
      }
    })
  });
}
