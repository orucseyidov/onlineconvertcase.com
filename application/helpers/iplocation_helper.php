<?php 

function iplocation($ip){
    // $ip = $this->GetIP(); // the IP address to query
    $query = @unserialize(file_get_contents('http://ip-api.com/php/'.$ip));
    if($query && $query['status'] == 'success') {
      return $query['country'].', '.$query['city'];
    } else {
      return 'Bilinməyən Ünvan';
    }
}

?>