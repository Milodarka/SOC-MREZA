
<?php
 require_once 'header.php';



    $sql = "
        SELECT * 
        FROM korisnici
        WHERE id= $id ";

        $result = $conn->query($sql);
        $red = $result->fetch_assoc();
        $username = $red['username'];
        $pass = $red['pass'];


        $passUnosStara = "*";
        $passUnosNova = "*";

        //sifra
        if(!empty($_POST))
        {
            
        $stara = $conn->real_escape_string($_POST['stara']);
        $nova = $conn->real_escape_string($_POST['nova']);
        $ponovljena = $conn->real_escape_string($_POST['ponovljena']);
        $hesiranaNova = md5($nova);

        

            if(md5($stara) == $pass && $nova == $ponovljena )
            {
                $sql1= "UPDATE korisnici
                        SET pass= '$hesiranaNova'
                        WHERE id = $id ";

                $conn->query($sql1);
            }
            else
            {
                if(md5($stara) != $pass) 
                {
                    //ispis da nije ispravno uneta stara sifra
                    $passUnosStara = "Neispravno uneta stara sifra";
                }
                if($nova != $ponovljena)
                {
                    //nisu istenova i ponovljena
                    $passUnosNova = "Neispravno uneta potvrda nove sifre";
                }
            }
            

        }

 ?>
    <center>
        <span style='position:relative; 
                                top: 90px;
                                font-size:25px;'>

            <form action="sifra.php" method="POST">
                Korisnicko ime: <br>
                <input type="text" name="korisnik" placeholder=<?php echo $username?> readonly> <br>
                Stara sifra: <br>
                <input type="password" name="stara">
                <span> <?php  echo $passUnosStara ?> </span> <br>
                Nova sifra: <br>
                <input type="password" name="nova">
                <span><?php echo $passUnosNova ?> </span> <br>
                Ponovite sifru: <br>
                <input type="password" name="ponovljena">
                <span> <?php echo $passUnosNova ?> </span> <br>
                <input type="submit" name="potvrdi">
            </form> 
        </span>
                </center>
        </body>

</html>
