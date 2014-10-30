<?php
class Marvel extends CI_Model {

var $private='YOUR PRIVATE API KEY HERE';
var $public='YOUR PUBLIC API KEY HERE';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function get100(){

	$timestamp=time();
	$hash=md5($timestamp.$private.$public);
	$items=100;

	$marvel_url="http://gateway.marvel.com:80/v1/public/characters?limit=$items&ts=$timestamp&apikey=$public&hash=$hash";


	//echo $url;
	$marvel_url=$marvel_url.'&offset='.($items*$_REQUEST['pagina']);
	//echo $marvel_url;
	$ret=file_get_contents($marvel_url);
//echo $ret;
	$arr_ret=json_decode($ret);
//print_r($arr_ret);
	$status_code=$arr_ret->code;
	$etag=$arr_ret->etag;
	foreach ($arr_ret->data->results as $character)
	{
	  echo '<div class="character"><span style="float:left">';
		echo $character->id.': ';
		echo $character->name;
		echo '</span>';
		$image_url=$character->thumbnail->path.'/portrait_xlarge.'.$character->thumbnail->extension;
		echo "<img style='float:left' src='$image_url' />";
		echo '</div>';
	}
} 

}
