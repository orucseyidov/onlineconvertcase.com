<?php 
// file_upload_helper.php


function image_upload($file,$line,$securty=null){
	$filename    = $file['name'];
	$tmpfilename = $file['tmp_name'];
	$type        = $file['type'];
	$hashcode = substr(md5(time().rand(0, 9999)), 10,10);
	// creat upload floder
	if (!file_exists($_SERVER['DOCUMENT_ROOT'].$line)) {
		mkdir($_SERVER['DOCUMENT_ROOT'].$line,0777);
		// Creat upload floder/index.php
		if (!file_exists($_SERVER['DOCUMENT_ROOT'].$line."index.php")) {
			$creat = fopen($_SERVER['DOCUMENT_ROOT'].$line."index.php", "w");
			$code = "<?php header('location:../'); exit(); ?>";
			// writing İndex.php
			if ($creat) {
				fwrite($creat, $code);
				fclose($creat);
			}
			// writing end
		}
		//End Index.php
	}
	//  Creat Floder End
	if ($securty !=null) {
		$types = array(
			'image/png','image/jpg','image/jpeg','image/gif','video/mp4'
		);
		if (!in_array($type, $types)) {
			return false;
			exit;
		}
	}
	// upload start
	$move = $_SERVER['DOCUMENT_ROOT'].$line.$hashcode.str_replace(" ", "-", $filename);
	$upload = move_uploaded_file($tmpfilename,$move);
	$filename = $line.$hashcode.str_replace(" ", "-", $filename);
	if (!$upload) {
		return false;
	}
	else{
		return $filename;
	}

}



function file_delet($file){
	if(isset($file)){
		if( file_exists($_SERVER['DOCUMENT_ROOT'].$file) ){
			$sil = unlink($_SERVER['DOCUMENT_ROOT'].$file);
			if ($sil) {
				return true;
			}
			else{
				return false;
			}
		}
	}
}



function file_upload($file,$line,$name=null){
	$filename    = $file['name'];
	$tmpfilename = $file['tmp_name'];
	$type        = $file['type'];
	$hashcode = substr(md5(time().rand(0, 9999)), 10,10);
	// creat upload floder
	if (!file_exists($_SERVER['DOCUMENT_ROOT'].$line)) {
		
		mkdir($_SERVER['DOCUMENT_ROOT'].$line,0777);
		// Creat upload floder/index.php
		if (!file_exists($_SERVER['DOCUMENT_ROOT'].$line."index.php")) {
			$creat = fopen($_SERVER['DOCUMENT_ROOT'].$line."index.php", "w");
			$code = "<?php header('location:../'); exit(); ?>";
			// writing İndex.php
			if ($creat) {
				fwrite($creat, $code);
				fclose($creat);
			}
			// writing end
		}
		//End Index.php
	}
	//  Creat Floder End
	$realname   = $name == null ? uniqid() : $name;
	$realname   = character_change($realname);
	$ext 		= pathinfo($filename, PATHINFO_EXTENSION);
	// $realname 	= mb_convert_encoding($realname, "UTF-8");
	// upload start
	$move 		= $_SERVER['DOCUMENT_ROOT'].$line.$hashcode."-".str_replace(" ", "-", $realname.".".$ext);
	$upload 	= move_uploaded_file($tmpfilename,$move);
	$success 	= $line.$hashcode."-".str_replace(" ", "-", $realname.".".$ext);
	
	if (!$upload) {
		return false;
	}
	else{
		return $success;
	}

}



function character_change($character){
	$character = trim($character);
	$character = html_entity_decode($character, ENT_QUOTES, 'UTF-8'); // Html öğeleri karakterlere dönüştür
	$character = str_replace('Ç','C', $character);
	$character = str_replace('ç','C', $character);
	$character = str_replace('Ğ','G', $character);
	$character = str_replace('ğ','G', $character);
	$character = str_replace('I','I', $character);
	$character = str_replace('ı','I', $character);
	$character = str_replace('İ','I', $character);
	$character = str_replace('Ö','O', $character);
	$character = str_replace('ö','O', $character);
	$character = str_replace('Ş','S', $character);
	$character = str_replace('ş','S', $character);
	$character = str_replace('Ü','U', $character);
	$character = str_replace('ü','U', $character);
	$character = str_replace('Ə','E', $character);
	$character = str_replace('ə','E', $character);
	$character = str_replace(' ','-',  $character);
	$character = preg_replace("@[^A-Za-z0-9\-_]+@i","",$character); // A-Z, 0-9 ve "-" hariç tüm karakterleri kaldır
	$character = str_replace('-----','-',$character);
	$character = str_replace('----','-',$character);
	$character = str_replace('---','-',$character);
	$character = str_replace('--','-', $character);
	$character = str_replace('--','-', $character);
	$character = ucwords($character);
	$character = trim($character,'-');
	return $character;
}


function resize($newWidth,$newHeight,$targetFile, $originalFile) {

    $info = getimagesize($originalFile);
    $mime = $info['mime'];
    switch ($mime) {
        case 'image/jpeg':
                $image_create_func 	= 'imagecreatefromjpeg';
                $image_save_func 	= 'imagejpeg';
                $new_image_ext 		= 'jpg';
                break;

        case 'image/png':
                $image_create_func = 'imagecreatefrompng';
                $image_save_func = 'imagepng';
                $new_image_ext = 'png';
                break;

        case 'image/gif':
                $image_create_func = 'imagecreatefromgif';
                $image_save_func = 'imagegif';
                $new_image_ext = 'gif';
                break;

        default: 
                throw new Exception('Unknown image type.');
    }

    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);

    // $newHeight = ($height / $width) * $newWidth;
    $newHeight = ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor($newWidth, $newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);

    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile");
    return $targetFile;
}



?>