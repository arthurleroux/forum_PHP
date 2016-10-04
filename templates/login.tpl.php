<div class="container">
	<div class="col-lg-4 col-lg-offset-4 text-center" id="login">
		<?php

		echo $error;
		echo $success;

		?>
		<form method="post">
			<div class="row">
				<input type="text" class="input" placeholder="pseudo" name="pseudo"/>
			</div>
			<div class="row">
				<input type="password" class="input" placeholder="password" name="password"/>
			</div>
			<div class="row">
				<input type="submit" value="Login"/>
			</div>
		</form>
	</div>
</div>

