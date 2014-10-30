<?php
class Challenges extends CI_Model {

    var $title   = '';
    var $description = '';
    var $type = '';
    var $Reward = 0;
    var $level = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($t,$d,$ty){
        $this->db->insert('Challenges', Array('title' =>$t,'type'=>$ty));
	return  $this->db->insert_id();

   }
   function getAll(){
        return $this->db->get('Challenges')->result_array();
   }
   function getById($id){
        return $this->db->get_where('Challenges',Array('id' => $id))->result_array();
   }
  function setLevel($id,$level){
        $data = Array(
                        'level'=>$level
                );
        $this->db->where('id', $id);
        $this->db->update('Challenges', $data);
  }
  function setReward($id,$reward){
        $data = Array(
                        'Reward'=>$reward
                );
        $this->db->where('id', $id);
        $this->db->update('Challenges', $data);
  }
    

}
