<?php
// Tillåta servern att ha åtkomst
header("Access-Control-Allow-Origin: *");
// Inkludera config filen.
require "includes/config.php";
// Anropa datasource klassen
$getclass = (object) new datasource();
// Hämta HTTP-metoder, länk och svar från länken
$method = (array)$_SERVER['REQUEST_METHOD'];
$getrequest = (array)explode('/', trim($_SERVER['PATH_INFO'], '/'));
$input = (object)json_decode(file_get_contents('php://input'), true);
// Kontrollera om sidan har i adressen en av dessa ord: cv_pres, cv_work, cv_studie, cv_webpages annars visa felmeddelande och stoppa förfrågan
if (
    $getrequest[0] != "cv_pres" &&
    $getrequest[0] != "cv_work" &&
    $getrequest[0] != "cv_studie" &&
    $getrequest[0] != "cv_webpages"
) {
    http_response_code(404);
    exit();
}
// Visa sidan med inställningar som json format med utf-8
header("Content-Type: application/json; charset=UTF-8");
// Inkludera alla åtgärder beror på den skickade HTTP-metoden
switch ($method) {
    // Anropa showData funktionen och visa data beror på de skickade data
    case "GET":
        $getclass->showData(
            isset($getrequest[0]) ? $getrequest[0] : null,
            isset($getrequest[1]) ? $getrequest[1] : null
        );
        break;
    // Anropa addData funktionen och lägga till data enligt de skickade data
    case "POST":
        $getclass->AddData(
            isset($getrequest[0]) ? $getrequest[0] : null,
            isset($input['fullname']) ? $input['fullname'] : null,
            isset($input['epost']) ? $input['epost'] : null,
            isset($input['mobnr']) ? $input['mobnr'] : null,
            isset($input['age']) ? $input['age'] : null,
            isset($input['lang']) ? $input['lang'] : null,
            isset($input['title']) ? $input['title'] : null,
            isset($input['studiesschool']) ? $input['studiesschool'] : null,
            isset($input['course_name']) ? $input['course_name'] : null,
            isset($input['Starttime_studies'])
                ? $input['Starttime_studies']
                : null,
            isset($input['Stoptime_studies'])
                ? $input['Stoptime_studies']
                : null,
            isset($input['workplace']) ? $input['workplace'] : null,
            isset($input['work_title']) ? $input['work_title'] : null,
            isset($input['Starttime_work']) ? $input['Starttime_work'] : null,
            isset($input['Stoptime_work']) ? $input['Stoptime_work'] : null,
            isset($input['webpage_title']) ? $input['webpage_title'] : null,
            isset($input['webpage_url']) ? $input['webpage_url'] : null,
            isset($input['webpage_des']) ? $input['webpage_des'] : null
        );
        break;
    // Anropa deleteData funktionen och radera data beror på de skickade data
    case "DELETE":
        $getclass->deleteData(
            isset($getrequest[0]) ? $getrequest[0] : null,
            isset($getrequest[1]) ? $getrequest[1] : null
        );
        break;
    // Anropa updateData funktionen och uppdatera data beror på de skickade data
    case "PUT":
        $getclass->updateData(
            isset($getrequest[1]) ? $getrequest[1] : null,
            isset($getrequest[0]) ? $getrequest[0] : null,
            isset($input['fullname']) ? $input['fullname'] : null,
            isset($input['epost']) ? $input['epost'] : null,
            isset($input['mobnr']) ? $input['mobnr'] : null,
            isset($input['age']) ? $input['age'] : null,
            isset($input['lang']) ? $input['lang'] : null,
            isset($input['title']) ? $input['title'] : null,
            isset($input['studiesschool']) ? $input['studiesschool'] : null,
            isset($input['course_name']) ? $input['course_name'] : null,
            isset($input['Starttime_studies'])
                ? $input['Starttime_studies']
                : null,
            isset($input['Stoptime_studies'])
                ? $input['Stoptime_studies']
                : null,
            isset($input['workplace']) ? $input['workplace'] : null,
            isset($input['work_title']) ? $input['work_title'] : null,
            isset($input['Starttime_work']) ? $input['Starttime_work'] : null,
            isset($input['Stoptime_work']) ? $input['Stoptime_work'] : null,
            isset($input['webpage_title']) ? $input['webpage_title'] : null,
            isset($input['webpage_url']) ? $input['webpage_url'] : null,
            isset($input['webpage_des']) ? $input['webpage_des'] : null
        );
        break;
}
// Skapa en array och anslut till databasen.
$arr = (array) [];
$con = (object)mysqli_connect('localhost', 'root', '', 'test');
mysqli_set_charset($con, "utf8");

if ($method != "GET") {
    $sql = (string) "SELECT * FROM $getrequest[0];";
}
if ($method = "GET" && empty($getrequest[1])) {
    $sql = (string) "SELECT * FROM $getrequest[0];";
}
if ($method = "DELETE" && !empty($getrequest[1])) {
    $sql = (string) "SELECT * FROM $getrequest[0]";
}
if ($method = "GET" && !empty($getrequest[1])) {
    $sql = (string) "SELECT * FROM $getrequest[0] WHERE id=" . "$getrequest[1]" . ";";
}
// Visa alla data beror på den skicka sql uppmaning.
$result = (object)mysqli_query($con, $sql);

// Lägger till alla data i en array.
while ($row = (array)mysqli_fetch_assoc($result)) {
    if ($getrequest[0] == "cv_pres") {
        $row_arr['id'] = (int)$row['id'];
        $row_arr['fullname'] = (string)$row['fullname'];
        $row_arr['epost'] = (string)$row['epost'];
        $row_arr['mobnr'] = (string)$row['mobnr'];
        $row_arr['age'] = (int)$row['age'];
        $row_arr['lang'] = (string)$row['lang'];
        $row_arr['title'] = (string)$row['title'];
    }
    if ($getrequest[0] == "cv_studie") {
        $row_arr['id'] = (int)$row['id'];
        $row_arr['studiesschool'] = (string)$row['studiesschool'];
        $row_arr['course_name'] = (string)$row['course_name'];
        $row_arr['Starttime_studies'] = (string)$row['Starttime_studies'];
        $row_arr['Stoptime_studies'] = (string)$row['Stoptime_studies'];
    }
    if ($getrequest[0] == "cv_work") {
        $row_arr['id'] = (int)$row['id'];
        $row_arr['work_title'] = (string)$row['work_title'];
        $row_arr['workplace'] = (string)$row['workplace'];
        $row_arr['Starttime_work'] = (string)$row['Starttime_work'];
        $row_arr['Stoptime_work'] = (string)$row['Stoptime_work'];
    }
    if ($getrequest[0] == "cv_webpages") {
        $row_arr['id'] = (int)$row['id'];
        $row_arr['webpage_title'] = (string)$row['webpage_title'];
        $row_arr['webpage_url'] = (string)$row['webpage_url'];
        $row_arr['webpage_des'] = (string)$row['webpage_des'];
    }
    array_push($arr, $row_arr);
}
// Visa dessa data i json format.
echo json_encode($arr);
