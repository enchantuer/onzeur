let params = new URLSearchParams(document.location.search);
let artistId = params.get('id');

if (artistId) {
  ajaxRequest('GET', '../api.php/artist/' + artistId, function(artist) {
    console.log(artist);
    document.getElementById('artist-name').textContent = artist.name;
    document.getElementById('artist-type').textContent = artist.type;

    // Mettre à jour la liste des albums de l'artiste
    ajaxRequest('GET', '../api.php/album/artist/' + artistId, function(albumList) {
      console.log(albumList);
      const albumListContainer = document.getElementById('album-list-container');
      for (let i = 0; i < albumList.length; i++) {
        const album = albumList[i];
        const albumHtml = '<div class="album">' +
          `<a href="album_details.php?id=${album.id}">` +
          `<img src="${album.imageUrl}" alt="album">` +
          '<p class="album_title">' + album.title + '</p>' +
          '<p class="album_year">' + album.releaseDate + '</p>' +
          '</a>' +
          '</div>';
        albumListContainer.insertAdjacentHTML('beforeend', albumHtml);
      }
    });
  });
}
