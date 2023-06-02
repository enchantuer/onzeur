------------------------------------------------------------
--        Script Postgre
------------------------------------------------------------

DROP TABLE IF EXISTS user_ CASCADE;
DROP TABLE IF EXISTS playlist_ CASCADE ;
DROP TABLE IF EXISTS music_type_ CASCADE ;
DROP TABLE IF EXISTS artist_type_ CASCADE ;
DROP TABLE IF EXISTS artist_ CASCADE ;
DROP TABLE IF EXISTS album_ CASCADE ;
DROP TABLE IF EXISTS track_ CASCADE ;
DROP TABLE IF EXISTS playlist_track_ CASCADE ;
DROP TABLE IF EXISTS history_ CASCADE ;

------------------------------------------------------------
-- Table: music_type_
------------------------------------------------------------
CREATE TABLE public.music_type_(
                                   id_type   SERIAL NOT NULL ,
                                   type      VARCHAR (50) NOT NULL UNIQUE ,
                                   CONSTRAINT music_type__PK PRIMARY KEY (id_type)
);


------------------------------------------------------------
-- Table: artist_type_
------------------------------------------------------------
CREATE TABLE public.artist_type_(
                                    id_type   SERIAL NOT NULL ,
                                    type      VARCHAR (50) NOT NULL UNIQUE ,
                                    CONSTRAINT artist_type__PK PRIMARY KEY (id_type)
);


------------------------------------------------------------
-- Table: artist_
------------------------------------------------------------
CREATE TABLE public.artist_(
                               id_artist   SERIAL NOT NULL ,
                               name        VARCHAR (50) NOT NULL ,
                               id_type     INT  NOT NULL  ,
                               CONSTRAINT artist__PK PRIMARY KEY (id_artist)
);


------------------------------------------------------------
-- Table: album_
------------------------------------------------------------
CREATE TABLE public.album_(
                              id_album       SERIAL NOT NULL ,
                              title          VARCHAR (100) NOT NULL ,
                              release_date   DATE  NOT NULL ,
                              Image          VARCHAR (50) NOT NULL ,
                              id_artist      INT  NOT NULL ,
                              id_type        INT  NOT NULL  ,
                              CONSTRAINT album__PK PRIMARY KEY (id_album)
);


------------------------------------------------------------
-- Table: track_
------------------------------------------------------------
CREATE TABLE public.track_(
                              id_track    SERIAL NOT NULL ,
                              title       VARCHAR (100) NOT NULL ,
                              duration    INT  NOT NULL ,
                              url         VARCHAR (100) NOT NULL ,
                              id_album    INT  NOT NULL ,
                              id_artist   INT  NOT NULL  ,
                              CONSTRAINT track__PK PRIMARY KEY (id_track)
);


------------------------------------------------------------
-- Table: user_
------------------------------------------------------------
CREATE TABLE public.user_(
                             id_user       SERIAL NOT NULL ,
                             first_name    VARCHAR (50) NOT NULL ,
                             name          VARCHAR (50) NOT NULL ,
                             email         VARCHAR (50) NOT NULL UNIQUE ,
                             birth_date    DATE  NOT NULL ,
                             password      VARCHAR (150) NOT NULL ,
                             id_playlist_favorite   INT ,
                             CONSTRAINT user__PK PRIMARY KEY (id_user)
);


------------------------------------------------------------
-- Table: playlist_
------------------------------------------------------------
CREATE TABLE public.playlist_(
                                 id_playlist     SERIAL NOT NULL ,
                                 name            VARCHAR (50) NOT NULL ,
                                 creation_date   DATE  NOT NULL DEFAULT now(),
                                 id_user         INT  NOT NULL  ,
                                 CONSTRAINT playlist__PK PRIMARY KEY (id_playlist)
);


------------------------------------------------------------
-- Table: playlist_track_
------------------------------------------------------------
CREATE TABLE public.playlist_track_(
                                       id_track      INT  NOT NULL ,
                                       id_playlist   INT  NOT NULL ,
                                       add_date      DATE  NOT NULL DEFAULT now(),
                                       CONSTRAINT playlist_track__PK PRIMARY KEY (id_track,id_playlist)
);


------------------------------------------------------------
-- Table: history_
------------------------------------------------------------
CREATE TABLE public.history_(
                                id_track   INT  NOT NULL ,
                                id_user    INT  NOT NULL ,
                                add_date   DATE  NOT NULL DEFAULT now(),
                                CONSTRAINT history__PK PRIMARY KEY (id_track,id_user)
);




ALTER TABLE public.artist_
    ADD CONSTRAINT artist__artist_type_0_FK
        FOREIGN KEY (id_type)
            REFERENCES public.artist_type_(id_type);

ALTER TABLE public.album_
    ADD CONSTRAINT album__artist_0_FK
        FOREIGN KEY (id_artist)
            REFERENCES public.artist_(id_artist)
            ON DELETE CASCADE;

ALTER TABLE public.album_
    ADD CONSTRAINT album__music_type_1_FK
        FOREIGN KEY (id_type)
            REFERENCES public.music_type_(id_type)
            ON DELETE SET NULL;

ALTER TABLE public.track_
    ADD CONSTRAINT track__album_0_FK
        FOREIGN KEY (id_album)
            REFERENCES public.album_(id_album)
            ON DELETE CASCADE;

ALTER TABLE public.track_
    ADD CONSTRAINT track__artist_1_FK
        FOREIGN KEY (id_artist)
            REFERENCES public.artist_(id_artist)
            ON DELETE CASCADE;

ALTER TABLE public.user_
    ADD CONSTRAINT user__playlist_0_FK
        FOREIGN KEY (id_playlist_favorite)
            REFERENCES public.playlist_(id_playlist)
            ON DELETE SET NULL;

ALTER TABLE public.user_
    ADD CONSTRAINT user__playlist_0_AK
        UNIQUE (id_playlist_favorite);

ALTER TABLE public.playlist_
    ADD CONSTRAINT playlist__user_0_FK
        FOREIGN KEY (id_user)
            REFERENCES public.user_(id_user)
            ON DELETE CASCADE;

ALTER TABLE public.playlist_track_
    ADD CONSTRAINT playlist_track__track_0_FK
        FOREIGN KEY (id_track)
            REFERENCES public.track_(id_track)
            ON DELETE CASCADE;

ALTER TABLE public.playlist_track_
    ADD CONSTRAINT playlist_track__playlist_1_FK
        FOREIGN KEY (id_playlist)
            REFERENCES public.playlist_(id_playlist)
            ON DELETE CASCADE;


ALTER TABLE public.history_
    ADD CONSTRAINT history__track_0_FK
        FOREIGN KEY (id_track)
            REFERENCES public.track_(id_track)
            ON DELETE CASCADE;

ALTER TABLE public.history_
    ADD CONSTRAINT history__user_1_FK
        FOREIGN KEY (id_user)
            REFERENCES public.user_(id_user)
            ON DELETE CASCADE;

