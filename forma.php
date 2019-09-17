

<?php
 require_once 'header.php';
    $imeProvera = "*";
    $prezimeProvera = "*";

    $sql= "
        SELECT * 
        FROM profili 
        WHERE korisnik_id = $id;
        ";
        $result = $conn->query($sql);
        if($result->num_rows == 0)
        {
            $imeValue = "";
            $prezimeValue = "";
            $sex = 'o';
        }
        else
        {
            $red = $result->fetch_assoc();
            $imeValue = $red['ime'];
            $prezimeValue = $red['prezime'];
            $sex = $red['pol'];
           
            
        }

    if(!empty($_POST))
    {
       
        $name = $conn->real_escape_string($_POST['name']);
        $lastname = $conn->real_escape_string($_POST['lastN']);
        $sex = $conn->real_escape_string($_POST['sex']);
        
            if(empty($name))
            {
                $imeProvera= "You must enter your name";
            }
                else
                {
                    if(empty($lastname))
                    {
                        $prezimeProvera = "You must enter your lastname";
                    }
                        else{

                            if($result->num_rows == 0)
                            {
                            $sql="INSERT INTO profili(korisnik_id,ime, prezime, pol)
                                    VALUES($id, '$name', '$lastname', '$sex')";
                                
                            
                            }
                                else{
                                    $sql="UPDATE profili
                                    SET ime='$name',prezime='$lastname', pol='$sex'
                                    WHERE korisnik_id=$id ";
                        
                                    
                                }
                        $conn->query($sql);
           header("Refresh: 0; forma.php");
            }
        }
        }



       
?>

   
       <center> <p> Submit new information </p>
        <span style='position:relative; 
                        top: 90px;
                        font-size:25px;'>

            <form action="forma.php" method="POST">

            Name: <br>
            <input type="text" name= "name" value= "<?php echo $imeValue ?> ">
                <span> <?php 
                    echo $imeProvera;
                  ?> </span>
            
             <br> <br>
            Last name: <br>
            <input type="text" name="lastN" value= "<?php echo $prezimeValue ?> ">
            <span> <?php 
                   echo $prezimeProvera;
                  ?> </span>
            
            
            <br> <br>
            Sex: <br>

                    <input type='radio' name ='sex' value='o'
                        <?php
                        if($sex =='o')
                        {
                            echo "checked";
                        }
                        ?>
                        > Other<br>


                    <input type='radio' name='sex' value='f'
                    <?php
                        if($sex =='z')
                        {
                            echo "checked";
                        }
                        ?>
                        >Female <br>


                    <input type='radio' name='sex' value='m'
                    <?php
                        if($sex =='m')
                            {
                                echo "checked";
                            }
                            ?>
                        > Male <br> <br>   
           
            <?php

                /*
                if($sex == 'z')
                {
                    echo "
                    <input type='radio' name ='sex' value='o'> Other<br>
                    <input type='radio' name='sex' value='f' checked>Female <br>
                    <input type='radio' name='sex' value='m'>Male <br> <br>";   
                }
                elseif($sex == 'm')
                {
                    echo "
                    <input type='radio' name ='sex' value='o'> Other<br>
                    <input type='radio' name='sex' value='f'>Female <br>
                    <input type='radio' name='sex' value='m' checked>Male <br> <br>";   

                }
                else 
                {
                    echo "
                    <input type='radio' name ='sex' value='o' checked> Other<br>
                    <input type='radio' name='sex' value='f'>Female <br>
                    <input type='radio' name='sex' value='m'>Male <br> <br>";   

                }*/


            ?>
           
            
            
            

            <input type="submit" name="submit" value = "submit">
            </center>
            
        </form> </span>

        

        
    </body>



</html>