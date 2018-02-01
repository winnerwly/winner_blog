<?php
namespace Org\Util;	
	
class Date{
	public function translate($t=0){
		$str = "";
		$t = time()-$t;
		switch($t){
			case $t<60:$str = "刚刚";break;
			case $t<=3600:$str = (int)($t/60)."分钟前";break;
			case $t<=86400:$str = (int)($t/3600)."小时前";break;
			case $t<=2592000:$str = (int)($t/86400)."天前";break;
			case $t<=31104000:$str = (int)($t/2592000)."月前";break;
			default:$str = (int)($t/31104000)."年前";break;
		}
		return $str;	
	}
}	

?>