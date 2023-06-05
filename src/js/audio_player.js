document.addEventListener("DOMContentLoaded", function() {
  const audio = document.getElementById('audio');
  const audioSource = document.getElementById('audio-source');
  const trackTitle = document.getElementById('track-title');

  // Récupérer l'id de la track à partir des paramètres de l'URL
  const params = new URLSearchParams(document.location.search);
  const trackId = params.get('id');
  // Recupere les info de la track
  ajaxRequest('GET', '../api.php/track/'+trackId, displayTrack);

  function displayTrack(data) {
    // Mettre à jour le titre du morceau
    trackTitle.textContent = data.title;
    document.querySelector('#trackImage').src = data.image

    // Charger et jouer le fichier audio
    if (data.url) {
      audioSource.src = data.url;
      audio.load();
      audio.play();
    }
  }
});
