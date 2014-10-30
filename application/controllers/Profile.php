<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Profile extends CI_Controller {

	public function __construct(){
		parent::__construct();

        // To use site_url and redirect on this controller.
        $this->load->helper('url');
	 $this->load->driver('session');

	}

	public function login(){

		$this->load->library('facebook'); // Automatically picks appId and secret from config
        // OR
        // You can pass different one like this
        //$this->load->library('facebook', array(
        //    'appId' => 'APP_ID',
        //    'secret' => 'SECRET',
        //    ));

		$user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me');
	$this->load->model("site/User");
	$player = $this->User->add($data['user_profile']['email'],$data['user_profile']['name'],$data['user_profile']['id']);
	$this->session->set_userdata(Array('player'=>$player));
	$this->session->set_userdata(Array('fb'=>$data['user_profile']));

            } catch (FacebookApiException $e) {
                $user = null;
            }
        }else {
            $this->facebook->destroySession();
        }

        if ($user) {

            $data['logout_url'] = site_url('profile/logout'); // Logs off application
        redirect('Main/index');
            // OR 
            // Logs off FB!
            // $data['logout_url'] = $this->facebook->getLogoutUrl();

        } else {
            $data['login_url'] = $this->facebook->getLoginUrl(array(
                'redirect_uri' => site_url('profile/login'), 
                'scope' => array("email") // permissions here
            ));
        }
        $this->load->view('login',$data);

	}

    public function logout(){

	$this->session->sess_destroy();
        $this->load->library('facebook');

        // Logs off session from website
        $this->facebook->destroySession();
        // Make sure you destory website session as well.

        redirect('main/index');
    }

}

