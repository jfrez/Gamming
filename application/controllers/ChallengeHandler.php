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

class ChallengeHandler extends CI_Controller {
  public function __construct()
       {
            parent::__construct();
            // Add your models here
 $this->load->driver('session');

       }
	
	public function index()
	{
		$this->load->model("gamming/World");
	        $tree = $this->World->getFullTree(4); 
		$this->load->view('index',Array('tree'=>$tree));	
	}
	public function MC($id)
	{
		$this->load->model("gamming/Challenges");
		$this->load->model("site/Mc");
		$ch = $this->Challenges->getById($id);	
		$choices = $this->Mc->getByNumber($id);
		
		$this->load->view('Mc',Array('challenge'=>$ch[0] , 'choices'=>$choices));	
	}
	public function MCanswer($id){
		 $challenge = $this->input->post('ch', TRUE);
		 $choice = $this->input->post('choice', TRUE);
		$this->load->model("site/Mc");
		$this->load->model("gamming/Player");
		$this->load->model("gamming/Challenges");
		$this->load->model("gamming/Rewards");
		if( $this->Mc->isvalid($challenge,$choice)){
			$ch = $this->Challenges->getById($challenge);
			 $player = $this->session->userdata('player');
                         $this->Player->passChallenge($player, $challenge,$ch[0]['Reward']);
			$reward = $this->Rewards->getById($ch[0]['Reward']);
			$this->load->view("correct",Array('reward'=>$reward[0]));
		}else{
			$this->load->view("wrong");
		}
	}
	public function FC($id)
	{
		$this->load->model("gamming/Challenges");
		$this->load->model("site/Fc");
		$ch = $this->Challenges->getById($id);
		$fc = $this->Fc->getByChallenge($id);		
		$this->load->view('Fc',Array('challenge'=>$ch[0],'Fc'=>$fc[0]));	
	}
	public function CT($id)
	{
		$this->load->model("gamming/Challenges");
		$this->load->model("site/Ct");
		$ch = $this->Challenges->getById($id);
		$ct = $this->Ct->getByChallenge($id);		
		$this->load->view('Ct',Array('challenge'=>$ch[0],'ct'=>$ct[0]));	
	}

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
