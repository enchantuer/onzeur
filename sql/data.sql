SELECT t.id_track id, t.title, t.duration, ar artist, ab album FROM track_ t NATURAL JOIN public.artist_ ar, public.album_ ab;

INSERT INTO artist_type_ (type) VALUES ('BAND'), ('SINGLE');
INSERT INTO music_type_ (type) VALUES ('POP'), ('ROCK');
INSERT INTO artist_ (name, id_type) VALUES ('Artist', (SELECT id_type FROM artist_type_ WHERE type='BAND'));
INSERT INTO album_ (title, release_date, image, id_artist, id_type) VALUES ('Album', now(), 'url', (SELECT id_artist FROM artist_ WHERE name='Artist'), (SELECT id_type FROM music_type_ WHERE type='POP'));
INSERT INTO track_ (title, duration, id_album, id_artist, url) VALUES ('Track', 0, (SELECT id_album FROM album_ WHERE title='Album'), (SELECT id_artist FROM artist_ WHERE name='Artist'), 'url.com')
