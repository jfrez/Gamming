<?php
class Levels extends CI_Model {

    var $title   = '';
    var $description = '';
    var $path = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
  function add($t,$d){
        $this->db->insert('Levels', Array('title' =>$t,'description'=>$d));
   }
   function getAll(){
        return $this->db->get('Levels')->result_array();
   }
   function getById($id){
        return $this->db->get_where('Levels',Array('id' => $id))->result_array();
   }
  function setPath($id,$path){
        $data = Array(
                        'path'=>$path
                );
        $this->db->where('id', $id);
        $this->db->update('Levels', $data);
  }
    

}
