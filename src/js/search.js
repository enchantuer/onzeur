function checkGet() {
    let params = new URLSearchParams(document.location.search);
    let search = params.get('search');
    let filter = Number(params.get('filter'));
    if (search != undefined && filter != undefined) {
        console.log('Get search and filter detected :', search, '|', filter);
        searchRequest(search, filter);
        document.querySelector('#search').value = search;
        document.querySelector('#filter').value = filter;
    }
}
checkGet();

function searchRequest(search, filter) {
    if (filter === 1 || filter === 0) {
        ajaxRequest('GET', '../api.php/artist', displayArtistes, `name=${search}`)
    }
    if (filter === 2 || filter === 0) {
        ajaxRequest('GET', '../api.php/album', displayAlbum, `title=${search}`)
    }
    if (filter === 3 || filter === 0) {
        ajaxRequest('GET', '../api.php/track', displayTrack, `title=${search}`)
    }
}

const searchBar = document.querySelector('form');
searchBar.addEventListener('submit', event => {
    event.preventDefault();
    document.querySelector('#artistes').innerHTML = '';
    document.querySelector('#albums').innerHTML = '';
    document.querySelector('#tracks').innerHTML = '';
    const filter = Number(document.querySelector('#filter').value);
    const search = document.querySelector('#search').value;
    searchRequest(search, filter);
});

function generateCard(titleText, imgSrc, bodyText, footerContent,linkUrl){
    const card = document.createElement("div");
    card.className = 'card';

    const link = document.createElement("a");
    link.href = linkUrl;
    link.className = 'card-link';
    card.appendChild(link);

    const title = document.createElement('h3');
    title.className = 'card-title';
    title.innerHTML = titleText;
    link.appendChild(title);
    const image = document.createElement('img');
    image.className = 'card-img';
    image.src = imgSrc;
    link.appendChild(image);
    const body = document.createElement('div');
    body.className = 'card-body';
    body.innerHTML = bodyText;
    link.appendChild(body);
    const footer = document.createElement('div');
    footer.className = 'card-footer';
    footer.innerHTML = footerContent;
    link.appendChild(footer);
    return card
}

function displayArtistes(data) {
    console.log(data);
    const artistCards = document.querySelector('#artistes');
    for (const artist of data) {
        console.log(artist)
        const card = generateCard(
            artist.name,
            '',
            'Artist',
            `<span>Albums : ${artist.nbOfAlbums}</span>
                <span>|</span>
                <span>Tracks : ${artist.nbOfTracks}</span>`,
            `artist_details.php?id=${artist.id}`
        );
        artistCards.appendChild(card);
    }
}

function displayAlbum(data) {
    console.log(data);
    const albumCard = document.querySelector('#albums');
    for (const album of data) {
        const card = generateCard(
            album.title,
            album.imageUrl,
            'Album',
            `<span>${album.artistName}</span>
                <span>|</span>
                <span>Tracks : ${album.nbOfTracks}</span>`,
            `album_details.php?id=${album.id}`
        );
        albumCard.appendChild(card);
    }
}

function displayTrack(data) {
    console.log(data);
    const trackCards = document.querySelector('#tracks');
    for (const track of data) {
        const card = generateCard(
            track.title,
            track.image,
            'Track',
            `<span>${track.artistName}</span>
                <span>|</span>  
                <span>Album : ${track.albumName}</span>`,
            `audio_player.php?id=${track.id}`
        );
        trackCards.appendChild(card);
    }
}