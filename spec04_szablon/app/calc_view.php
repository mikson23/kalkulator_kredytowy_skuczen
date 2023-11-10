<?php //góra strony z szablonu 
include _ROOT_PATH.'/templates/top.php';
?>


	<div class="row w-100">
	<div class="col-4"></div>

	<div class="card text-center col-4 p-4">
	<form action="<?php print(_APP_URL);?>/app/calc.php" method="post">
		<div class="form-floating mb-3">
			<input type="number" class="form-control" id="id_x" name="x" placeholder="1" value="<?php out($x); ?>">
			<label for="id_x">Kwota kredytu:</label>
		</div>
		<div class="form-floating mb-3">
			<input type="text" class="form-control" id="id_o" name="o" placeholder="1" value="<?php out($o); ?>">
			<label for="id_o">Oprocentowanie:</label>
		</div>
		<div class="form-floating mb-3">
			<input type="number" class="form-control" id="id_y" name="y" placeholder="1" value="<?php out($y); ?>">
			<label for="id_y">Na ile miesięcy:</label>
		</div>
		
		
		<input type="submit" class="btn btn-outline-light" value="Oblicz" />
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

</div>

<?php //dół strony z szablonu 
include _ROOT_PATH.'/templates/bottom.php';
?>