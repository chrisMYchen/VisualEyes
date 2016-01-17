<?php include 'conversionLibrary.php';?>
<html>
	<head>
		<title>
		ThunderPunch Home
		</title>
	<body>
		<p>
			<?php
				$converter = new conversionLibrary();
				//echo $converter->caloriesTo(1000, "M&Ms");
				//echo $converter->caloriesTo(1000000, "gasoline");
				//echo $converter->caloriesTo(10000, "sugar");
				echo $converter->distanceTo(2346);
				echo $converter->distanceTo(5);
				//echo $converter->distanceTo(439);
			?>
		</p>
	</body>

</html>



