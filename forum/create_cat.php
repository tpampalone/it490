<?php
//create_cat.php

//include 'connect.php'; /*need to figure out which file this is*/
include 'header.php';

echo '<h2>Create a Category</h2>';

if($_SERVER['REQUEST_METHOD'] != 'POST')
{
	//the form hasn't been posted yet
	echo '<form method="post" action="">
		Category name:<input type="text" name="cat_name" />
		Category description: <textarea name="cat_description" /></textarea>
		<input type="submit" value="Add category"/>
	</form>';
}
else
{
	//the form has been posted, so save
	$sql = "INSERT INTO categories(cat_name, cat_description)
		VALUES('" . mysql_real_escape_string($_POST['cat_name']) . "',
			'" . mysql_real_escape_string($_POST['cat_description']) . "')";
	$result = mysql_query($sql);
	if(!$result)
	{
		echo 'Error' . mysql_error();
	}
	else
	{
		echo 'New category successfully added.';
	}
}
?>
