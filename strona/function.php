
<?php 
	function pokaz_menu($linki){
		for($i =0; $i<count($linki); $i++){
                        $element= "";
                        $element .='<a class="btn btn-primary btn-block" href="';
                        $element .=$linki[$i][0];
                        $element .= '">';
                        $element .=$linki[$i][1];
                        $element .='</a>';
                        

                       
                if (isset($_SESSION['rola']))
                    {
                        $numer = $_SESSION['rola'];
                    }
                else
                    {
                        $numer = 2;
                    }
                if($linki[$i][2] >= $numer)
				    echo($element);
			   			
		
                    }
	}
	function zapisz_do_pliku($imie, $nazwisko, $email){
		$dane= $imie . " " . $nazwisko . " " . $email . "\n";
		$plik = fopen("dane/uzytkownicy.txt", "a+") or die("Nie można otworzyć pliku!");

		fwrite($plik, $dane);
		fclose($plik);
		
	}
function pokaz_karuzele($karuzela){
	for($i=0; $i < count($karuzela);$i ++)
	{
		$element = '<div class="carousel-item';
		if ($i == 0)
			{$element .= ' active';}

		$element .= '"><img src="';
		$element .= $karuzela[$i];
		$element .= '"class="d-block" style="width:100%" height=400px;></div>';
		echo($element);

	}
}


	function pokaz_artykuly()
	{
		include "db.php";

		$con = mysqli_connect($servername, $username, $password, $dbname);

		if(!$con)
		{
		    die("Blad polaczenia z baza danych " . mysqli_connect_error());
		}

		$sql = "SELECT * FROM artykuly1 ORDER BY id DESC";

		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result) > 0)
		{
			while($row = mysqli_fetch_assoc($result))
		    {
		        pokaz_artykul($row);
		    }
		        
		}
		else
		{
		    echo "Brak danych!!!";
		}

		mysqli_close($con);
	}


	function pokaz_artykul($row)
	{
		$zn = "";
		$zn .= '<div class="article">';
		$zn .= '<img src="img/art/'.$row['obraz'].'" />';
	    $zn .= '<h1>'.$row['tytul'].'</h1>';
	    $zn .= '<h3>'.$row['autor'].'</h3>';
	    $zn .= '<p class="intro">'.$row['wstep'].'</p>';
	    $zn .= '<p>'.$row['tresc'].'</p>';
       	$zn .= '</div>';
		echo $zn;
	}

	function pokaz_strone($ind)
	{
		include 'dane.php';
		return $strony[$ind];
	}
	function zaloguj($login, $haslo){
		  include 'db.php';

	    $con = mysqli_connect($servername, $username, $password, $dbname);

	    if(!$con)
	    {
	        die("Blad polaczenia z baza danych " . mysqli_connect_error());
	    }

	    $sql = "SELECT * FROM users WHERE login='" . $login . "' AND haslo='" . $haslo . "'";

	    $result = mysqli_query($con, $sql);

	    if(mysqli_num_rows($result)>0){
	    	$row =mysqli_fetch_assoc($result);
	    	session_start();
	    	  $_SESSION['dane'] = $row['imie']." ".$row['nazwisko'];
	    	  $_SESSION['dodatkowe_dane']=$row['plec']." ".$row['data'];
            $_SESSION['rola'] = $row['rola'];
            $_SESSION['log'] = true;
           
	    }
	    else{
	    	$_SESSION['user'] = 2;
	    	$_SESSION['log'] = false;
	    	$_SESSION['dane'] = "";
	    	session_destroy();
	    }
	    

	    mysqli_close($con);



	}

  function wylogowywanie()
    {
        $_SESSION['log'] = false;
        $_SESSION['rola'] = 2;
        $_SESSION['dane'] = "";
        session_destroy();
    }


	function komunikat(){
		if($_SESSION['log'] == true){
			?>
			<form  action="index.php" method="post">
		<div class="container mt-3">
  <h2>Witaj</h2>
  <div class="card img-fluid" style="width:500px">
    <img class="card-img-top" src="img/art/img_avatar1.png" alt="Card image" style="width:100%">
    <div class="card-img-overlay">
       <h4 class="card-title"><?php echo "Zalogowany użytkownik ". $_SESSION['dane'];?></h4>
      <input type="submit"  value="dodatkowe informacje"class="form-control"  name="dodatkowe">
      <p class="card-text"><?php kom()?></p>
    </div>
  </div>
</div>
   </form>  
      
    
		<?php
			
		}
		else{

		}
	}
		 function kom()
    {
        if (isset($_POST['dodatkowe']))
        {
            echo "". $_SESSION['dodatkowe_dane'];
        }
    }
	 function logowanie()
    {
        if (isset($_POST['zaloguj']))
        {
            zaloguj($_POST['login'], $_POST['haslo']);
        }
        else if($_GET['logout'] == "Wyloguj")
        {
            wylogowywanie();
        }
    }


 ?>
