<?php
session_start();

if($_SERVER["REQUEST_METHOD"] == "POST"){
	//username and pass sent from form
	$grade = $_POST['grade'];
	$subj = $_POST['subj'];
	
	$_SESSION['learn_grade'] = $grade;
	$_SESSION['learn_subj'] = $subj;	
	header("location: loadQuiz.php");
}

?>
