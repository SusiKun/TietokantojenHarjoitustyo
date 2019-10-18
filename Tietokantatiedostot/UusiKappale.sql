CREATE PROCEDURE `UusiKappale` (
IN KapNi VARCHAR(45),
IN ArtNi VARCHAR(45),
IN AlbNi VARCHAR(45),
IN Genre VARCHAR(45),
IN Vuosi INT(11)

)
Aliohjelma:BEGIN
DECLARE ArtID INT DEFAULT 0;
DECLARE AlbID INT DEFAULT 0;
SELECT idArtisti INTO ArtID FROM Artisti WHERE Nimi=ArtNi;

IF ArtID=0 THEN
   SELECT 'Artistia ei ole';
   LEAVE Aliohjelma;
END IF;


SELECT idAlbumi INTO AlbID FROM Albumi WHERE Nimi=AlbNi;

IF AlbID=0 THEN
   SELECT 'Albumia ei ole';
   LEAVE Aliohjelma;
END IF;

INSERT INTO Kappale VALUES (NULL,KapNi,ArtNi,AlbNi,Genre,Vuosi,AlbID,ArtID);

END