ajaxRequest('GET', '../api.php/history', function(history){
  console.log(history);
  const historyContainer = document.getElementById('history-container');
  for (let i = 0; i < history.length; i++) {
    const track = history[i];
    const trackHtml = '<div class="track">' +
        `<img src="${track.image}" alt="album">` +
        `<a href="audio_player.php?id=${track.id}" class="track_name_link">${(i+1)}. ${track.title}</a>` +
        '</div>';
    historyContainer.insertAdjacentHTML('beforeend', trackHtml);
  }
});



const searchBar = document.querySelector('form');
searchBar.addEventListener('submit', event => {
    event.preventDefault();
    const filter = Number(document.querySelector('#filter').value);
    const search = document.querySelector('#search').value;
    document.location.href =`search.php?search=${search}&filter=${filter}`;
});