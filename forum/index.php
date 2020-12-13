<?php
//index.php

//include 'connect.php'; /*need to figure out what file this is*/
include 'header.php';

$sql = "SELECT
			cat_id,
			cat_name,
			cat_description,
		FROM
			categories";

$result = mysql_query($sql);

if(!$result)
{
	echo 'The categories could not be displayed, please try again later.';
}
else
{
	if(mysql_num_rows($result)==0)
	{
		echo 'No categories defined yet.';
	}
	else
	{
		//table
		echo 	'<table border="1">
				<tr>
					<th>Category</th>
					<th>Last Topic</th>
				</tr>';
		while($row = mysql_fetch_assoc($result))
		{
			echo '<tr>';
				echo '<td class="leftpart">';
					echo '<h3><a href="category.php?id=">Category name</a></h3> Category description goes here';
				echo '</td>';
				echo '<td class="rightpart">';
					echo '<a href="topic.php?id=">Topic subject</a> at 10-10';
				echo '</td>';
			echo '</tr>';
		}
	}
}



include 'footer.php';
?>
