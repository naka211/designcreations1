<?php
function utf8_to_ascii($str) {
	$chars = array(
		'a'	=>	array('ấ','ầ','ẩ','ẫ','ậ','Ấ','Ầ','Ẩ','Ẫ','Ậ','ắ','ằ','ẳ','ẵ','ặ','Ắ','Ằ','Ẳ','Ẵ','Ặ','á','à','ả','ã','ạ','â','ă','Á','À','Ả','Ã','Ạ','Â','Ă'),
		'e' =>	array('ế','ề','ể','ễ','ệ','Ế','Ề','Ể','Ễ','Ệ','é','è','ẻ','ẽ','ẹ','ê','É','È','Ẻ','Ẽ','Ẹ','Ê'),
		'i'	=>	array('í','ì','ỉ','ĩ','ị','Í','Ì','Ỉ','Ĩ','Ị'),
		'o'	=>	array('ố','ồ','ổ','ỗ','ộ','Ố','Ồ','Ổ','Ô','Ộ','ớ','ờ','ở','ỡ','ợ','Ớ','Ờ','Ở','Ỡ','Ợ','ó','ò','ỏ','õ','ọ','ô','ơ','Ó','Ò','Ỏ','Õ','Ọ','Ô','Ơ'),
		'u'	=>	array('ứ','ừ','ử','ữ','ự','Ứ','Ừ','Ử','Ữ','Ự','ú','ù','ủ','ũ','ụ','ư','Ú','Ù','Ủ','Ũ','Ụ','Ư'),
		'y'	=>	array('ý','ỳ','ỷ','ỹ','ỵ','Ý','Ỳ','Ỷ','Ỹ','Ỵ'),
		'd'	=>	array('đ','Đ'),
	);
	foreach ($chars as $key => $arr) 
		foreach ($arr as $val)
			$str = str_replace($val,$key,$str);
	return $str;
}



function url_prodir($id,$admin=0)
{	
	$params = &JComponentHelper::getParams( 'com_ecommerce' );
	$imgpath = $params->get('imgpath');
	
	if($admin==1)  $prodir = "../components/com_ecommerce/imgupload/";
	else  $prodir = "./components/com_ecommerce/imgupload/";
	
	return $prodir;
} 


class se_upload {

	// INITIALIZE VARIABLES
	var $is_error = 0;		// DETERMINES WHETHER THERE IS AN ERROR OR NOT
	var $error_message = "";	// CONTAINS RELEVANT ERROR MESSAGE

	var $file_name;			// CONTAINS NAME OF UPLOADED FILE
	var $file_type;			// CONTAINS UPLOADED FILE MIME TYPE
	var $file_size;			// CONTAINS UPLOADED FILE SIZE
	var $file_tempname;		// CONTAINS TEMP NAME OF UPLOADED FILE
	var $file_error;		// CONTAINS UPLOADED FILE ERROR
	var $file_ext;			// CONTAINS UPLOADED FILE EXTENSION
	var $file_width;		// CONTAINS UPLOADED IMAGE WIDTH
	var $file_height;		// CONTAINS UPLOADED IMAGE HEIGHT

	var $is_image;			// DETERMINES WHETHER FILE IS AN IMAGE OR NOT
	var $file_maxwidth;		// CONTAINS THE MAXIMUM WIDTH OF AN UPLOADED IMAGE
	var $file_maxheight;		// CONTAINS THE MAXIMUM HEIGHT OF AN UPLOADED IMAGE






	// THIS METHOD SETS INITIAL VARS SUCH AS FILE NAME
	// INPUT: $file REPRESENTING THE NAME OF THE FILE INPUT
	//	  $file_maxsize REPRESENTING THE MAXIMUM ALLOWED FILESIZE
	//	  $file_exts REPRESENTING AN ARRAY OF LOWERCASE ALLOWABLE EXTENSIONS
	//	  $file_types REPRESENTING AN ARRAY OF LOWERCASE ALLOWABLE MIME TYPES
	//	  $file_maxwidth (OPTIONAL) REPRESENTING THE MAXIMUM WIDTH OF THE UPLOADED PHOTO
	//	  $file_maxheight (OPTIONAL) REPRESENTING THE MAXIMUM HEIGHT OF THE UPLOADED PHOTO
	// OUTPUT: 
	function new_upload($file, $file_maxsize, $file_maxwidth = "", $file_maxheight = "") {
	  global $class_upload;

	  // GET FILE VARS
	  $this->file_name = $_FILES[$file]['name'];
	  $this->file_type = strtolower($_FILES[$file]['type']);
	  $this->file_size = $_FILES[$file]['size'];
	  $this->file_tempname = $_FILES[$file]['tmp_name'];
	  $this->file_error = $_FILES[$file]['error'];
	  $this->file_ext = strtolower(str_replace(".", "", strrchr($this->file_name, "."))); 

	  $file_dimensions = @getimagesize($this->file_tempname);
	  $this->file_width = $file_dimensions[0];
	  $this->file_height = $file_dimensions[1];
	  if($file_maxwidth == "") { $file_maxwidth = $this->file_width; }
	  if($file_maxheight == "") { $file_maxheight = $this->file_height; }
	  $this->file_maxwidth = $file_maxwidth;
	  $this->file_maxheight = $file_maxheight;
	  $this->is_error =0;	
	  // ENSURE THE FILE IS AN UPLOADED FILE
	  if(!is_uploaded_file($this->file_tempname)) { $this->is_error = 1; $this->error_message = "File chưa được upload lên server"; }

	  // CHECK THAT FILESIZE IS LESS THAN GIVEN FILE MAXSIZE
	  if($this->file_size > $file_maxsize) { $this->is_error = 1; $this->error_message = "Dung lượng file vượt quá mức cho phép là $file_maxsize KB"; }

	  // CHECK EXTENSION OF FILE TO MAKE SURE ITS ALLOWED
	 // if(!in_array($this->file_ext, $file_exts)) { $this->is_error = 1; $this->error_message = $class_upload[3]; }

	  // CHECK MIME TYPE OF FILE TO MAKE SURE ITS ALLOWED
	//  if(!in_array($this->file_type, $file_types)) {mkdir($this->file_type); $this->is_error = 1; $this->error_message = $class_upload[3]; }

	  // DETERMINE IF FILE IS A PHOTO (AND IF GD CAN BE USED)
	  $this->is_image = 0;
	  if($file_dimensions !== FALSE & in_array($this->file_ext, Array('gif', 'jpg', 'jpeg', 'png', 'bmp')) !== FALSE) { 
	    $this->is_image = 1;
	    // ENSURE THE UPLOADED FILE IS NOT LARGER THAN MAX WIDTH AND HEIGHT IF GD IS NOT AVAILABLE
	    if(!$this->image_resize_on()) {
	      $this->is_image = 0;
	      if($file_width > $file_maxwidth OR $file_height > $file_maxheight) { $this->is_error = 1; $this->error_message = "Kích cở file hình quá lớn và server không hỗ trợ resize"; }
	    }
	  } else {
	    $this->is_image = 0;
	  }


	} // END new_upload() METHOD









	// THIS METHOD UPLOADS A FILE
	// INPUT: $file_dest REPRESENTS THE DESTINATION OF THE UPLOADED FILE
	// OUTPUT: BOOLEAN INDICATING WHETHER UPLOAD SUCCEEDED OR FAILED
	function upload_file($file_dest) { 
	  global $class_upload;

	  // TRY MOVING UPLOADED FILE, RETURN ERROR UPON FAILURE
          if(!move_uploaded_file($this->file_tempname, $file_dest)) { 
	    $this->is_error = 1; $this->error_message = $class_upload[1]; 
	    return false;
	  } else {
	    chmod($file_dest, 0777);
	    return true;
	  }

	} // END upload_file() METHOD









	// THIS METHOD UPLOADS A PHOTO
	// INPUT: $photo_dest REPRESENTS THE DESTINATION OF THE UPLOADED PHOTO
	//	  $file_maxwidth (OPTIONAL) REPRESENTING THE MAXIMUM WIDTH OF THE UPLOADED PHOTO
	//	  $file_maxheight (OPTIONAL) REPRESENTING THE MAXIMUM HEIGHT OF THE UPLOADED PHOTO
	// OUTPUT: BOOLEAN INDICATING WHETHER UPLOAD SUCCEEDED OR FAILED
	function upload_photo($photo_dest, $file_maxwidth = 0, $file_maxheight = 0, $txt=0) { 

	  // SET MAX WIDTH AND HEIGHT
	  if($file_maxwidth == 0) { $file_maxwidth = $this->file_maxwidth; }
	  if($file_maxheight == 0) { $file_maxheight = $this->file_maxheight; }

	  // CHECK IF DIMENSIONS ARE LARGER THAN ADMIN SPECIFIED SETTINGS
	  // AND SET DESIRED WIDTH AND HEIGHT
	  if($this->file_width > $file_maxwidth & $this->file_height > $file_maxheight){
	  	if($this->file_width > $this->file_height){
			$height = ($this->file_height)*$file_maxwidth/($this->file_width);
	     	$width = $file_maxwidth;
		}
		else{
			$width = ($this->file_width)*$file_maxheight/($this->file_height);
	      	$height = $file_maxheight;
		}
	  
	  }
	  elseif($this->file_width > $file_maxwidth | $this->file_height > $file_maxheight) { 
	    if($this->file_height > $file_maxheight) {
	      $width = ($this->file_width)*$file_maxheight/($this->file_height);
	      $height = $file_maxheight;
	    }
	    if($this->file_width > $file_maxwidth) {
	      $height = ($this->file_height)*$file_maxwidth/($this->file_width);
	      $width = $file_maxwidth;
	    }
	  } else {
	    $width = $this->file_width;
	    $height = $this->file_height;
	  }
	  
		$quality=100;
		
		//Duy Anh -- Watermark file
		$src_img='../images/watermask_hoanlong.png';

	  // RESIZE IMAGE AND PUT IN USER DIRECTORY
	  switch($this->file_ext) {
	    case "gif":
	      $file = imagecreatetruecolor($width, $height);
	      $new = imagecreatefromgif($this->file_tempname);
	      $kek=imagecolorallocate($file, 255, 255, 255);
	      imagefill($file,0,0,$kek);
	      imagecopyresampled($file, $new, 0, 0, 0, 0, $width, $height, $this->file_width, $this->file_height);
		  if($txt!=0) $file=$this->watermark($file, $src_img);
	      imagejpeg($file, $photo_dest,$quality);
	      ImageDestroy($new);
	      ImageDestroy($file);
	      break;
	    case "bmp":
	      $file = imagecreatetruecolor($width, $height);
	      $new = $this->imagecreatefrombmp($this->file_tempname);
	      for($i=0; $i<256; $i++) { imagecolorallocate($file, $i, $i, $i); }
	      imagecopyresampled($file, $new, 0, 0, 0, 0, $width, $height, $this->file_width, $this->file_height); 
		  if($txt!=0) $file=$this->watermark($file, $src_img);
	      imagejpeg($file, $photo_dest,$quality);
	      ImageDestroy($new);
	      ImageDestroy($file);
	      break;
	    case "jpeg":
	    case "jpg":
	      $file = imagecreatetruecolor($width, $height);
	      $new = imagecreatefromjpeg($this->file_tempname);
	      for($i=0; $i<256; $i++) { imagecolorallocate($file, $i, $i, $i); }
	      imagecopyresampled($file, $new, 0, 0, 0, 0, $width, $height, $this->file_width, $this->file_height);
		  if($txt!=0) $file=$this->watermark($file, $src_img);
	      imagejpeg($file, $photo_dest,$quality);
	      ImageDestroy($new);
	      ImageDestroy($file);
	      break;
	    case "png":
	      $file = imagecreatetruecolor($width, $height);
	      $new = imagecreatefrompng($this->file_tempname);
	      for($i=0; $i<256; $i++) { imagecolorallocate($file, $i, $i, $i); }
	      imagecopyresampled($file, $new, 0, 0, 0, 0, $width, $height, $this->file_width, $this->file_height); 
		  if($txt!=0) $file=$this->watermark($file, $src_img);
	      imagejpeg($file, $photo_dest,$quality);
	      ImageDestroy($new);
	      ImageDestroy($file);
	      break;
	  } 

	  chmod($photo_dest, 0777);

	  return true;

	} // END upload_photo() METHOD









	// THIS METHOD CHECKS FOR NECESSARY IMAGE RESIZING SUPPORT
	// INPUT: 
	// OUTPUT: BOOLEAN INDICATING WHETHER GD CAN BE USED TO RESIZE IMAGES 
	function image_resize_on() {

	  // CHECK IF GD LIBRARY IS INSTALLED
	  if( !is_callable('gd_info') ) return FALSE;
	
	  $gd_info = gd_info();
	  preg_match('/\d/', $gd_info['GD Version'], $match);
	  $gd_ver = $match[0];
		
	  if($gd_ver >= 2 AND $gd_info['GIF Read Support'] == TRUE AND $gd_info['JPEG Support'] == TRUE AND $gd_info['PNG Support'] == TRUE) {
	    return true;
	  } else {
	    return false;
	  }
	} // END image_resize_on() METHOD









	// THIS METHOD CONVERTS BMP TO GD
	// INPUT: $src REPRESENTING THE SOURCE OF THE BMP
	//	  $dest (OPTIONAL) REPRESENTING THE DESTINATION OF THE GD
	// OUTPUT: BOOLEAN INDICATING WHETHER THE CONVERSION SUCCEEDED OR FAILED
	function ConvertBMP2GD($src, $dest = false) {
	  if(!($src_f = fopen($src, "rb"))) {
	    return false;
	  }
	  if(!($dest_f = fopen($dest, "wb"))) {
	    return false;
	  }

	  $header = unpack("vtype/Vsize/v2reserved/Voffset", fread($src_f, 14));
	  $info = unpack("Vsize/Vwidth/Vheight/vplanes/vbits/Vcompression/Vimagesize/Vxres/Vyres/Vncolor/Vimportant", fread($src_f, 40));

	  extract($info);
	  extract($header);

	  if($type != 0x4D42) {  // signature "BM"
	    return false;
	  }

	  $palette_size = $offset - 54;
	  $ncolor = $palette_size / 4;
	  $gd_header = "";
	  // true-color vs. palette
	  $gd_header .= ($palette_size == 0) ? "\xFF\xFE" : "\xFF\xFF"; 
	  $gd_header .= pack("n2", $width, $height);
	  $gd_header .= ($palette_size == 0) ? "\x01" : "\x00";
	  if($palette_size) {
	    $gd_header .= pack("n", $ncolor);
	  }
	  // no transparency
	  $gd_header .= "\xFF\xFF\xFF\xFF";     
	
	  fwrite($dest_f, $gd_header);
	
	  if($palette_size) {
	    $palette = fread($src_f, $palette_size);
	    $gd_palette = "";
	    $j = 0;
	    while($j < $palette_size) {
	      $b = $palette{$j++};
	      $g = $palette{$j++};
	      $r = $palette{$j++};
	      $a = $palette{$j++};
	      $gd_palette .= "$r$g$b$a";
	    }
	    $gd_palette .= str_repeat("\x00\x00\x00\x00", 256 - $ncolor);
	    fwrite($dest_f, $gd_palette);
	  }
	
	  $scan_line_size = (($bits * $width) + 7) >> 3;
	  $scan_line_align = ($scan_line_size & 0x03) ? 4 - ($scan_line_size & 0x03) : 0;
	
	  for($i = 0, $l = $height - 1; $i < $height; $i++, $l--) {
	    // BMP stores scan lines starting from bottom
	    fseek($src_f, $offset + (($scan_line_size + $scan_line_align) * $l));
	    $scan_line = fread($src_f, $scan_line_size);
	    if($bits == 24) {
	      $gd_scan_line = "";
	      $j = 0;
	      while($j < $scan_line_size) {
	        $b = $scan_line{$j++};
	        $g = $scan_line{$j++};
	        $r = $scan_line{$j++};
	        $gd_scan_line .= "\x00$r$g$b";
	      }
	    } elseif($bits == 8) {
	      $gd_scan_line = $scan_line;
	    } elseif($bits == 4) {
	      $gd_scan_line = "";
	      $j = 0;
	      while($j < $scan_line_size) {
	        $byte = ord($scan_line{$j++});
	        $p1 = chr($byte >> 4);
	        $p2 = chr($byte & 0x0F);
	        $gd_scan_line .= "$p1$p2";
	      } 
	      $gd_scan_line = substr($gd_scan_line, 0, $width);
	    } elseif($bits == 1) {
	      $gd_scan_line = "";
	      $j = 0;
	      while($j < $scan_line_size) {
	        $byte = ord($scan_line{$j++});
	        $p1 = chr((int) (($byte & 0x80) != 0));
	        $p2 = chr((int) (($byte & 0x40) != 0));
	        $p3 = chr((int) (($byte & 0x20) != 0));
	        $p4 = chr((int) (($byte & 0x10) != 0)); 
	        $p5 = chr((int) (($byte & 0x08) != 0));
	        $p6 = chr((int) (($byte & 0x04) != 0));
	        $p7 = chr((int) (($byte & 0x02) != 0));
	        $p8 = chr((int) (($byte & 0x01) != 0));
	        $gd_scan_line .= "$p1$p2$p3$p4$p5$p6$p7$p8";
	      } 
	      $gd_scan_line = substr($gd_scan_line, 0, $width);
	    }
	    
	    fwrite($dest_f, $gd_scan_line);
	  }
	
	  fclose($src_f);
	  fclose($dest_f);
	
	  return true;
	
	} // END ConvertBMP2GD() METHOD
	








	// THIS METHOD CREATES IMAGE FROM BMP FUNCTION
	// INPUT: $filename REPRESENTING THE NAME OF THE FILE TO BE USED FOR CREATION
	// OUTPUT: BOOLEAN INDICATING WHETHER THE CREATION SUCCEEDED OR FAILED
	function imagecreatefrombmp($filename) {
	
	  $tmp_name = tempnam("/tmp", "GD");
	  if($this->ConvertBMP2GD($filename, $tmp_name)) {
	    $img = imagecreatefromgd($tmp_name);
	    unlink($tmp_name);
	    return $img;
	  } else {
	    return false;
	  }

	} //END imagecreatefrombmp() METHOD



//Duy Anh -- Dong dau watermark
function watermark($sourcefile, $watermarkfile) {
 
    #
    # $sourcefile = Filename of the picture to be watermarked.
    # $watermarkfile = Filename of the 24-bit PNG watermark file.
    #
	
    //Get the resource ids of the pictures
    $watermarkfile_id = imagecreatefrompng($watermarkfile);
   
    imageAlphaBlending($watermarkfile_id, false);
    imageSaveAlpha($watermarkfile_id, true);

    $fileType = strtolower(substr($sourcefile, strlen($sourcefile)-3));
	
	$sourcefile_id=$sourcefile;

    //Get the sizes of both pix  
  $sourcefile_width=imageSX($sourcefile_id);
  $sourcefile_height=imageSY($sourcefile_id);
  $watermarkfile_width=imageSX($watermarkfile_id);
  $watermarkfile_height=imageSY($watermarkfile_id);

    $dest_x = ( $sourcefile_width - $watermarkfile_width);
    $dest_y = ( $sourcefile_height - $watermarkfile_height);
   
    // if a gif, we have to upsample it to a truecolor image
    if($fileType == 'gif') {
        // create an empty truecolor container
        $tempimage = imagecreatetruecolor($sourcefile_width, $sourcefile_height);
       
        // copy the 8-bit gif into the truecolor image
        imagecopy($tempimage, $sourcefile_id, 0, 0, 0, 0,
                            $sourcefile_width, $sourcefile_height);
       
        // copy the source_id int
        $sourcefile_id = $tempimage;
    }

    imagecopy($sourcefile_id, $watermarkfile_id, $dest_x, $dest_y, 0, 0,
                        $watermarkfile_width, $watermarkfile_height);
	return $sourcefile_id;
}

}
?>