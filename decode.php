<?php
class Decrypt {
    public $plaintArr;
    public $key1;
    public $key2;
    public $kata = array(" ", "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z");
    function insertData($data,$key1,$key2){
      $this->plaintArr = $data;
      $this->key1 = $key1;
      $this->key2 = $key2;
    }
    public function disp(){

      foreach ($this->plaintArr as  $value) {
        // code...
        echo " ".$value;
      }
    }
    public function decrypting(){
      $n = 0;
      $i = 0;
      foreach ($this->plaintArr as $value) {
        // code...
        $sepChi = $this->charToInt($value);
        $keyint1 = $this->charToInt($this->key1[$i%(count($this->key1))]);
        $keyint2 = $this->charToInt($this->key2[$i%(count($this->key2))]);
        $valueEncy = $this->aritmatic($sepChi, $keyint1, $keyint2);

                    if ($valueEncy == -1) {
                        $plantTextArray[$n - 1] = strtoupper($plantTextArray[$n - 1]);
                        $n--;
                    } else {
                        $plantTextArray[$n] = $this->kata[$valueEncy];
                    }

            $n++;
            $i++;
      }
      foreach ($plantTextArray as  $value) {
        // code...
        echo "".$value;
      }
    }
    public function aritmatic($a, $key1, $key2) {
        if ($a == -1) {
            return -1;
        }
        else {
            $c = ($a - pow($key1, 2) - $key2);

            while ($c < 0) {
                $c += 26;
            }
            return $c;
        }
    }
    public function charToInt( $a) {
        $y = -1;
        for ($x =0 ;$x <26;$x++) {
              if ($this->kata[$x]==$a) {
                  $y = $x;
              }
        }
        return $y;
    }
    public function truemod($num, $mod) {
      return ($mod + ($num % $mod)) % $mod;
    }

}
$plain = str_split($_POST['plain']);
$key1 = str_split($_POST['key1']);
$key2 = str_split($_POST['key2']);
$new = new Decrypt();
$new->insertData($plain, $key1, $key2);
$new->decrypting();
 ?>
