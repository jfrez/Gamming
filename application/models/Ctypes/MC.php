<?php
class MC extends CI_Model {

var $number = 0;
var $choice = "";
var $valid=0;
    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($n,$c,$v){
        $this->db->insert('MC', Array('number' =>$n,'choice'=>$c,'valid'=>$valid));
	return  $this->db->insert_id();
   }
   function getByNumber($number){
        return $this->db->get_where('MC',Array('number' => $number))->result_array();
   }
   function getById($id){
        return $this->db->get_where('MC',Array('id' => $id))->result_array();
   }
  function isvalid($id){
        return $this->db->get_where('MC',Array('id' => $id))->result_array()[0]['valid'];
  }
  function printForm($number){
	$r = $this->getByNumber($number);
	foreach ($query->result_array() as $row)
	{
		echo '<input type="radio" name="MC'.$number.'" value="'.$row['id'].'">'.$row['choice'].'<br>';
	}

   } 

}
