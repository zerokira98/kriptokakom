<?php

$kata = array(" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");

$plaintArr = str_split($_POST['plain']);

$plaintArrFix = stringtoarray($plaintArr);

$key1 = $_POST['key1'];
$key2 = $_POST['key2'];
$key1Arr = str_split($key1);
$key2Arr = str_split($key2);


function stringtoarray($data){
$i =0;
  foreach ($data as $plain) {
    // code...
    if (upcheck($plain)) {
      // code...
      $newplaint[$i] = $plain;
    }
    else {
      $newplaint[$i] = strtolower($plain);
      $newplaint[($i+=1)] = "_";
    }

    $i++;
  }
  return $newplaint;
}

function upcheck($string) {
  if(preg_match("/[A-Z]/", $string)===0) {
		return true;
	}
	return false;
}
$run = encodeing($key1Arr,$key2Arr,$plaintArrFix,$kata);

function encodeing($key1Arr,$key2Arr,$plaintArrFix,$kata){
  $i=0;
  foreach ($plaintArrFix as $key ) {
    // code...
      $sepPlan = charToInt($key, $kata);
      $keyint1 = charToInt($key1Arr[$i%(count($key1Arr))], $kata);
      $keyint2 = charToInt($key2Arr[$i%(count($key2Arr))], $kata);
      $valueEncy = aritmatic($sepPlan, $keyint1, $keyint2);
                if ($valueEncy == -1) {
                    $chiperTextArray[$i] = "_";
                }
                else {
                    $chiperTextArray[$i] = $kata[$valueEncy];
                }
                $i++;
    }
    foreach ($chiperTextArray as $key ) {
      echo "".$key;
    }
}
function charToInt($a, $kata) {
// -1 if "_"
        $y = -1;
        for ( $x = 0; $x < 27; $x++) {
            if ($kata[$x]==$a) {
                $y = $x;
            }
        }
        return $y;
    }
    function aritmatic($a, $key1, $key2) {
        if ($a == -1) {
            return -1;
        } else {
             $c = ($a + pow($key1, 2) + $key2) % 27;
            return $c;
        }
    }


 ?>
