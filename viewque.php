<?php
ob_start();
include('dbcon.php');
$CODE = $_GET['Code'] ;

//////////////////////////////

$stmt2 = $con->prepare("
SELECT
    *
FROM 
    test 
WHERE
  tcode = ?
  
                    ");

                    
                    
$stmt2->execute(array(
  $CODE
));

$rows2 = $stmt2->fetchall();


                    



?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Quiz App</title>
    <link rel="stylesheet" href="css/main.css" />
  </head>
  <body>
   <?php echo '<form action="addresult.php?Code='.$CODE.'" method="POST" enctype="multipart/form-data">' ; ?>
  <div class="quiz-app">
      <div class="quiz-info">
        <div class="category">Please Answer these Questions</div>
        </div>  
    <?php 
      $acount = 1 ;
    foreach($rows2 as $rowz) {
    echo '
      <div class="quiz-area">
        '.$rowz['Question'].'
      </div>
      <div class="answers-area"> ' ;

      if($rowz['answer1'] == $rowz['corrans'] ) { 
        echo '
        <div class="answer"> 
          <input type="radio" name="answer'.$acount.'"  value="1" /><label
            >'.$rowz['answer1'].'</label
          >
        </div> '; 
      }
      else {
        echo '
        <div class="answer"> 
          <input type="radio" name="answer'.$acount.'"  value="0" /><label
            >'.$rowz['answer1'].'</label
          >
        </div> '; 
      }

      if($rowz['answer2'] == $rowz['corrans'] ) { 
        echo '
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="1" / /><label for=""
            >'.$rowz['answer2'].'</label
          >
        </div> ' ;
      }
      else {
        echo '
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="0" / /><label for=""
            >'.$rowz['answer2'].'</label
          >
        </div> ' ;
      }

      if($rowz['answer3'] == $rowz['corrans'] ) { 
        echo '
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="1" //><label 
            >'.$rowz['answer3'].'</label
          >
        </div> ' ;
      }
      else {
        echo '
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="0" //><label 
            >'.$rowz['answer3'].'</label
          >
        </div> ' ;
      }

      if($rowz['answer4'] == $rowz['corrans'] ) { 
        echo ' 
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="1" / /><label 
            >'.$rowz['answer4'].'</label
          >
        </div> ';
      }
      else {
        echo ' 
        <div class="answer">
          <input type="radio" name="answer'.$acount.'" value="0" / /><label 
            >'.$rowz['answer4'].'</label
          >
        </div> ';
      }

      echo  '</div>';
      $acount++; }
        
      ?>
            <button class="submit-button">Submit Answer</button>

            </div>

    </div>
    </form>
  </body>
</html>
