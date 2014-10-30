<?php
class Fc extends CI_Model {

var $desc = "";
var $ch = 0;
var $code = "";
var $input = "";
var $output= "";
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($d,$i,$o,$c,$challenge){
        $this->db->insert('Fc', Array('desc' =>$d,'input'=>$i,'output'=>$o,'code'=>$c,'ch'=>$challenge));
	return  $this->db->insert_id();

   }
   function getById($id){
        return $this->db->get_where('Fc',Array('id' => $id))->result_array();
   }
   function getByChallenge($id){
        return $this->db->get_where('Fc',Array('ch' => $id))->result_array();
   }


}
