<?php
class Path extends CI_Model {

    var $title   = '';
    var $world   = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  function add($t){
        $this->db->insert('Path', Array('title' =>$t));
	return  $this->db->insert_id();
   }
   function getAll(){
        return $this->db->get('Path')->result_array();
   }
   function getById($id){
        return $this->db->get_where('Path',Array('id' => $id))->result_array();
   }
  function setWorld($id,$world){
	$data = Array(
			'world'=>$world
		);
	$this->db->where('id', $id);
	$this->db->update('Path', $data); 
  }

}
