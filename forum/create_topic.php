<?php
//create_topic.php

//include 'connect.php'; /*need to figure out which file this is*/
include 'header.php';

echo '<h2>Create a Topic</h2>';

/*if($_SESSION['signed_in'] == false)
{
	//the user is not signed in
	echo 'Please <a href="../php/login.php">login</a> before creating a category.';
}
else
{*/
	if($_SERVER['REQUEST_METHOD'] != 'POST')
	{
		//the form hasn't been posted yet
		$sql = "SELECT
					cat_id,
					cat_name,
					cat_description
				FROM
					categories";
		
		$result = mysql_query($sql);
		
		if(!$result)
		{
			echo 'Error while seelcting from database. Please try again.';
		}
		else
		{
			if(mysql_num_rows($result)==0)
			{
				echo 'You need to <a href="../forum/create_cat.php">create a category</a> before posting a topic';
			}
			else
			{
				echo '<form method="post" action="">
					Subject:<input type="text" name="topic_subject" />
					Category:';
				echo '<select name="topic_cat">';
					while($row = mysql_fetch_assoc($result))
					{
						echo '<option value="' . $row['cat_id'] . '">' . $row['cat_name'] . '</option.';
					}
				echo '</select>';
				
				echo 'Message: <textarea name="post_content"/></textarea>
					<input type="submit" value="Create topic"/>
				</form>';
			}
		}
	}
	else
	{
		$query = "BEGIN WORK;";
		$result = mysql_query($query);
		
		if(!$result)
		{
			echo 'An error occured while creating your topic. Please try again.';
		}
		else
		{
			$sql = "INSERT INTO
						topics(topic_subject,
								topic_date,
								topic_cat,
								topic_by)
					VALUES('" . mysql_real_escape_string($_POST['topic_subject']) . "',
							NOW(),
							'" . mysql_real_escape_string($_POST['topic_cat']) . "',
							'" . $_SESSION['user_id'] . "' 
							)"; //need to make sure this is the right value name for user id
							
			$result = mysql_query($sql);
			if(!$result)
			{
				echo 'An error occured while inserting your data. Please try again.';
				$sql = "ROLLBACK;";
				$result = mysql_query($sql);
			}
			else
			{
				$topicid = mysql_insert_id();
				
				$sql = "INSERT INTO 
							posts(	post_content,
									post_date,
									post_topic,
									post_by)
						VALUES
							('" . mysql_real_escape_string($_POST['post_content']) . "',
							NOW(),
							" . $topicid . ",
							" . $_SESSION['user_id'] . "
							)";
				$result = mysql_query($sql);
				
				if(!$result)
				{
					echo 'An error occured while inserting your post. Please try again later.';
					$sql = "ROLLBACK;";
					$result = mysql_query($sql);
				}
				else
				{
					$sql = "COMMIT;";
					$result = mysql_query($sql);
					
					echo 'You have successfully created <a href="topic.php?id='. $topicid . '">your new topic</a>!';
				}
			}
		}
	}
//}

include 'footer.php';
?>
