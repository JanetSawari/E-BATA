<?php
   
	
  	$extension = getExtension($source_pic);
 	$extension = strtolower($extension);

     if($extension='jpeg'){
     $src = imagecreatefromjpeg($source_pic);
        }
	 elseif($extension='jpg'){
     $src = imagecreatefromjpeg($source_pic);
        }
	  elseif($extension='png'){
     $src = imagecreatefrompng($source_pic);
        }
	 elseif($extension='gif'){
     $src = imagecreatefromgif($source_pic);
        }
	elseif($extension='bmp'){
     $src = imagecreatefromwbmp($source_pic);
        }
	elseif($extension='xbm'){
     $src = imagecreatefromxbm($source_pic);
        }


 list($width,$height)=getimagesize($source_pic);

$x_ratio = $max_width / $width;
$y_ratio = $max_height / $height;

 if( ($width <= $max_width) && ($height <= $max_height) ){
     $tn_width = $width;
     $tn_height = $height;
     }elseif (($x_ratio * $height) < $max_height){
         $tn_height = ceil($x_ratio * $height);
         $tn_width = $max_width;
     }else{
         $tn_width = ceil($y_ratio * $width);
         $tn_height = $max_height;
 }

$tmp=imagecreatetruecolor($tn_width,$tn_height);
imagecopyresampled($tmp,$src,0,0,0,0,$tn_width, $tn_height,$width,$height);

imagejpeg($tmp,$destination_pic,100);
imagedestroy($src);
imagedestroy($tmp);

?>