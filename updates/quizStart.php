<?php
session_start();
$lines = file('rabbitmq/testQuestions.txt', FILE_IGNORE_NEW_LINES);



?>
<!DOCTYPE html>
<head>

	<meta charset=UTF-8" />
	
	<title>PHP QUIZ</title>
	
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

	<div id="page-wrap">

		<h1>Quiz: <?php echo $lines[25];?></h1>
		
		<form action="rabbitmq/result.php" method="post" id="quiz">
		
            <ol>
            
                <li>
                
                    <h3><?php echo $lines[0];?></h3>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-A" value="<?php echo htmlspecialchars($lines[1]);?>" >
                        <label for="question-1-answers-A">A) <?php echo $lines[1];?> </label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-B" value="<?php echo htmlspecialchars($lines[2]);?>" >
                        <label for="question-1-answers-B">B) <?php echo $lines[2];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-C" value="<?php echo htmlspecialchars($lines[3]);?>" >
                        <label for="question-1-answers-C">C) <?php echo $lines[3];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-1-answers" id="question-1-answers-D" value="<?php echo htmlspecialchars($lines[4]);?>" >
                        <label for="question-1-answers-D">D) <?php echo $lines[4];?></label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3><?php echo $lines[5];?></h3>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-A" value="<?php echo htmlspecialchars($lines[6]);?>" >
                        <label for="question-2-answers-A">A) <?php echo $lines[6];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-B" value="<?php echo htmlspecialchars($lines[7]);?>" >
                        <label for="question-2-answers-B">B) <?php echo $lines[7];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-C" value="<?php echo htmlspecialchars($lines[8]);?>" >
                        <label for="question-2-answers-C">C) <?php echo $lines[8];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-2-answers" id="question-2-answers-D" value="<?php echo htmlspecialchars($lines[9]);?>" >
                        <label for="question-2-answers-D">D) <?php echo $lines[9];?></label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3><?php echo $lines[10];?></h3>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-A" value="<?php echo htmlspecialchars($lines[11]);?>" >
                        <label for="question-3-answers-A">A) <?php echo $lines[11];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-B" value="<?php echo htmlspecialchars($lines[12]);?>" >
                        <label for="question-3-answers-B">B) <?php echo $lines[12];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-C" value="<?php echo htmlspecialchars($lines[13]);?>" >
                        <label for="question-3-answers-C">C) <?php echo $lines[13];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-3-answers" id="question-3-answers-D" value="<?php echo htmlspecialchars($lines[14]);?>" >
                        <label for="question-3-answers-D">D) <?php echo $lines[14];?></label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3><?php echo $lines[15];?></h3>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-A" value="<?php echo htmlspecialchars($lines[16]);?>" >
                        <label for="question-4-answers-A">A) <?php echo $lines[16];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-B" value="<?php echo htmlspecialchars($lines[17]);?>" >
                        <label for="question-4-answers-B">B) <?php echo $lines[17];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-C" value="<?php echo htmlspecialchars($lines[18]);?>" >
                        <label for="question-4-answers-C">C) <?php echo $lines[18];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-4-answers" id="question-4-answers-D" value="<?php echo htmlspecialchars($lines[19]);?>" >
                       <label for="question-4-answers-D">D) <?php echo $lines[19];?></label>
                    </div>
                
                </li>
                
                <li>
                
                    <h3><?php echo $lines[20];?></h3>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-A" value="<?php echo htmlspecialchars($lines[21]);?>" >
                        <label for="question-5-answers-A">A) <?php echo $lines[21];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-B" value="<?php echo htmlspecialchars($lines[22]);?>" >
                        <label for="question-5-answers-B">B) <?php echo $lines[22];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-C" value="<?php echo htmlspecialchars($lines[23]);?>" >
                        <label for="question-5-answers-C">C) <?php echo $lines[23];?></label>
                    </div>
                    
                    <div>
                        <input type="radio" name="question-5-answers" id="question-5-answers-D" value="<?php echo htmlspecialchars($lines[24]);?>" >
                        <label for="question-5-answers-D">D) <?php echo $lines[24];?></label>
                    </div>
                
                </li>
            
            </ol>
            
            <input type="submit" value="Submit" class="submitbtn" />
		
		</form>
	
	</div>


</body>

</html>


