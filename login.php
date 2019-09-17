<?php

    //otvara nje sesije na pocetku skripte
    session_start();

    require_once 'konekcija.php'; //ukljucivanje fajla

    //jos nacina ukljucivanja

    /**include - ukljucuje fajl(nastavlja  ako fajl ne postoji)
     * require - ukljucuje fajl ali je greska ako ne postoji(prekida izvrsenje ako fajl ne postoji)
     * incluude_once - (isto + ako je vec ukljucen ne ukljucuje ga)
     * require_once - (isto + ako je vec ukljucen ne ukljucuje ga)
     */

            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $user= $conn->real_escape_string($_POST['username']);
                $pass= $conn->real_escape_string($_POST['pass']);
            
            $sql= "SELECT * FROM korisnici
                    WHERE username = '$user'";

            $result = $conn->query($sql);
                if(!$result)
                {
                    echo "upit nije dobar";
                }
                else
                {
                    if($result->num_rows == 0)
                    {
                        echo "ovakav korisnik ne postoji u bazi";
                    }
                    else 
                    {
                        $red=$result->fetch_assoc();
                        //$red['id'], $red['username'],$red['pass']


                         //da li su razliciti passwordi
                        if(md5($pass) != $red['pass'])
                        {
                            echo "Nije doslo do poklapanja sifara";
                        }
                        else 
                        {
                            $_SESSION['id'] = $red['id'];
                            header('Location:index.php');

                        }
                    }
                }
            
           
        }  
        
?>


<html>
            <head>
                <style>
                    body{
                        background-image:url('socslike/ppp.png') ;
                        background-repeat:no-repeat;
                        padding:50px 150px ;
                    }
                    form
                    {
                        padding:150px 150px;
                    }
                    .pocetna:hover 
                    {
                        width:40%;
                    }
                    .pocetna img
                    {
                        width:20%;
                        position:absolute;
                        padding-bottom: 790px;
                        
                    }
                   
                    </style>

             </head>

                <body>
                
                    <form method="POST" action="login.php">
                        <label for ="user"> Username: </label>
                            <input type="text" name="username" value="">
                        <br> <br>
                        <label for="pass"> Password:</label>
                            <input type="password" name="pass" value="">
                            <br> <br>
                        <input type="submit"  value="login" class="login">
                        
                        
                    </form>
                    <a href ="pocetna.php" class="pocetna"> <img src="socslike/paaa.png"> Pocetna </a> <br>
                   

            </body>

</html>