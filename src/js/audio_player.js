document.addEventListener("DOMContentLoaded", function() {
  const audio = document.getElementById('audio');
  const audioSource = document.getElementById('audio-source');
  const trackTitle = document.getElementById('track-title');

  // Récupérer l'URL du fichier audio à partir des paramètres de l'URL
  const params = new URLSearchParams(document.location.search);
  const audioUrl = params.get('audioUrl');
  const trackName = params.get('trackName');

  // Mettre à jour le titre du morceau
  trackTitle.textContent = trackName;

  // Charger et jouer le fichier audio
  if (audioUrl) {
    audioSource.src = audioUrl;
    audio.load();
    audio.play();
  }
});
