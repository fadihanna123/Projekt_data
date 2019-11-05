# REST webbtjänst #
Via denna Rest webbtjänst kan man ha åtkomst till json data i själva webbsidan. Här byggde jag cv databas och gav tillgång till json data via en länk som man kan surfa, lägga till, ändra och data eller använda dessa funktioner i Postman. 
HTTP-metoder som kan användas: GET, POST, DELETE, PUT.

**Mappstruktur**<br />
includes/ <br />
   includes/classes/<br />
          includes/classes/datasource.class.php innehåller åtgärder till databasen som att visa, lägg till, uppdatera och radera resultat.<br />
    includes/config.php Innehåller importeringsfunktion till klassfilen.<br />
index.php innehåller hela koden beror på metoden som skickas.<br />

**Installation:**<br />
Du behöver skapa dessa tabeller: cv_pres, cv_studie, cv_work, cv_webpages, contact_cv och users_cv.<br />
cv_pres skapas för att visa personliga uppgifter.<br />
cv_studie skapas för att visa studieuppgifter.<br />
cv_work skapas för att visa erfarenhetsuppgifter.<br />
cv_webpages skapas för att visa webbssidorsuppgifter.<br />
contact_cv skapas för att lägga till kontaktsuppgifter i databasen.<br />
users_cv skapas för att kontrollera inloggade användare i CV.<br />
Du behöver skapa dessa kolumner i dessa tabeller :<br />
**cv_pres**<br />
   `id` int(11) NOT NULL, <br />
  `fullname` text NOT NULL, <br />
  `epost` text NOT NULL, <br />
  `mobnr` text NOT NULL, <br />
  `age` text NOT NULL, <br />
  `lang` text NOT NULL, <br />
  `title` text NOT NULL <br />
  
**cv_studie**<br />
   `id` int(11) NOT NULL,<br />
  `studiesschool` text NOT NULL,<br />
  `course_name` text NOT NULL,<br />
  `Starttime_studies` text NOT NULL,<br />
  `Stoptime_studies` text NOT NULL,<br />
  
**cv_work**<br />
   `id` int(11) NOT NULL,<br />
  `workplace` text NOT NULL,<br />
  `work_title` text NOT NULL,<br />
  `Starttime_work` text NOT NULL,<br />
  `Stoptime_work` text NOT NULL<br />
  
**cv_webpages**<br />
   `id` int(11) NOT NULL,<br />
  `webpage_title` text NOT NULL,<br />
  `webpage_url` text NOT NULL,<br />
  `webpage_des` text NOT NULL<br />
  
**contact_cv**<br />
   `id` int(11) NOT NULL,<br />
  `fullname` text NOT NULL,<br />
  `epost` text NOT NULL,<br />
  `msg` text NOT NULL<br />
  
**users_cv**<br />
   `id` int(11) NOT NULL,<br />
  `epost` text NOT NULL,<br />
  `psw` text NOT NULL<br />
  

  Du behöver byta anslutningsuppgifter som finns i rad 42 i filen index.php från localhost till din egen.<br />
Du behöver också redigera anslutningsuppgifter som finns i rad 8 i filen includes/classes/courses.class.php från localhost till din egen.<br />
**Exempel efter redigering:**<br />
$conn = mysqli_connect('a.server.com', 'mittnamn', 'psw', 'databas');<br />
$this->db = mysqli_connect('a.server.com', 'mittnamn', 'psw', 'databas') or die("Det finns ett okänt problem");	<br />

**Programmeringsspråk som används:**<br />
PHP<br />

**Exempel för att visa data:**<br />
http://localhost/Projekt_data/index.php/[tabellnamn]/[id] <br />
Den visar data beror på tabellnamn och id som skickas från adress från databasen. Om id saknas visas då alla data<br />
**Exempel för att lägga till data:**<br />
http://localhost/Projekt_data/index.php/[tabellnamn]/ <br />
Observera att du måste lägga i body vissa data för att de ska läggas till. <br />
**Exempel för att uppdatera data:**<br />
http://localhost/Projekt_data/index.php/[tabellnamn]/[id] <br />
Du behöver skicka en id och bodyuppgifter för att resultatet ska lyckas.<br />
**Exempel för att radera data:**<br />
http://localhost/Projekt_data/index.php/[tabellnamn]/[id] <br />
Här skriver du tabellnamnet som berörs och id som ska raderas från databasen. <br />


