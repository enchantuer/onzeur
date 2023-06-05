import requests
import psycopg


def get_artist(artist_name):
    url = "https://api.deezer.com/search/artist"
    params = {
        "limit": 1,
        "q": artist_name
    }

    response = requests.get(url, params=params)

    if response.status_code == 200:
        data = response.json()
        artist = {}
        artist["deezer_id"] = data["data"][0]["id"]
        artist["name"] = data["data"][0]["name"]
        artist["picture_url"] = data["data"][0]["picture"]
        artist["picture_xl_url"] = data["data"][0]["picture_xl"]
        artist["nb_albums"] = data["data"][0]["nb_album"]
        return artist
    print("erreur api deezer")


def get_albums(artist):
    url = "https://api.deezer.com/artist/{artist_id}/albums"
    params = {
        "limit": artist["nb_albums"]
    }

    response = requests.get(url.format(artist_id=artist["deezer_id"]), params=params)

    if response.status_code == 200:
        data = response.json()
        albums = []
        for album in data["data"]:
            albums.append({
                "deezer_id": album["id"],
                "title": album["title"],
                "cover_url": album["cover"],
                "cover_xl_url": album["cover_xl"],
                "genre_id": album["genre_id"],
                "release_date": album["release_date"],
                "record_type": album["record_type"],
                "explicit_lyrics": album["explicit_lyrics"]
            })
        return albums
    print("erreur api deezer")


def get_tracks(album):
    url = "https://api.deezer.com/album/{album_id}/tracks"
    params = {
        "limit": 50
    }

    response = requests.get(url.format(album_id=album["deezer_id"]), params=params)

    if response.status_code == 200:
        data = response.json()
        tracks = []
        for track in data["data"]:
            tracks.append({
                "deezer_id": track["id"],
                "title": track["title"],
                "link": track["preview"],
                "duration": track["duration"],
                "track_position": track["track_position"],
                "disk_number": track["disk_number"]
            })
        return tracks
    print("erreur api deezer")


def get_all_genres():
    url = "https://api.deezer.com/genre"
    params = {
        "limit": 50
    }

    response = requests.get(url, params=params)

    if response.status_code == 200:
        data = response.json()
        genres = []
        for genre in data["data"]:
            genres.append({
                "deezer_id": genre["id"],
                "name": genre["name"],
                "picture_url": genre["picture"],
                "picture_xl_url": genre["picture_xl"]
            })
        return genres
    print("erreur api deezer")


# INSERT INTO music_type_ (type) VALUES ('POP'), ('RAP') ('ROCK');
# INSERT INTO artist_ (name, id_type) VALUES ('Artist', (SELECT id_type FROM artist_type_ WHERE type='BAND'));
# INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES ('Album', now(), 'url', (SELECT id_artist FROM artist_ WHERE name='Artist'), (SELECT id_type FROM music_type_ WHERE type='POP'));
# INSERT INTO track_ (title, duration, id_album, id_artist) VALUES ('Track', 0, (SELECT id_album FROM album_ WHERE title='Album'), (SELECT id_artist FROM artist_ WHERE name='Artist'))


artistes_single = ['Vald', 'Ariana Grande']
artistes_band = ['Stray Kids', 'Imagine Dragons']

# with open("test.sql", "w") as file:
#   file.write("INSERT INTO artist_type_ (type) VALUES ('BAND'), ('SINGLE');\n")
#   genres={}
#   for genre in get_all_genres():
#     genres[genre["deezer_id"]]=genre["name"]
#     file.write("INSERT INTO music_type_ (type) VALUES ('{genre}');\n".format(genre=genre["name"]))
#   for artiste in artistes_single:
#     artist=get_artist(artiste)
#     file.write("INSERT INTO artist_ (name, id_type) VALUES ('{name}', (SELECT id_type FROM artist_type_ WHERE type='SINGLE'));\n".format(name=artist["name"]))
#     for album in get_albums(artist):
#       genre=genres.get(album["genre_id"],'INCONNU')
#       file.write("INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES ('{title}', '{release_date}', '{image}', (SELECT id_artist FROM artist_ WHERE name='{name}'), (SELECT id_type FROM music_type_ WHERE type='{genre}'));\n".format(title=album["title"], release_date=album["release_date"], image=album["cover_xl_url"], name=artist["name"], genre=genres))
#       for track in get_tracks(album):
#         file.write("INSERT INTO track_ (title, duration, id_album, id_artist) VALUES ('{title}', {duration}, (SELECT id_album FROM album_ WHERE title='{title_album}'), (SELECT id_artist FROM artist_ WHERE name='{name_artist}'));\n".format(title=track["title"], duration=track["duration"], title_album=album["title"], name_artist=artist["name"]))
#   for artiste in artistes_band:
#     artist=get_artist(artiste)
#     file.write("INSERT INTO artist_ (name, id_type) VALUES ('{name}', (SELECT id_type FROM artist_type_ WHERE type='BAND'));\n".format(name=artist["name"]))
#     for album in get_albums(artist):
#       file.write("INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES ('{title}', '{release_date}', '{image}', (SELECT id_artist FROM artist_ WHERE name='{name}'), (SELECT id_type FROM music_type_ WHERE type='{genre}'));\n".format(title=album["title"], release_date=album["release_date"], image=album["cover_xl_url"], name=artist["name"], genre=genres[album["genre_id"]]))
#       for track in get_tracks(album):
#         file.write("INSERT INTO track_ (title, duration, id_album, id_artist) VALUES ('{title}', {duration}, (SELECT id_album FROM album_ WHERE title='{title_album}'), (SELECT id_artist FROM artist_ WHERE name='{name_artist}'));\n".format(title=track["title"], duration=track["duration"], title_album=album["title"], name_artist=artist["name"]))
#
# print("Le fichier test.sql a été créé avec succès.")

# Connect to an existing database
with psycopg.connect("postgresql://jarvis:password@localhost/onzeur") as conn:
    # Open a cursor to perform database operations
    # with conn.cursor() as cur:
    #     cur.execute(
    #         "INSERT INTO artist_ (name, id_type) VALUES (%s, %s)",
    #         ('Test', 1)
    #     )
    #     conn.commit()
    with conn.cursor() as cur:
        cur.execute("INSERT INTO artist_type_ (type) VALUES ('BAND'), ('SINGLE');")
        cur.execute("INSERT INTO music_type_ (type) VALUES ('INCONNU');")
        genres = {}
        for genre in get_all_genres():
            genres[genre["deezer_id"]] = genre["name"]
            cur.execute(
                "INSERT INTO music_type_ (type) VALUES (%s);",
                (genre["name"],)
            )
        for artiste in artistes_single:
            artist = get_artist(artiste)
            cur.execute(
                "INSERT INTO artist_ (name, id_type) VALUES (%s, (SELECT id_type FROM artist_type_ WHERE type='SINGLE')) RETURNING id_artist;",
                (artist["name"],)
            )
            artist_id = cur.fetchone()[0]
            for album in get_albums(artist):
                genre = genres.get(album["genre_id"], 'INCONNU')
                print(album)
                cur.execute(
                    "INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES (%s, %s, %s, %s, (SELECT id_type FROM music_type_ WHERE type=%s)) RETURNING id_album;",
                    (album["title"], album["release_date"], album["cover_url"], artist_id, genre)
                )
                album_id = cur.fetchone()[0]
                for track in get_tracks(album):
                    print(track)
                    cur.execute(
                        "INSERT INTO track_ (title, duration, id_album, id_artist, url) VALUES (%s, %s, %s, %s, %s);",
                        (track["title"], track["duration"], album_id, artist_id, track['link'])
                    )
        for artiste in artistes_band:
            artist = get_artist(artiste)
            print(artist)
            cur.execute(
                "INSERT INTO artist_ (name, id_type) VALUES (%s, (SELECT id_type FROM artist_type_ WHERE type='BAND')) RETURNING id_artist;",
                (artist["name"],)
            )
            artist_id = cur.fetchone()[0]
            for album in get_albums(artist):
                print(album)
                cur.execute(
                    "INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES (%s, %s, %s, %s, (SELECT id_type FROM music_type_ WHERE type=%s)) RETURNING id_album;",
                    (album["title"], album["release_date"], album["cover_url"], artist_id, genres[album["genre_id"]])
                )
                album_id = cur.fetchone()[0]
                for track in get_tracks(album):
                    print(track)
                    cur.execute(
                        "INSERT INTO track_ (title, duration, id_album, id_artist, url) VALUES (%s, %s, %s, %s, %s);",
                        (track["title"], track["duration"], album_id, artist_id, track['link'])
                    )
