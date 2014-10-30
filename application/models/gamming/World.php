<?php
class World extends CI_Model {

    var $title   = '';
    var $createDate    = '12/12/2012';
    var $valid   = 0;

    function __construct()
    {
        // Call the Model constructor
        parent::__construct();
    }
   function add($t){
	$this->db->insert('World', Array('title' =>$t, 'valid'=>0));
	return  $this->db->insert_id();
   }
   function getAll(){
	return $this->db->get('World')->result_array();
   }
   function getById($id){
	return $this->db->get_where('World',Array('id' => $id))->result_array();
   }
   function setStatus($id,$status){
        $data = Array(
                        'valid'=>$status
                );
        $this->db->where('id', $id);
        $this->db->update('World', $data);
  }
  function getFullTree($id){

    $rs =  $this->db->query('Select World.title as tw, World.id as wid, Path.title as tp, Path.id as pid, Levels.title as tl, Levels.id as lid, Challenges.title as tc, Challenges.id as cid , Challenges.type as ctype from World,Path, Levels, Challenges where World.id = Path.world and Path.id = Levels.path and Levels.id = Challenges.level and World.id = '.$id.'')->result_array();
$tree = Array();
	foreach($rs as $ch){
		if(!isset($tree[$ch['wid']])){
		$tree[$ch['wid']] = Array();
		$tree[$ch['wid']]['title'] = $ch['tw'];
		}
		 if(!isset($tree[$ch['wid']][$ch['pid']]            )){
                $tree[$ch['wid']][$ch['pid']] = Array();
                $tree[$ch['wid']][$ch['pid']]['title'] = $ch['tp'];
                }

		if(!isset($tree[$ch['wid']][$ch['pid']][$ch['lid']]             )){
                $tree[$ch['wid']][$ch['pid']][$ch['lid']]  = Array();
                $tree[$ch['wid']][$ch['pid']][$ch['lid']]['title']  = $ch['tl'];
                }
		 if(!isset($tree[$ch['wid']][$ch['pid']][$ch['lid']][$ch['cid']]             )){
                $tree[$ch['wid']][$ch['pid']][$ch['lid']][$ch['cid']]   = Array();
                $tree[$ch['wid']][$ch['pid']][$ch['lid']][$ch['cid']]['id']   = $ch['cid'];
                $tree[$ch['wid']][$ch['pid']][$ch['lid']][$ch['cid']]['title']   = $ch['tc'];
                $tree[$ch['wid']][$ch['pid']][$ch['lid']][$ch['cid']]['type']   = $ch['ctype'];
                }



	}
		return $tree;
	}
    

}
