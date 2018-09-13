<?php


class Encrypt{
private $kata = array(" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
private $plaintArr;
private $key1Arr ;
private $key2Arr ;

function insertdata($plaintArr,$key1Arr,$key2Arr){
  $this->plaintArr = $this->stringtoarray($plaintArr);
  $this->key1Arr = $key1Arr ;
  $this->key2Arr = $key2Arr ;
}
function stringtoarray($plaintArr){
$i =0;
  foreach ($plaintArr as $plain) {
    // code...
    if ($this->upcheck($plain)) {
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

function encodeing(){
  $i=0;;
  foreach ($this->plaintArr as $key ) {
    // code...
      $sepPlan = $this->charToInt($key);
      $keyint1 = $this->charToInt($this->key1Arr[$i%(count($this->key1Arr))]);
      $keyint2 = $this->charToInt($this->key2Arr[$i%(count($this->key2Arr))]);
      $valueEncy = $this->aritmatic($sepPlan, $keyint1, $keyint2);
                if ($valueEncy == -1) {
                    $chiperTextArray[$i] = "_";
                }
                else {
                    $chiperTextArray[$i] = $this->kata[$valueEncy];
                }
                $i++;
    }
    foreach ($chiperTextArray as $key ) {
      echo "".$key;
    }
}
function charToInt($a) {
// -1 if "_"
        $y = -1;
        for ( $x = 0; $x < 27; $x++) {
            if ($this->kata[$x]==$a) {
                $y = $x;
            }
        }
        return $y;
    }

        function aritmatic($a, $key1, $key2) {
          if ($a == -1) {
              return -1;
          }
          else {
               $c = (($a + pow($key1, 2) + $key2) % 27);
              return $c;
          }
        }
}

$plaintArr = str_split($_POST['plain']);
$key1Arr = str_split($_POST['key1']);
$key2Arr = str_split($_POST['key2']);
$dom = new Encrypt();
$dom->insertdata($plaintArr,$key1Arr,$key2Arr);
$dom->encodeing();
 ?>
