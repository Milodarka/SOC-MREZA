


<?php
    
  
    require_once 'header.php';
        

        $sql ="SELECT 
        k.id AS id, k.username AS username,p.ime AS ime, p.prezime AS prezime, p.pol AS pol
        FROM korisnici AS k
        INNER JOIN profili AS p
        ON k.id = p.korisnik_id
        WHERE k.id != $id
        ORDER BY p.ime, p.prezime";

        $result = $conn->query($sql);
        if (!$result)
        {
           echo "<p>greska,  razlog" . $conn->error ."</p>";
        }
        else
        {   
            if($result->num_rows == 0)
            {
                echo"nema nikoga u bazi";
            }

            else 
            {
                echo "My friends list";
                echo "<span style='position:relative; 
                top: 90px;
                font-size:25px;'>";
                echo"<table class='pac'>";
                echo "<tr>";
                echo "<td>";
                echo "name ";
                echo "</td>";
                echo "<td>";
                echo "lastname";
                echo "</td>";
                echo "<td>";
                echo "pol";
                echo "<td>";
                echo "username";
                echo "</td>";
                echo "<td>";
                echo "action";
                echo "</td>";
                echo "<td>";
                echo "related";
                echo "</td>";
                echo "</tr>";


                while($red=$result->fetch_assoc())
                {
                

                echo "<tr>";
               
               
                echo "<td>";
                echo $red["ime"];
                echo "</td>";

                echo "<td>";
                echo $red["prezime"];
                echo "</td>";

                echo "<td>";
                echo $red["pol"];
                echo "</td>";

                echo "<td>";
                echo $red ["username"];
                echo "</td>";

               echo "<td class='dugme'>";
               $pid = $red['id'];

               $sql1 = "
               SELECT * FROM prijatelji 
               WHERE korisnik_id = $id
               AND prijatelj_id = $pid";

           $result1 = $conn->query($sql1);

           $jatebe = $result1->num_rows; //0 ili 1 rezultat

           $sql2 = "
           SELECT * FROM prijatelji
           WHERE korisnik_id = $pid
           AND prijatelj_id = $id";

           $result2 = $conn->query($sql2);

           $timene = $result2->num_rows; //0 ili 1 rezultat
           if(!empty($_GET['dodaj']))
           {
               $pid = $conn->real_escape_string($_GET['dodaj']);
               
               $sql = "
                   SELECT * FROM prijatelji
                   WHERE korisnik_id = $id
                   AND prijatelj_id = $pid";
               $result = $conn->query($sql);
               if($result->num_rows == 0)
               {
                   $sql1 = "
                       INSERT INTO prijatelji
                           (korisnik_id, prijatelj_id)
                           VALUE ($id, $pid)";
                   $result1 = $conn->query($sql1);
               } // end-if (unut)
               header('Location: tabela.php');
           } // end-if (spolj)
               
               //prati
               if($jatebe + $timene > 1)
                    {
                        echo "";
                    }
                    elseif($jatebe)
                    {
                        echo "";
                    }
                    elseif($timene)
                    {
                        echo "";
                    }
                    else
                    {
                        echo "<a href='tabela.php?dodaj=$pid'>";
                        echo "Prati korisnika";
                        echo "</a> ";
                    }
                
                 //brisi
                 if(!empty($_GET['brisi']))
    {
        $pid = $conn->real_escape_string($_GET['brisi']);
        $sql ="SELECT * FROM prijatelji
                WHERE korisnik_id = $id
                AND prijatelj_id = $pid";
        $result = $conn->query($sql);
        if($result->num_rows >0)
        {
            $sql1 = "
            DELETE FROM prijatelji
            WHERE korisnik_id = $id
            AND prijatelj_id = $pid";
            $result = $conn->query($sql1);
        }
        header('Location: tabela.php');
    }
                    if($jatebe + $timene > 1)
                    {
                        echo " <a href='tabela.php?brisi=$pid'>";
                        echo "Brisi pracenje";
                        echo "</a>";
                    }
                    elseif($timene)
                    {
                        echo " <a href='tabela.php?brisi=$pid'>";
                        echo "Brisi pracenje";
                        echo "</a>";
                    }
                    elseif($jatebe)
                    {
                        echo " <a href='tabela.php?brisi=$pid'>";
                        echo "Brisi pracenje";
                        echo "</a>";
                    }
                    else{
                        echo "";
                    }
                echo"</td>";
               

                echo "<td>";
                
                if($jatebe + $timene > 1)
               {
                   echo " uzajamni prijatelji  ";
               }
               elseif($jatebe)
               {
                   echo "pratim korisnika";
               }
               elseif($timene)
               {
                   echo "korisnik mene prati";
               }
               else
               {
                   echo "nidje veze";
               }
               
                
                echo "</td>";
                echo "</tr>";
            }
           
                echo "</table>";
            }
            echo "</span>";
        }
    

?>

</body>
</html>