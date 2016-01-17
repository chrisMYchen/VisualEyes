<?php
	$hash="password";
	$hash="150y03HitfPr0p33vP2n" . $hash;
	for($i =0; $i<1000;$i++){
		$hash = sha1($hash);
	}
	echo $hash;
?>