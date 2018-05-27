<?php

date_default_timezone_set('America/Los_Angeles');

$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );
$elem = $d->format("Y-m-d H:i:s.u");
$file_name = str_replace("-", "_", date('Y-m-d'));

$ip_to_print = get_IP();
$referrer_ip = get_referrer_Address();
$date_and_ip = "Date: ${elem} IP: ${ip_to_print} Referrer Address: ${referrer_ip}";
write_to_file($date_and_ip, $date, $file_name);

function write_to_file($str, $elem, $file_name){
	$working_dir = getcwd();
	if (file_exists("${working_dir}/${file_name}_traffic_log.txt")) {
	  $fh = fopen("${working_dir}/${file_name}_traffic_log.txt", 'a');
	} else {
	  $fh = fopen("${working_dir}/${file_name}_traffic_log.txt", 'w');
	} 
	fwrite($fh, $str."\n");
	fclose($fh);

}

function get_IP(){
	if(! empty($_SERVER['HTTP_CLIENT_IP'])){
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	}elseif(! empty( $_SERVER['HTTP_X_FORWARDED_FOR'])){
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	}else{
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}

function get_referrer_Address(){
	return $_SERVER['HTTP_REFERER'];
}
?>
