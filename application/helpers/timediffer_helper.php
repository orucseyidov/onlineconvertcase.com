<?php 

function timediffer($zaman){
	$zaman = strtotime($zaman);  //27.07.2015 11:41:15 bu versiya ucun date('d.m.Y H:i:s')
	$zaman_farki = time() - $zaman;
	$saniye = $zaman_farki;
	$dakika = round($zaman_farki/60);
	$saat	= round($zaman_farki/3600);
	$gun	= round($zaman_farki/86400);
	$hafta	= round($zaman_farki/604800);
	$ay		= round($zaman_farki/2419200);
	$yil	= round($zaman_farki/29030400);
	
	if($saniye < 60 ){
		if($saniye == 0){
			return "az əvvəl";
		}else {
			return $saniye .' saniyə əvvəl';
		}
		}else if($dakika < 60){
			return $dakika.' dəqiqə əvvəl';
		}else if($saat < 24){
			return $saat.' saat əvvəl';
		}else if($gun < 7){
			return $gun.' gün əvvəl';
		}else if($hafta < 4){
			return $hafta.' həftə əvvəl';
		}else if($ay < 12){
			return $ay.' ay əvvəl';
		}else{
			return $yil.' il əvvəl';
		}
}







function hesapla($alistarihi,$donustarihi,$alissaati="0",$donussaati="0"){
      if((!empty($donustarihi)) or (!empty($alistarihi))){  
         $zaman1 = new DateTime($alistarihi);
         $zaman2 = new DateTime($donustarihi);
         $gun  = $zaman1->diff($zaman2);
            if ($zaman2 > $zaman1){
            $saathesapla   = $donussaati-$alissaati;
               if(($saathesapla <= "0")){
                  $sonuc   =  $gun->format('%a'); 
               }else {
                  $sonuc   =  ($gun->format('%a'))+1;          
               }
            }else{
               $sonuc   = 1;    
            }
         return floor($sonuc);   
      }
   }


function date_past($event){
	$date = new DateTime($event);
	$now  = new DateTime();
	if($date < $now) {
	    return true;
	}else{
		return false;
	}
}




?>