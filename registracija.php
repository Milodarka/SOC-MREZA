
<?php
require_once 'konekcija.php';

if(!empty($_POST))
{
    $korIme = real_escape_string($_POST['korisnickoIme']);
    $pass = real_escape_string($_POST['pass']);
    $identicno ="";     
    $sql= "SELECT username, pass
     FROM korisnici
                    WHERE username = '$korIme'
                    AND pass = $pass";

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

                        if($korIme == $red['username'])
                        {
                            $identicno = "taj korisnik vec postoji u bazi";
                        }
                }

}

?>
<html>
<head>
</head>
</body>
        <form  action="registracija.php" method="POST">

           
            Unesite svoje korisnicko ime: <br>
            <input type= "text" name="korisnickoIme"> 
            <span> <?php echo $identicno; ?> </span> <br>
            Unesite svoj password: <br>
            <input type="password" name="pass"> <br>
            Potvrdite password: <br>
            <input type="password" name="potvrda">
            <input type= "submit" name="potvrdi">

        </form>

        <a href ="pocetna.php"> Pocetna </a> <br>
        <a href = "login.php"> Prijavi se </a>
        
    </body>
</html>