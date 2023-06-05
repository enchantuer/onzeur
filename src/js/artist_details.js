let params = new URLSearchParams(document.location.search);
let artistId = params.get('id');

if(artistId){

  ajaxRequest('GET', '../api.php/artist/' + artistId, function(artist){
    console.log(artist);
    document.getElementById('artist-name').textContent = artist.name;
    });

    // Mettre à jour la liste des albums
    ajaxRequest('GET', '../api.php/album/artist/' + artistId, function(albumList) {
      console.log(albumList);
      const trackListContainer = document.getElementById('albumlist-container');
      for (let i = 0; i < albumList.length; i++) {
        const album = albumList[i];
        const albumHtml = '<div class="album">' +
            `<img src="${album.imageUrl}" alt="album">` +
            '<p class="album_name">' + (i+1) + '. ' + album.title + '</p>' +
            '</div>';
        albumListContainer.insertAdjacentHTML('beforeend', albumHtml);
      }
    })
  };

