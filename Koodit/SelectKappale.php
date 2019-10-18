<?php
// muodostetaan yhteys tietokantaan
try {
$yhteys = new PDO("mysql:host=localhost;dbname=t8kuto00", "t8kuto00",
"");
}
catch (PDOException $e) {
die("VIRHE: " . $e->getMessage());
}
// virheenkäsittely: virheet aiheuttavat poikkeuksen
$yhteys->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
// merkistö: käytetään latin1-merkistöä; toinen yleinen vaihtoehto on utf8.
$yhteys->exec("SET NAMES latin1");
// valmistetaan kysely
$kysely = $yhteys->prepare("SELECT Nimi, Artisti, Albumi, Genre, Vuosi FROM Kappale");
// suoritetaan kysely
$kysely->execute();
// näytetään kyselyn tulokset taulukossa
echo "<table>";
// käsitellään tulostaulun rivit yksi kerrallaan
while ($rivi = $kysely->fetch()) {
echo "<tr>";
echo "<td>" . htmlspecialchars($rivi["Nimi"]) . "</td>";
echo "<td>" . htmlspecialchars($rivi["Artisti"]) . "</td>";
echo "<td>" . htmlspecialchars($rivi["Albumi"]) . "</td>";
echo "<td>" . htmlspecialchars($rivi["Genre"]) . "</td>";
echo "<td>" . htmlspecialchars($rivi["Vuosi"]) . "</td>";
echo "</tr>";
} echo "</table>";