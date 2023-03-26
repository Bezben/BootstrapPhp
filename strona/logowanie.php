<?php 
session_start();
if($_SESSION['log'] == true){
    ?>

<form  action="index.php" method="get">
     <input type="submit"  value="Wyloguj"class="form-control"  name="logout">
</form>
<?php
}
else{
?>

    <form  action="index.php" method="post">
        <fieldset style="border: 2px solid blueviolet;">
        <legend class="float-none w-auto">Logowanie</legend>
    <label for="imie" class="form-label">Login:</label>
    <input type="text" name="login" class="form-control">

    <br />
  
    <label for="nazwisko" class="form-label">Hasło:</label>
    <input type="password" name="haslo" class="form-control">

    <br />

   <input type="submit"  value="Zaloguj"class="form-control"  name="zaloguj">
</fieldset>
</form>
<?php } ?>

