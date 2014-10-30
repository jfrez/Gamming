<?php
class Ct extends CI_Model {
var $ch = 0;
var $desc = "";
var $input = "";
var $output= "";
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($d,$i,$o,$challenge){
        $this->db->insert('Ct', Array('desc' =>$d,'input'=>$i,'output'=>$o,'ch'=>$challenge));
	return  $this->db->insert_id();

   }
   function getById($id){
        return $this->db->get_where('Ct',Array('id' => $id))->result_array();
   }
   function getByChallenge($id){
        return $this->db->get_where('Ct',Array('ch' => $id))->result_array();
   }


}
