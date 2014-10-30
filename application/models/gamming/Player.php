<?php
class Player extends CI_Model {

    var $name   = '';
    var $img = '';
    var $icon    = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
    
 function add($n,$img,$icon){
        $this->db->insert('Player', Array('name' =>$n,'img'=>$img,'icon'=>$icon));
        return  $this->db->insert_id();

   }
   function getAll(){
        return $this->db->get('Player')->result_array();
   }
   function getById($id){
        return $this->db->get_where('Player',Array('id' => $id))->result_array();
   }
   function passChallenge($player,$ch,$reward){
	try{
        $this->db->insert('PlayerChallenge', Array('player' =>$player,'ch'=>$ch));
        $this->db->insert('PlayerReward', Array('player' =>$player,'reward'=>$reward));
	}
	catch(Exception $e){ }
   }
   function getChallenges($id){
        $rs= $this->db->get_where('PlayerChallenge',Array('player' => $id))->result_array();
	$tree = Array();
        foreach($rs as $ch){
		$tree[$ch['ch']]=true;
	}
	return $tree;

   }
   function getRewards($id){
	return $this->db->query("Select Rewards.* from Rewards, PlayerReward where PlayerReward.player = $id and Rewards.id = PlayerReward.reward")->result_array();

   }

}
