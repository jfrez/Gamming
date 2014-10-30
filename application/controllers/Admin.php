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

class Admin extends CI_Controller {
  public function __construct()
       {
            parent::__construct();
            // Add your models here
	 $this->load->driver('session');

       }
	
	public function index()
	{
	$this->load->view('admin/main');	
	}
	public function createWorld()
	{
	$this->load->view('admin/createWorld');	
	}
	public function createWorldSubmit()
	{
		$this->load->model('gamming/World');
	        $title = $this->input->post('title', TRUE);
	        $valid = $this->input->post('valid', TRUE);
		$id = $this->World->add($title);	
		$this->World->setStatus($id,$valid);
	$this->index();
	}
	public function createPath()
	{
		$this->load->model('gamming/World');
		$worlds = $this->World->getall();
	$this->load->view('admin/createPath',Array('worlds'=>$worlds));	
	}
	public function createPathSubmit()
	{
		$this->load->model('gamming/Path');
	        $title = $this->input->post('title', TRUE);
	        $world = $this->input->post('world', TRUE);
		$id = $this->Path->add($title);	
		$this->Path->setWorld($id,$world);
	$this->index();
	}
	public function createLevel()
	{
		$this->load->model('gamming/Path');
		$paths = $this->Path->getall();
	$this->load->view('admin/createLevel',Array('paths'=>$paths));	
	}
	public function createLevelSubmit()
	{
		$this->load->model('gamming/Levels');
	        $title = $this->input->post('title', TRUE);
	        $desc = $this->input->post('desc', TRUE);
	        $path = $this->input->post('path', TRUE);
		$id = $this->Levels->add($title,$desc);	
		$this->Levels->setPath($id,$path);
	$this->index();
	}
	
	public function createChallenge()
	{
		$this->load->model('gamming/Levels');
		$levels = $this->Levels->getall();
		$this->load->model('gamming/Rewards');
		$rewards = $this->Rewards->getall();
		$this->load->view('admin/createChallenge',Array('levels'=>$levels, 'rewards' =>$rewards));	
	}
	public function createChallengeSubmit()
	{
		$this->load->model('gamming/Challenges');
	        $title = $this->input->post('title', TRUE);
	        $desc = $this->input->post('desc', TRUE);
	        $level = $this->input->post('level', TRUE);
	        $type = $this->input->post('type', TRUE);
	        $reward = $this->input->post('reward', TRUE);
		$id = $this->Challenges->add($title,$desc,$type);
		$this->Challenges->setLevel($id,$level);
		$this->Challenges->setReward($id,$reward);
		if($type == "MC"){
			$this->load->view("admin/createMC",Array('challenge'=>$id));
		}
		if($type == "CT"){
			$this->load->view("admin/createCT",Array('challenge'=>$id));
		}
		if($type == "FC"){
			$this->load->view("admin/createFC",Array('challenge'=>$id));
		}
	}
	public function createReward()
	{
		$this->load->view('admin/createReward');	
	}
	public function createRewardSubmit()
	{
		$this->load->model('gamming/Rewards');
	        $title = $this->input->post('title', TRUE);
	        $desc = $this->input->post('desc', TRUE);
	        $icon = $this->input->post('icon', TRUE);
	        $image = $this->input->post('image', TRUE);
		$id = $this->Rewards->add($title,$desc,$icon,$image);
	$this->index();
	}
	public function createMCSubmit(){
		$title = $this->input->post('title', TRUE);
		$desc = $this->input->post('desc', TRUE);
		$ch = $this->input->post('ch', TRUE);
		$choices = json_decode($this->input->post('choices', TRUE));
		$this->load->model("site/Mc");
		foreach($choices as $c){
			$this->Mc->add($ch,$c->text,$c->correct);
		}

	}	
	public function createCTSubmit(){
		$desc = $this->input->post('desc', TRUE);
		$input = $this->input->post('input', TRUE);
		$output = $this->input->post('output', TRUE);
		$ch = $this->input->post('ch', TRUE);
		$this->load->model("site/Ct");
		$this->Ct->add($desc,$input,$output,$ch);

	}	
	public function createFcSubmit(){
		$desc = $this->input->post('desc', TRUE);
		$input = $this->input->post('input', TRUE);
		$output = $this->input->post('output', TRUE);
		$code = $this->input->post('code');
		$ch = $this->input->post('ch', TRUE);
		$this->load->model("site/Fc");
		$this->Fc->add($desc,$input,$output,$code,$ch);

	}	



}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
