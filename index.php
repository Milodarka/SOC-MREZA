<?php


require_once 'header.php';

    $sql = "SELECT ime, prezime, pol 
    FROM profili 
    WHERE korisnik_id = $id";

    $result= $conn->query($sql);

    $red= $result->fetch_assoc();
    $ime = $red['ime']; 

    echo "kako ste danas ?" . $ime ;

    if(isset($red['prezime']))
    {
        $prezime = $red['prezime'];
        echo "Bas vam je lepo prezime $prezime";
    }
    else
    {
        echo "nedefinisani ste";
    }

    /*if(isset($red['pol'])== 'o')
    {
        echo "<img src='socslike/o.png'>";
    }
    if(isset($red['pol'])== 'z')
    {
        echo "<img src='socslike/z.png'>";
    }*/
    



?>

<html>
    <head>
        <link rel="stylesheet" type="text/css" href="socstil/stilS.css">
    </head>


    <body>
        <div class="nije">

                <div class="pozadina">
                    <img src=socslike/pp.png>
                </div>

            <table>    
                <tr> 
                    <a href="#"> 
                        <img src=socslike/search.png > 
                        <h4> Find friends </h4>
                        </a>
                </tr>

                <tr class="pathome">
                    <a href="#">
                        <img src ="socslike/messa.png"> 
                        <h4> Messages </h4>
                        
                    </a>
                </tr>
                    
                <tr class="patprof">
                    <a href="socslike/1.png">
                        <img src ="socslike/prof.png"> 
                        <h4> My profile </h4>
                        
                    </a>
                </tr>

                <tr class="patfr">
                    <a href="#">
                        <img src ="socslike/notif.png"> 
                        <h4> Notifications </h4>
                        
                    </a>
               
                </table>
        </div>

        

    </body>




</html>