
    <?php
      session_start();
      require_once 'konekcija.php';

            if(!isset($_SESSION['id']))
        {
            header('Location: login.php');
        }

     global $id; 
     $id=$_SESSION['id'];

     ?>
     <html>
         <head>
         <link rel="stylesheet" type="text/css" href="socstil/stilS.css">
     </head>
     <body>

     <div class="headerKao">
            <ul>
                <li><a href="logout.php"> <img src="socslike/friends.png"> Logout </a>
                </li>
                <li><a href="index.php"><img src="socslike/mess.png"> Home </a>
                </li>
                <li><a href="tabela.php"><img src="socslike/act.png"> My friends</a>
                </li>
                <li><a href="forma.php"><img src="socslike/not.png"> Edit my profile  </a>
                </li>
                <li><a href="sifra.php"><img src="socslike/psv.png"> Edit my password </a>
                </li>
                
            </ul>
        </div>
<!-- ne zatvaramo <body> i <html> !!!!!-->
     