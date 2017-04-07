<header id="head">
	<div class="left">
		<a href="/">
			<h1>Medi<span class="colored">Care</span></h1>
		</a>
	</div>

	<div class="right">
		<div class="menu">
			<a <?php if($selectedPage == 'index') echo 'class="selected"'; ?> href="/"><i class="fa fa-home" aria-hidden="true"></i> Domů</a>
			<a <?php if($selectedPage == 'register') echo 'class="selected"'; ?> href="register.php"><i class="fa fa-sign-in" aria-hidden="true"></i> Registrace</a>
			<a <?php if($selectedPage == 'about') echo 'class="selected"'; ?> href="about.php"><i class="fa fa-info" aria-hidden="true"></i> O MediCare</a>
			<a target="_blank" href="/MediCareMonitor.apk"><i class="fa fa-android" aria-hidden="true"></i></a>
		</div>
	</div>
</header>