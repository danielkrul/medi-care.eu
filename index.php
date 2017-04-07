<?php
	$displayErrorMessage = false;
	$fullErrorMessage = '';
	$error = false;
	global $displayErrorMessage;
	global $fullErrorMessage;
	global $error;
	$saveIDTimeDays = 365;
	$saveIDDefaultText = 'v001r1i267482';

	function displayError($_errorMessage){
		$displayErrorMessage = true;
		$error = true;
		$fullErrorMessage .= '<p>Chyba: ' . $_errorMessage . '</p>';
	}

	if (isset($_POST['deviceLogin'])) {
		$IDText = $_POST['IDText'];
		$passwordText = $_POST['passwordText'];
		$saveID = $_POST['saveID'];

		if (trim($IDText) == '') {
			$errorMessage = 'Vyplňte ID zařízení!';
			displayError($errorMessage);
		}
		if (trim($passwordText) == '') {
			$errorMessage = 'Vyplňte heslo!';
			displayError($errorMessage);
		}

		if(!$error){
			// OK
			if($saveID == "on"){
				setcookie("ID", $IDText, time() + (86400 * $saveIDTimeDays), "/");
			}

			require 'engine/login.php';
		}
	} 

	if(isset($_COOKIE['ID'])){
		$saveIDDefaultText = $_COOKIE['ID'];
	}

	$title = 'MediCare';
	$selectedPage = 'index';

	include 'inc/header.php';
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
						<div class="errorBox">
							<?php
								if($displayErrorMessage){
									print_r($fullErrorMessage);
								}
							?>
						</div>
					<form method="POST">
						<table>
							<tr>
								<td><input class="style" type="text" name="IDText" placeholder="ID zařízení" value="<?php echo $saveIDDefaultText ?>"></td>
							</tr>

							<tr>
								<td><div class="spacer"></div></td>
							</tr>
							<tr>
								<td><input class="style" value="1234" type="password" name="passwordText" placeholder="Heslo"></td>
							</tr>
							<tr>
								<td><div class="spacer"></div></td>
							</tr>
							<tr>
								<td><input class="button" type="submit" name="deviceLogin" value="Přihlásit"></td>
							</tr>
							<tr>
								<td><div class="bigSpacer"></div></td>
							</tr>
							<tr>
								<td>
									<label>
										<input type="checkbox" name="saveID">
										Uložit ID
									</label>
								</td>
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