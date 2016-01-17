<?php

require_once 'meekrodb.2.3.class.php';

class conversionLibrary{
	public $mdb;
	function __construct() {
		$user = 'ThunderPunch';
		$password = 'Power75';
		$dbName = 'thunderpunch';
		global $mdb;
		$mdb = new MeekroDB(null, $user, $password, $dbName);
	}
	
	
	function caloriesTo($joules, $name="NotValid"){//(number of joules, string of name to convert to)
		if(!is_numeric($joules) || $joules<0){
			echo "Nan!\n<br>";
			return;
		}
		$joules = $joules * 0.239005736; //convert joules to calories
		if($name!="NotValid"){
			global $mdb;
			if(isset($mdb)){
				$row = $mdb->queryFirstRow("SELECT * FROM values WHERE valueName=%s ;", $name);
				$value = ($joules/($row['joules']*0.239005736));//inplace joules to calories convert
				$value = round($value);
				$value = number_format($joules*0.239005736) . " calories is equivalent to ". number_format($value) . " " .  $row['logicalUnits'] . ".\n<br>";
			}
			else{echo "No database\n<br>";}
			return $value; //number of $joules converted to calories in logical units
		}
		else{
			if(isset($mdb)){
				$unitOpt = $mdb->queryOneColumn('valueName', "SELECT * FROM fitnessvalues ORDER BY meters ASC");
				$newVal;
				for($i = 0; $i<count($unitOpt); $i++){
					$cot = $mdb->queryFirstField("SELECT joules FROM fitnessvalues WHERE valueName=%s ;", $unitOpt[$i]);
					$newVal = ($joules/$cot*0.239005736);
					if($newVal<1){
					$index = $i-1;
					break;
					}
					$index = $i;
				}
				$convert = $mdb->queryFirstRow("SELECT * FROM fitnessvalues WHERE valueName=%s ;", $unitOpt[$index]);
				$newVal = ($joules/$convert['joules']*0.239005736);
				
				return number_format($joules*0.239005736)." meters is equivalent to ". number_format(round($newVal,2)) ." ".  $convert['outputString'] . ".\n<br>";
			}
		
		}
		
	}
	
	
	
	function distanceTo($dist, $units="NotValid"){//$distance is in meters, units is the name of the desired result
		if(!is_numeric($dist)||$dist<0){
				echo "Nan!\n<br>";
				return;
		}
		global $mdb;
		if($units!="NotValid"){
			if(isset($mdb)){
				$row = $mdb->queryFirstRow("SELECT * FROM fitnessvalues WHERE valueName=%s ;", $units);
				$value = ($dist/$row['meters']);
				$value = round($value, 2);
			}
			else{echo "No database\n<br>";}
			return number_format($dist)." meters is equivalent to ". number_format($value) ." ".  $row['outputString'] . ".\n<br>"; //$dist in logicalUnits
		}
		else{
			if(isset($mdb)){
				$unitOpt = $mdb->queryOneColumn('valueName', "SELECT * FROM fitnessvalues ORDER BY meters ASC");
				
				$newVal; $prevcot;
				foreach($unitOpt as $curUnit){
					$cot = $mdb->queryFirstRow("SELECT * FROM fitnessvalues WHERE valueName=%s ;", $curUnit);
					$newVal = ($dist/$cot['meters']);
					if($newVal<1){
						if(isset($prevcot)){
							$usethis = $prevcot;
						}
						else{
							$usethis = $cot;
						}
					}
					else{
						$prevcot = $cot;
						$usethis = $cot;
					}
				}
				
				var_dump($usethis);
				
				$newVal = ($dist/$usethis['meters']);
				
				return number_format($dist)." meters is equivalent to ". number_format(round($newVal,2)) ." ".  $usethis['outputString'] . ".\n<br>";
			}
		
		}
	}
	
	
	
	
	
	
}
?>












