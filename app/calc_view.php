<?php require_once dirname(__FILE__) .'/../config.php';?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl"  data-bs-theme="dark">
 
<head>
	<meta charset="utf-8" />
	<title>Kalkulator kredytów</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
	<div class="row">
	<div class="col-4"></div>

	<div class="card text-center col-4">
	<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
		<label for="id_x">Kwota: </label>
		<input id="id_x" type="number" name="x" value="<?php isset($x) ? print($x) : ''; ?>" /><br />
		<label for="id_o">Oprocentowanie: </label>
		<input id="id_o" type="text" name="o" value="<?php isset($o) ? print($o) : ''; ?>" />%<br />
		
		<label for="id_y">Na ile miesięcy: </label>
		<input id="id_y" type="number" name="y" value="<?php isset($y) ? print($y) : ''; ?>" /><br />
		<input type="submit" value="Oblicz" />
	</form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px;" class="bg-danger">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>
<div>
<?php if (isset($result) && isset($rata)){ ?>
<div style="margin: 20px; padding: 10px; border-radius: 5px;  " class='bg-success'>
<?php echo 'Koszt pożyczki: '.$result; ?>zł<br>
<?php echo 'Rata miesięczna: '.$rata; ?>zł<br>
</div>
<?php } ?>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</div> 

<div class="col-4"></div>

</div></body>
</html>