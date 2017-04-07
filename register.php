<?php
	$title = 'MediCare | Registrace';

	include 'inc/header.php';
	$selectedPage = 'register';
?>

<body>
	<div id="page">
		<div id="inner">
			<?php 
				include 'inc/menu.php';
			?>

			<div id="content">
				<div class="innerLogin">
					<div class="login">
					<form method="POST">
						<table>
								<tr>
									<td><input class="style" type="text" name="ID" placeholder="Jméno"></td>
								</tr>
								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td><input class="style" type="text" name="ID" placeholder="Příjmení"></td>
								</tr>
								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td><input class="style" type="text" name="ID" placeholder="ID zařízení"></td>
								</tr>

								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td><input class="style" type="password" name="passwordText" placeholder="Heslo"></td>
								</tr>
								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td><input class="style" type="password" name="passwordText" placeholder="Opakujte heslo"></td>
								</tr>
								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td>
										<select name="years" class="styleSel">
											<option value="0" selected disabled>Věk</option>
											<?php 
											for ($i = 1; $i <= 99; $i++) { 
												echo '<option value="'. $i .'">'. $i .'</option>';
											}
											?>
										</select>
										<select name="sex" class="styleSel">
											<option value="0" selected disabled>Pohlaví</option>
											<option value="1">Muž</option>
											<option value="2">Žena</option>
										</select>
									</td>
								</tr>
								<tr>
									<td><div class="spacer"></div></td>
								</tr>
								<tr>
									<td><input class="button" type="submit" name="deviceLogin" value="Zaregistrovat"></td>
								</tr>
							</table>
					</form>
					</div>
				</div>
			</div>
		</div>
		<?php
			include 'inc/foot.php'; 
		?>
	</div>
</body>
</html>