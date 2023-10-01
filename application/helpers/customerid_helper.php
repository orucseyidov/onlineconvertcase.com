<?php 

function customer_id($length) {
$password = "";
  for($i=0;$i<$length;$i++) {
    switch(rand(1,3)) {
      case 1: $password.=chr(rand(48,57));  break; //0-9
      case 2: $password.=chr(rand(48,57));  break; //0-9
      case 3: $password.=chr(rand(48,57));  break; //0-9
    }
  }
  return $password;
}

?>