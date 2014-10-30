<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP 5.2.4 or newer
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Academic Free License version 3.0
 *
 * This source file is subject to the Academic Free License (AFL 3.0) that is
 * bundled with this package in the files license_afl.txt / license_afl.rst.
 * It is also available through the world wide web at this URL:
 * http://opensource.org/licenses/AFL-3.0
 * If you did not receive a copy of the license and are unable to obtain it
 * through the world wide web, please send an email to
 * licensing@ellislab.com so we can send you a copy immediately.
 *
 * @package		CodeIgniterOnfire
 * @author		Diego Portales University
 * @copyright	Copyright (c) 2014 - 2014, Diego Portales University (http://udp.cl/)
 * @license		http://opensource.org/licenses/OSL-3.0 Open Software License (OSL 3.0)
 * @link		http://codeigniteronfire.com
 * @since		Version 1.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

class Compiler extends CI_Controller {
  public function __construct()
       {
            parent::__construct();
            // Add your models here
		$this->load->driver('session');
			$this->load->model("gamming/Player");
       }
	
	public function index(){

	$this->load->view("compiler");
	}
	public function compile()
	{


		session_start();
		$tmp = "/var/www/temp/";
        	$filter = array("system","fprintf","fscanf","open","close","unlink","mkdir","chmod","chown","chroot","fopen","fstream","exec","fork","clone","rm","mv","cp","scp","ssh","signal","kill","popen","socket","linux","net","bind","listen","sin_addr");
	  if (isset($_POST['code'])){
	            $newcode=utf8_decode($_REQUEST['code']);

        	    $input=stripslashes($_REQUEST['input']);
	            $newcode = str_replace($filter,"",$newcode);
	            $oName = $tmp . session_id();
	            $fName= $oName . ".cpp";
	            $inputf= $oName . ".txt";
	            $fHandle=fopen($fName, 'w+') or die ('can\'t open file');
	            $ifHandle=fopen($inputf, 'w+') or die ('can\'t open file');
	            fwrite($fHandle, $newcode);
	            fwrite($ifHandle, $input);
	            fclose($fHandle);
        	    fclose($ifHandle);
	        putenv("PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib");
	        $cmd = "/usr/bin/g++ $fName -o $oName > $oName.err 2>&1";
        	system($cmd);
	        $errors="";
	            if (file_exists("$oName.err") &&  filesize("$oName.err")>0 ){
                	$fErr = fopen("$oName.err", "r");
        	        $errors = fread($fErr, filesize("$oName.err"));
                        $errors = str_replace($fName,"TuPrograma.cpp",$errors);

		        $errors = str_replace($tmp,"",$errors);
                	echo $errors;
        	    }

		if(strlen($errors)==0){
		      $cmd2 = 'PATH=$PATH:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib & /bin/cat '.$inputf." | timeout 5 ".$oName ;
			$arr = Array();
		        $str= exec($cmd2,$arr);
				//Check if ok
	
			
	        	$str2 = str_replace($tmp,"",$str);
	        	$str2 = str_replace($fName,"TuPrograma.cpp",$str2);

        		$str2 = str_replace("\n","<br>",$str2);
	        	foreach($arr as $line){
                		echo $line."<br>";
	        	}
		}
        }


	}
	
	public function FC()
	{
			$this->load->model("site/Fc");
			$fc=  $this->input->post('fc', TRUE);
			$r = $this->Fc->getById($fc);
		session_start();
		$tmp = "/var/www/temp/";
        	$filter = array("system","fprintf","fscanf","open","close","unlink","mkdir","chmod","chown","chroot","fopen","fstream","exec","fork","clone","rm","mv","cp","scp","ssh","signal","kill","popen","socket","linux","net","bind","listen","sin_addr");
	  if (isset($_POST['code'])){
	            $newcode=utf8_decode($_REQUEST['code']);

        	    $input=stripslashes($r[0]['input']);
	            $newcode = str_replace($filter,"",$newcode);
	            $oName = $tmp . session_id();
	            $fName= $oName . ".cpp";
	            $inputf= $oName . ".txt";
	            $fHandle=fopen($fName, 'w+') or die ('can\'t open file');
	            $ifHandle=fopen($inputf, 'w+') or die ('can\'t open file');
	            fwrite($fHandle, $newcode);
	            fwrite($ifHandle, $input);
	            fclose($fHandle);
        	    fclose($ifHandle);
	        putenv("PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib");
	        $cmd = "/usr/bin/g++ $fName -o $oName > $oName.err 2>&1";
        	system($cmd);
	        $errors="";
	            if (file_exists("$oName.err") &&  filesize("$oName.err")>0 ){
                	$fErr = fopen("$oName.err", "r");
        	        $errors = fread($fErr, filesize("$oName.err"));
                        $errors = str_replace($fName,"TuPrograma.cpp",$errors);

		        $errors = str_replace($tmp,"",$errors);
                	echo $errors;
        	    }

		if(strlen($errors)==0){
		      $cmd2 = 'PATH=$PATH:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib & /bin/cat '.$inputf." | timeout 5 ".$oName ;
			$arr = Array();
		        $str= exec($cmd2,$arr);
				//Check if ok
			if($r[0]['output']==$str){
				echo "<a class='btn btn-danger' href='".base_url()."'>Felicidades!, presiona aqui para otra prueba</a><script>happy();</script><hr/ >";
				$player = $this->session->userdata('player');
				$this->Player->passChallenge($player, $this->input->post('ch', TRUE));
			}
	
			
	        	$str2 = str_replace($tmp,"",$str);
	        	$str2 = str_replace($fName,"TuPrograma.cpp",$str2);

        		$str2 = str_replace("\n","<br>",$str2);
	        	foreach($arr as $line){
                		echo $line."<br>";
	        	}
		}
        }

	}

	public function CT()
	{
			$this->load->model("site/Ct");
			$fc=  $this->input->post('ct', TRUE);
			$r = $this->Ct->getById($fc);
		session_start();
		$tmp = "/var/www/temp/";
        	$filter = array("system","fprintf","fscanf","open","close","unlink","mkdir","chmod","chown","chroot","fopen","fstream","exec","fork","clone","rm","mv","cp","scp","ssh","signal","kill","popen","socket","linux","net","bind","listen","sin_addr");
	  if (isset($_POST['code'])){
	            $newcode=utf8_decode($_REQUEST['code']);

        	    $input=stripslashes($r[0]['input']);
	            $newcode = str_replace($filter,"",$newcode);
	            $oName = $tmp . session_id();
	            $fName= $oName . ".cpp";
	            $inputf= $oName . ".txt";
	            $fHandle=fopen($fName, 'w+') or die ('can\'t open file');
	            $ifHandle=fopen($inputf, 'w+') or die ('can\'t open file');
	            fwrite($fHandle, $newcode);
	            fwrite($ifHandle, $input);
	            fclose($fHandle);
        	    fclose($ifHandle);
	        putenv("PATH=/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib");
	        $cmd = "/usr/bin/g++ $fName -o $oName > $oName.err 2>&1";
        	system($cmd);
	        $errors="";
	            if (file_exists("$oName.err") &&  filesize("$oName.err")>0 ){
                	$fErr = fopen("$oName.err", "r");
				echo  filesize("$oName.err");
        	        $errors = fread($fErr, filesize("$oName.err"));
                        $errors = str_replace($fName,"TuPrograma.cpp",$errors);

		        $errors = str_replace($tmp,"",$errors);
                	echo $errors;
        	    }

		if(strlen($errors)==0){
		      $cmd2 = 'PATH=$PATH:/usr/local/sbin:/usr/local/bin:/usr/sbin:/usr/bin:/sbin:/bin LD_LIBRARY_PATH=/usr/local/lib & /bin/cat '.$inputf." | timeout 5 ".$oName ;
			$arr = Array();
		        $str= exec($cmd2,$arr);
				//Check if ok
			if($r[0]['output']==$str){
				echo "<a class='btn btn-danger' href='".base_url()."'>Felicidades!, presiona aqui para otra prueba</a><script>happy();</script><hr/ >";
				$player = $this->session->userdata('player');
				$this->Player->passChallenge($player, $this->input->post('ch', TRUE));
			}
	
			
	        	$str2 = str_replace($tmp,"",$str);
	        	$str2 = str_replace($fName,"TuPrograma.cpp",$str2);

        		$str2 = str_replace("\n","<br>",$str2);
	        	foreach($arr as $line){
                		echo $line."<br>";
	        	}
		}
        }

	}



}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
