<?php
class User extends CI_Model {

    var $email   = '';
    var $password = '';
    var $player = 0;
    

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($email,$name,$fbid){
	$r= $this->getbyEmail($email);
	if(count($r)<1){ 	
	  $this->db->insert('Player', Array('name' =>$name,'img'=>"https://graph.facebook.com/".$fbid."/picture?type=large",'icon'=>"https://graph.facebook.com/".$fbid."/picture?type=small"));
        $player=  $this->db->insert_id();
	  $this->db->insert('User', Array('email' =>$email,'player'=>$player));
        return  $player;
	}else{
	return $r[0]['player'];	

	}


   }    
  function getbyEmail($email){
	 return $this->db->get_where('User',Array('email' => $email))->result_array();
	}

}
