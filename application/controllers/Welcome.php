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

class Welcome extends CI_Controller {
  public function __construct()
       {
            parent::__construct();
            // Add your models here

       }
	
	public function index()
	{
	
	$this->siteTest();
	$this->gammingTest();
	}
	public function gammingTest()
	{
            $this->load->model('gamming/Challenges');
            $this->load->model('gamming/Competition');
            $this->load->model('gamming/Levels');
            $this->load->model('gamming/Path');
            $this->load->model('gamming/Player');
            $this->load->model('gamming/Rewards');
            $this->load->model('gamming/World');
	}	
	public function siteTest()
	{
            $this->load->model('site/Course');
            $this->load->model('site/Rank');
            $this->load->model('site/Stats');
            $this->load->model('site/User');
            $this->load->model('site/Marvel');
	}
	public function testWorld(){

            $this->load->model('gamming/World');
		$this->World->add("Test");
		print_r($this->World->getAll());
		print_r($this->World->getById(1));
	}
	public function testPath(){
            $this->load->model('gamming/Path');
		$this->Path->add("Test");
		print_r($this->Path->getAll());
		print_r($this->Path->getById(1));
		print_r($this->Path->setWorld(1,1));
	}	

	public function testLevels(){
            $this->load->model('gamming/Levels');
		$this->Levels->add("Test","Desc");
		print_r($this->Levels->getAll());
		print_r($this->Levels->getById(1));
		print_r($this->Levels->setPath(1,1));
	}
	public function testChallenges(){
            $this->load->model('gamming/Challenges');
		$this->Challenges->add("Test","Desc","simple");
		print_r($this->Challenges->getAll());
		print_r($this->Challenges->getById(1));
		print_r($this->Challenges->setLevel(1,1));
		print_r($this->Challenges->setReward(1,1));
	}	

}

/* End of file welcome.php */
/* Location: ./application/controllers/Welcome.php */
