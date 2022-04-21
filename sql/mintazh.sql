DROP DATABASE IF EXISTS minta_zh ;

CREATE DATABASE minta_zh
	DEFAULT CHARACTER SET utf8
	DEFAULT COLLATE utf8_general_ci;

use minta_zh;

CREATE TABLE faj(
    id int not null auto_increment primary key,
    faj_nev varchar(50) not null
);

INSERT INTO faj (id, faj_nev) VALUES (1, 'kutya');
INSERT INTO faj (id, faj_nev) VALUES (2, 'macska');

CREATE TABLE etel(
    id int not null auto_increment primary key,
    etel_nev varchar(50) not null
);

INSERT INTO etel (id, etel_nev) VALUES (1, 'velos csont');
INSERT INTO etel (id, etel_nev) VALUES (2, 'husleves');
INSERT INTO etel (id, etel_nev) VALUES (3, 'almas pite');

CREATE TABLE allat(
    id int not null auto_increment primary key,
    allat_nev text not null,
    faj_id int not null references faj(id)
);

INSERT INTO allat (id, allat_nev, faj_id) VALUES (1, 'bloki', 1);
INSERT INTO allat (id, allat_nev, faj_id) VALUES (2, 'mirci', 2);
INSERT INTO allat (id, allat_nev, faj_id) VALUES (3, 'zokni', 1);

CREATE TABLE kedvenc_etel(
    allat_id int not null references allat(id),
    etel_id int not null references etel(id),
    primary key(allat_id, etel_id)
);

INSERT INTO kedvenc_etel (allat_id, etel_id) VALUES (1, 1);
INSERT INTO kedvenc_etel (allat_id, etel_id) VALUES (1, 2);
INSERT INTO kedvenc_etel (allat_id, etel_id) VALUES (2, 2);
INSERT INTO kedvenc_etel (allat_id, etel_id) VALUES (3, 1);
INSERT INTO kedvenc_etel (allat_id, etel_id) VALUES (3, 3);
