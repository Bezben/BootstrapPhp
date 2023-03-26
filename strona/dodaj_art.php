<?php

include "db.php";
		$tytul = $_POST["tytul"];
	    $autor = $_POST["autor"];
	    $wstep = $_POST["wstep"];
	    $tresc = $_POST["tresc"];
	     $obraz = $_POST["my_image"];

$img_name = $_FILES['my_image']['name'];
    $img_size = $_FILES['my_image']['size'];
    $tmp_name = $_FILES['my_image']['tmp_name'];
    $error = $_FILES['my_image']['error'];

    $conn = mysqli_connect($server,$username,$password,$dbname);
    
    if(!$conn){
        die("Błąd połączenia z baza danych".mysqli_connect_error());
    }

    if ($error === 0) {
        if ($img_size > 125000) {
            $em = "Sorry, your file is too large.";
            header("Location: index.php?error=$em");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png","gif"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = uniqid("IMG-", true).'.'.$img_ex_lc;
                $img_upload_path = '/homes/s38124/www/strona/img/art/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

 $sql = "INSERT INTO artykuly1(tytul, autor, wstep, tresc, obraz) VALUES ('".$tytul."','".$autor."','".$wstep."','".$tresc."','".$new_img_name."')";
 	

	    mysqli_query($conn, $sql);


                echo 'Dodano arykuł!';
                


                mysqli_close($con);

            }else {
                $em = "You can't upload files of this type";

            }
        }
    } else {
        'cos';
    }


?>

