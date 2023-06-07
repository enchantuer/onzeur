document.addEventListener("DOMContentLoaded", function() {
  const audio = document.getElementById('audio');
  const audioSource = document.getElementById('audio-source');
  const trackTitle = document.getElementById('track-title');
  const artistName = document.getElementById('artist-name');
  const albumName = document.getElementById('album-name');
  // const progressBar = document.querySelector('.progress');
  // const playPauseButton = document.getElementById('play-pause-button');

  // Mettre à jour la barre de progression
  // audio.addEventListener('timeupdate', () => {
  //   const progress = (audio.currentTime / audio.duration) * 100;
  //   progressBar.style.width = `${progress}%`;
  // });
  //
  // // Mettre à jour le bouton de lecture/pause
  // playPauseButton.addEventListener('click', () => {
  //   if (audio.paused) {
  //     audio.play();
  //     playPauseButton.classList.remove('play');
  //     playPauseButton.classList.add('pause');
  //   } else {
  //     audio.pause();
  //     playPauseButton.classList.remove('pause');
  //     playPauseButton.classList.add('play');
  //   }
  // });

  // Récupérer l'id de la track à partir des paramètres de l'URL
  const params = new URLSearchParams(document.location.search);
  const trackId = params.get('id');
  // Recupere les info de la track
  ajaxRequest('GET', '../api.php/track/'+trackId, displayTrack);
  ajaxRequest('POST', '../api.php/history', () => {}, 'id='+trackId);
  function displayTrack(data) {
    console.log(data);
    // Mettre à jour le titre du morceau
    trackTitle.textContent = data.title;
    artistName.textContent = data.artistName;
    albumName.textContent = data.albumName;
    document.querySelector('#trackImage').src = data.image

    // Charger et jouer le fichier audio
    if (data.url) {
      audioSource.src = data.url;
      audio.load();
      audio.play();
    }
  }
});
