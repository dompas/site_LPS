<?php
  if(isset($_POST['remove_student'])){
    $doc = new DomDocument();
    @$doc->loadHTMLFile("team.html");
    $xpath = new DOMXpath($doc);
    $students = $xpath->query("//h3[contains(@class,'card-title')]");
    echo $_POST['remove_student'];
    foreach($students as $student){
      if($student->nodeValue==$_POST['remove_student']){
        echo $student->nodeValue;
        $student->parentNode->removeChild($student);
      }
    }
    $doc->saveHTMLFile("team.html");
    //$doc->saveHTML();
  }
  //header("location:admin_area.php");
  //die();
