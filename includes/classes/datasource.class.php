<?php

class datasource
{
    protected $_db;
    // Ansluta till databasen.
    public function __construct()
    {
        $this->db = (object)mysqli_connect("localhost", "root", "", "test");
    }

    // AddData lägger till data som kommer från användare till databasen.
    public function AddData(
        string $tablename,
        string $fullname,
        string $epost,
        string $mobnr,
        int $age,
        string $lang,
        string $title,
        string $studiesschool,
        string $course_name,
        string $Starttime_studies,
        string $Stoptime_studies,
        string $workplace,
        string $work_title,
        string $Starttime_work,
        string $Stoptime_work,
        string $webpage_title,
        string $webpage_url,
        string $webpage_des
    ): object {
        if ($tablename == "cv_pres") {
            $sql = (string) "INSERT INTO $tablename(fullname, epost, mobnr, age, lang, title) VALUES('$fullname', '$epost', '$mobnr', '$age', '$lang', '$title');";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_work") {
            $sql = (string) "INSERT INTO $tablename(workplace, work_title, Starttime_work, Stoptime_work) VALUES('$workplace', '$work_title', '$Starttime_work', '$Stoptime_work');";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_studie") {
            $sql = (string) "INSERT INTO $tablename(studiesschool, course_name, Starttime_studies, Stoptime_studies) VALUES('$studiesschool', '$course_name', '$Starttime_studies', '$Stoptime_studies');";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_webpages") {
            $sql = (string) "INSERT INTO $tablename(webpage_title, webpage_url, webpage_des) VALUES('$webpage_title', '$webpage_url', '$webpage_des');";
            return $this->db->query($sql);
        }
    }

    // deleteData raderar data från databasen som kommer från användare.
    public function deleteData(
        string $tablename,
        int $id
    ): object {
        $sql = (string) "DELETE FROM $tablename WHERE id=$id;";
        return $this->db->query($sql);
    }

    // showData visar data som beror på de skickade data
    public function showData(
        string $tablename,
        int $id
    ): array{
        $sql = (string) "SELECT * FROM $tablename;";
        if (isset($id)) {
            $sql = (string) "SELECT * FROM $tablename WHERE id=$id;";
        }

        $result = (object)$this->db->query($sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    // updateData uppdaterar data i databasen som kommer från användaren.
    public function updateData(
        int $id,
        string $tablename,
        string $fullname,
        string $epost,
        string $mobnr,
        int $age,
        string $lang,
        string $title,
        string $studiesschool,
        string $course_name,
        string $Starttime_studies,
        string $Stoptime_studies,
        string $workplace,
        string $work_title,
        string $Starttime_work,
        string $Stoptime_work,
        string $webpage_title,
        string $webpage_url,
        string $webpage_des
    ): object {
        if ($tablename == "cv_pres") {
            $sql = (string) "UPDATE $tablename SET fullname='$fullname', epost='$epost', mobnr='$mobnr', age='$age', lang='$lang', title='$title' WHERE id=$id;";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_work") {
            $sql = (string) "UPDATE $tablename SET workplace='$workplace', work_title='$work_title', Starttime_work='$Starttime_work', Stoptime_work='$Stoptime_work' WHERE id=$id;";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_studie") {
            $sql = (string) "UPDATE $tablename SET studiesschool='$studiesschool', course_name='$course_name', Starttime_studies='$Starttime_studies', Stoptime_studies='$Stoptime_studies' WHERE id=$id;";
            return $this->db->query($sql);
        }

        if ($tablename == "cv_webpages") {
            $sql = (string) "UPDATE $tablename SET webpage_title='$webpage_title', webpage_url='$webpage_url', webpage_des='$webpage_des'WHERE id=$id;";
            return $this->db->query($sql);
        }
    }
}
