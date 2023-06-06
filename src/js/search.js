const searchBar = document.querySelector('form');
searchBar.addEventListener('submit', event => {
    event.preventDefault();
    document.querySelector('#artistes').innerHTML = '';
    document.querySelector('#albums').innerHTML = '';
    document.querySelector('#tracks').innerHTML = '';
    const filter = Number(document.querySelector('#filter').value);
    const search = document.querySelector('#search').value;
    if (filter === 1 || filter === 0) {
        ajaxRequest('GET', '../api.php/artist', displayArtistes, `name=${search}`)
    }
    if (filter === 2 || filter === 0) {
        ajaxRequest('GET', '../api.php/album', displayAlbum, `title=${search}`)
    }
    if (filter === 3 || filter === 0) {
        ajaxRequest('GET', '../api.php/track', displayTrack, `title=${search}`)
    }
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

    // card.appendChild(link);
    // card.appendChild(title);
    // card.appendChild(image);
    // card.appendChild(body);
    // card.appendChild(footer);
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
        // card.childNodes.item(0).textContent = artist.name;
        // // card.childNodes.item(1).textContent = data.name;
        // card.childNodes.item(2).textContent = 'Artist';
        // const span1 = document.createElement("span");
        // span1.innerHTML = `Albums : ${artist.nbOfAlbums}`
        // const span2 = document.createElement("span");
        // span2.innerHTML = `|`
        // const span3 = document.createElement("span");
        // span3.innerHTML = `Tracks : ${artist.nbOfTracks}`
        // const footer = card.childNodes.item(3);
        // footer.appendChild(span1);
        // footer.appendChild(span2);
        // footer.appendChild(span3);
        
        artistCards.appendChild(card);
        // content="<a href='album_details.html?id="+artist.id+">"+card+"</a>"
        // artistCards.innerHTML+=content;
        // artistCards.appendChild(content);
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
        // const card = generateCard();
        // card.childNodes.item(0).textContent = album.name;
        // // console.log(card.childNodes.item(1))
        // card.childNodes.item(2).textContent = 'Album';
        // const span1 = document.createElement("span");
        // span1.innerHTML = `Artist : ${album.artistName}`
        // const span2 = document.createElement("span");
        // span2.innerHTML = `|`
        // const span3 = document.createElement("span");
        // span3.innerHTML = `Tracks : ${album.nbOfTracks}`
        // const footer = card.childNodes.item(3);
        // footer.appendChild(span1);
        // footer.appendChild(span2);
        // footer.appendChild(span3);
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
            `track_details.php?id=${track.id}`
        );
        // const card = generateCard();
        // card.childNodes.item(0).textContent = track.name;
        // // card.childNodes.item(1).textContent = data.name;
        // card.childNodes.item(2).textContent = 'Track';
        // const span1 = document.createElement("span");
        // span1.innerHTML = `Artist : ${track.artistName}`
        // const span2 = document.createElement("span");
        // span2.innerHTML = `|`
        // const span3 = document.createElement("span");
        // span3.innerHTML = `Album : ${track.albumName}`
        // const footer = card.childNodes.item(3);
        // footer.appendChild(span1);
        // footer.appendChild(span2);
        // footer.appendChild(span3);
        trackCards.appendChild(card);
    }
}