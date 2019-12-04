<?php
  if (!session_id()) session_start();
  if(isset($_POST['password'])&&isset($_POST['username'])){
      if($_POST['password']=='1234'&&$_POST['username']=='Maciel'){
          $_SESSION['logon'] = true;
      }
  }
  if(!$_SESSION['logon']){
    header("location:admin.html");
    die();
  }
?>
<html lang="pt-br">
  <head>
    <!-- Meta tags Obrigatórias -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="css/lps_styles.css">
    <!-- JavaScript (Opcional) -->
    <!-- jQuery primeiro, depois Popper.js, depois Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

    <title>LPS - Signal Processing Laboratory</title>
  </head>
  <body>
    <header>
      <nav class="navbar navbar-expand-lg navbar-light bg-light" style="background-color: rgb(212, 212, 212);">
        <a class="navbar-brand" href="main.html">
          <img src="fig/logo_nav.png" height="100" class="d-inline-block align-middle" alt="">
          Signal Processing Laboratory
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <a class="nav-link lps-nav-link-main" href="main.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link lps-nav-link" href="team.html">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link lps-nav-link" href="researches.html">Research</a>
            </li>
            <li class="nav-item">
              <a class="nav-link lps-nav-link" href="events.html">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link lps-nav-link" href="contact.html">Contact</a>
            </li>
            <li class="nav-item dropdown lps-nav-link">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Useful Links
              </a>
              <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="https://github.com/lablps?tab=contributions&period=monthly">LPS - Git</a>
                <a class="dropdown-item" href="https://sites.google.com/site/eesclpswiki/home">LPS - Wiki</a>
              </div>
            </li>
          </ul>
          <span class="navbar-text">
            <a class="nav-link" href="main_pt.html">
              <img src="fig/brazil.png" height="20" class="d-inline-block align-middle" alt="">
            </a>
          </span>
        </div>
      </nav>
    </header>
    <div class="lps-content">
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
          <h1 class="lps-title-text">Admin Area</h1>
        </div>
      </div>
      <div class="row justify-content-md-center">
        <div class="col col-lg-6">
          <p>
            <?php
              $doc = new DomDocument();
              @$doc->loadHTMLFile("team.html");
              $xpath = new DOMXpath($doc);
              $students = $xpath->query("//h3[contains(@class,'card-title')]");
              foreach($students as $student){
                echo htmlspecialchars($student->nodeValue).'\n';
              }
            ?>
          </p>
          <div class="container">
            <form class="form-inline" action="remove_student.php" method="post">
              <label for="inlineFormCustomSelectPref">Preference</label>
              <select class="custom-select" name="remove_student" id="inlineFormCustomSelectPref">
                <option selected>Choose...</option>
                <?php
                  foreach($students as $student){
                    $name = $student->nodeValue;
                    echo '<option value="'.htmlspecialchars($name).'">'.htmlspecialchars($name).'</option>';
                  }
                ?>
              </select>
              <button type="submit" class="btn btn-primary my-1">Submit</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
