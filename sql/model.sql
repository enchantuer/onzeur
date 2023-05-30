------------------------------------------------------------
--        Script Postgre
------------------------------------------------------------



------------------------------------------------------------
-- Table: user_
------------------------------------------------------------
CREATE TABLE public.user_(
                             id_user      SERIAL NOT NULL ,
                             first_name   VARCHAR (50) NOT NULL ,
                             name         VARCHAR (50) NOT NULL ,
                             email        VARCHAR (50) NOT NULL ,
                             age          INT  NOT NULL ,
                             password     VARCHAR (50) NOT NULL  ,
                             CONSTRAINT user__PK PRIMARY KEY (id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: playlist_
------------------------------------------------------------
CREATE TABLE public.playlist_(
                                 id_playlist     SERIAL NOT NULL ,
                                 name            VARCHAR (50) NOT NULL ,
                                 creation_date   DATE  NOT NULL ,
                                 id_user         INT  NOT NULL  ,
                                 CONSTRAINT playlist__PK PRIMARY KEY (id_playlist)

    ,CONSTRAINT playlist__user__FK FOREIGN KEY (id_user) REFERENCES public.user_(id_user)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: music_type_
------------------------------------------------------------
CREATE TABLE public.music_type_(
                                   id_type   SERIAL NOT NULL ,
                                   type      VARCHAR (50) NOT NULL  ,
                                   CONSTRAINT music_type__PK PRIMARY KEY (id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: artist_type_
------------------------------------------------------------
CREATE TABLE public.artist_type_(
                                    id_type   SERIAL NOT NULL ,
                                    type      VARCHAR (50) NOT NULL  ,
                                    CONSTRAINT artist_type__PK PRIMARY KEY (id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: artist_
------------------------------------------------------------
CREATE TABLE public.artist_(
                               id_artist   SERIAL NOT NULL ,
                               name        VARCHAR (50) NOT NULL ,
                               id_type     INT  NOT NULL  ,
                               CONSTRAINT artist__PK PRIMARY KEY (id_artist)

    ,CONSTRAINT artist__artist_type__FK FOREIGN KEY (id_type) REFERENCES public.artist_type_(id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: album_
------------------------------------------------------------
CREATE TABLE public.album_(
                              id_album       SERIAL NOT NULL ,
                              title          VARCHAR (50) NOT NULL ,
                              release_date   DATE  NOT NULL ,
                              Image          VARCHAR (50) NOT NULL ,
                              id_artist      INT  NOT NULL ,
                              id_type        INT  NOT NULL  ,
                              CONSTRAINT album__PK PRIMARY KEY (id_album)

    ,CONSTRAINT album__artist__FK FOREIGN KEY (id_artist) REFERENCES public.artist_(id_artist)
    ,CONSTRAINT album__music_type_0_FK FOREIGN KEY (id_type) REFERENCES public.music_type_(id_type)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: track_
------------------------------------------------------------
CREATE TABLE public.track_(
                              id_track    SERIAL NOT NULL ,
                              title       VARCHAR (50) NOT NULL ,
                              duration    INT  NOT NULL ,
                              id_album    INT  NOT NULL ,
                              id_artist   INT  NOT NULL  ,
                              CONSTRAINT track__PK PRIMARY KEY (id_track)

    ,CONSTRAINT track__album__FK FOREIGN KEY (id_album) REFERENCES public.album_(id_album)
    ,CONSTRAINT track__artist_0_FK FOREIGN KEY (id_artist) REFERENCES public.artist_(id_artist)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Avoir
------------------------------------------------------------
CREATE TABLE public.Avoir(
                             id_track      INT  NOT NULL ,
                             id_playlist   INT  NOT NULL ,
                             add_date      DATE  NOT NULL  ,
                             CONSTRAINT Avoir_PK PRIMARY KEY (id_track,id_playlist)

    ,CONSTRAINT Avoir_track__FK FOREIGN KEY (id_track) REFERENCES public.track_(id_track)
    ,CONSTRAINT Avoir_playlist_0_FK FOREIGN KEY (id_playlist) REFERENCES public.playlist_(id_playlist)
)WITHOUT OIDS;


------------------------------------------------------------
-- Table: Contient
------------------------------------------------------------
CREATE TABLE public.Contient(
                                id_track   INT  NOT NULL ,
                                id_user    INT  NOT NULL ,
                                add_date   DATE  NOT NULL  ,
                                CONSTRAINT Contient_PK PRIMARY KEY (id_track,id_user)

    ,CONSTRAINT Contient_track__FK FOREIGN KEY (id_track) REFERENCES public.track_(id_track)
    ,CONSTRAINT Contient_user_0_FK FOREIGN KEY (id_user) REFERENCES public.user_(id_user)
)WITHOUT OIDS;



