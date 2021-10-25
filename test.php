<?php 

$string =  "the_stealth_warrior";
$explode = explode("_",$string);

foreach($explode as $key => $val){
    $split = str_split($val);
    for($a = 0; $a <= count($split); $a++){
        if ($a == 0) {
            
           echo $split[0];
           break;   
        }
      
    }
    break;
    echo $val;
}


// $explode = explode("_",$string);
// $count = count($explode) - 1;





?>