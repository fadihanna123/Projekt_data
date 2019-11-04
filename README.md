# REST webbtjänst #
De här filerna visar hur kan man ha åtkomst till databasens data i JSON format. Ibland vill man dessa data i JSON format för olika webbutvecklingsskäl.<br />
Ibland vill man ha åtkomst för att lägga till dessa data i sin egen webbsida eller vill importera dem. Därför är Rest bra metod att ha.<br />
Dessa metoder: GET, POST, DELETE, PUT är HTTP-metoder som används för att visa, lägg till, uppdatera och radera data.<br />
Du kan prova dessa själv i POSTMAN programmet.<br />
**Mappstruktur**<br />
includes/ <br />
   includes/classes/<br />
          includes/classes/courses.class.php innehåller åtgärder till databasen som att visa, lägg till, uppdatera och radera resultat.<br />
    includes/config.php Innehåller importeringsfunktion till klassfilen.<br />
index.php innehåller hela koden beror på metoden som skickas.<br />

**Installation:**<br />
Du behöver skapa dessa kolumner i en databas:<br />
   `id` int(11) NOT NULL,auto_increment,<br />
  `code` text NOT NULL,<br />
  `name` text NOT NULL,<br />
  `progression` text NOT NULL,<br />
  `course_syllabus` text NOT NULL.<br />
  Du behöver byta anslutningsuppgifter som finns i rad 43 i filen index.php från localhost till din egen.<br />
Du behöver också redigera anslutningsuppgifter som finns i rad 8 i filen includes/classes/courses.class.php från localhost till din egen.<br />
**Exempel efter redigering:**<br />
$conn = mysqli_connect('a.server.com', 'mittnamn', 'psw', 'databas');<br />
$this->db = mysqli_connect('a.server.com', 'mittnamn', 'psw', 'databas') or die("Det finns ett okänt problem");	<br />

**Programmeringsspråk som används:**<br />
PHP<br />

**Exempel för att visa data:**<br />
http://localhost/Moment_5.1/index.php/courses/ <br />
Den visar alla data från databasen.<br />
**Exempel för att lägga till data:**<br />
http://localhost/Moment_5.1/index.php/courses/ <br />
observera att du måste lägga i body vissa data för att de ska läggas till. <br />
**Exempel för att uppdatera data:**<br />
http://localhost/Moment_5.1/index.php/courses/<br />
observera att du måste lägga i body de data som ska uppdateras.<br />
**Exempel för att radera data:**<br />
http://localhost/Moment_5.1/index.php/courses/1<br />
Denna metod raderar id 1.<br />
I courses/[id]<br />
kan du lägga vilken id som ska raderas. <br />


