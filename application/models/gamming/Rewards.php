<?php
class Rewards extends CI_Model {

    var $title   = '';
    var $description   = '';
    var $icon   = '';
    var $image   = '';

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
 function add($t,$d,$icon,$img){
        $this->db->insert('Rewards', Array('title' =>$t,'description'=>$d,'icon'=>$icon,'image'=>$img));
   }
   function getAll(){
        return $this->db->get('Rewards')->result_array();
   }
   function getById($id){
        return $this->db->get_where('Rewards',Array('id' => $id))->result_array();
   }
    

}
