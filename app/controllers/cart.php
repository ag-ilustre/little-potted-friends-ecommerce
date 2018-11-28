<?php
session_start();
?>

<!-- cart.php -->

<pre>
	<h1>
	<?php 
		print_r($_SESSION["cart"]);
	?>
	</h1>
</pre>