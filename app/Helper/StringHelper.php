<?php 
namespace App\Helper;

/**
* 
*/
class StringHelper 
{
	
	static function substrtitle($str, $num){
		$newStr = $str;
		if(mb_strlen($str)>$num){  
		    $newStr = mb_substr($str,0,$num,"UTF8")."...";
		} 


	    return $newStr; 
	}
}

 ?>