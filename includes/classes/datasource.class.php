<?php
class datasource
{
	protected $db;
	// Ansluta till databasen.
	public function __construct()
	{
		$this->db = mysqli_connect("localhost", "root", "", "test");
	}

	// AddData lägger till data som kommer från användare till databasen.
	public function AddData($tablename, $fullname, $epost, $mobnr, $age, $lang, $title, $studiesschool, $course_name, $Starttime_studies, $Stoptime_studies, $workplace, $work_title, $Starttime_work, $Stoptime_work, $webpage_title, $webpage_url, $webpage_des)
	{
		if($tablename == "cv_pres")
		{
			$sql = "INSERT INTO $tablename(fullname, epost, mobnr, age, lang, title) VALUES('$fullname', '$epost', '$mobnr', '$age', '$lang', '$title');";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_work")
		{
			$sql = "INSERT INTO $tablename(workplace, work_title, Starttime_work, Stoptime_work) VALUES('$workplace', '$work_title', '$Starttime_work', '$Stoptime_work');";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_studie")
		{
			$sql = "INSERT INTO $tablename(studiesschool, course_name, Starttime_studies, Stoptime_studies) VALUES('$studiesschool', '$course_name', '$Starttime_studies', '$Stoptime_studies');";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_webpages")
		{
			$sql = "INSERT INTO $tablename(webpage_title, webpage_url, webpage_des) VALUES('$webpage_title', '$webpage_url', '$webpage_des');";
			return $result = $this->db->query($sql);
		}
	
	}

	// deleteData raderar data från databasen som kommer från användare.
	public function deleteData($tablename, $id)
	{
		
			$sql = "DELETE FROM $tablename WHERE id=$id;";
			return $result = $this->db->query($sql);
	}

	// showData visar data som beror på de skickade data
	public function showData($tablename, $id)
	{
		$sql = "SELECT * FROM $tablename;";
		if(isset($id)) 
		{
			 $sql = "SELECT * FROM $tablename WHERE id=$id;"; 
		}

			$result = $this->db->query($sql);
			return mysqli_fetch_all($result, MYSQLI_ASSOC);
		
	}

	// updateData uppdaterar data i databasen som kommer från användaren.
	public function updateData($id, $tablename, $fullname, $epost, $mobnr, $age, $lang, $title, $studiesschool, $course_name, $Starttime_studies, $Stoptime_studies, $workplace, $work_title, $Starttime_work, $Stoptime_work, $webpage_title, $webpage_url, $webpage_des)
	{
		if($tablename == "cv_pres")
		{
			$sql = "UPDATE $tablename SET fullname='$fullname', epost='$epost', mobnr='$mobnr', age='$age', lang='$lang', title='$title' WHERE id=$id;";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_work")
		{
			$sql = "UPDATE $tablename SET workplace='$workplace', work_title='$work_title', Starttime_work='$Starttime_work', Stoptime_work='$Stoptime_work' WHERE id=$id;";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_studie")
		{
			$sql = "UPDATE $tablename SET studiesschool='$studiesschool', course_name='$course_name', Starttime_studies='$Starttime_studies', Stoptime_studies='$Stoptime_studies' WHERE id=$id;";
			return $result = $this->db->query($sql);
		}

		if($tablename == "cv_webpages")
		{
			$sql = "UPDATE $tablename SET webpage_title='$webpage_title', webpage_url='$webpage_url', webpage_des='$webpage_des'WHERE id=$id;";
			return $result = $this->db->query($sql);
		}
	}
	
}

?>