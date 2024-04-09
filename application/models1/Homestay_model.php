<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class Homestay_model extends CI_model
{
  function check($uname, $pass)
  {
    $this->db->select('*');
    $this->db->where('email', $uname);
    $this->db->where('password', $pass);

    $row = $this->db->get('homestay');
    if ($row->num_rows() == 1) {
      return $row->row();
    } else {
      return false;
    }
  }
  function booking_view($id){
    return $this->db->select('*,b.id as bid,b.status as bstatus,u.phone as uphone')
                    ->join('user_login u','u.id = b.user_id','left')
                    ->join('homestay h','h.id = b.homestay_id')
                    ->order_by('b.id','desc')
                    ->get_where('booking b',['b.homestay_id'=>$id])->result_array();
  }
  function booking_rooms_view(){
    $this->db->select('*,b.id as bid');
    $this->db->join('rooms r','r.id = b.room_id');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get('book_room b')->result_array();
  }
  function rooms_view($id){
    $this->db->select('*,rt.id as rtid,r.id as rid');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get_where('rooms r',['r.homestay_id'=>$id])->result_array();
  }
  function rooms_view_id($id){
    $this->db->select('*,rt.id as rtid,r.id as rid');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get_where('rooms r',['r.id'=>$id])->result_array();
  }
  function delete_table($table,$cond){
    return $this->db->delete($table,$cond);
  }

  function insert_table($table,$data){
    return $this->db->insert($table,$data);
  }
  function update_table($table,$data,$cond){
    return $this->db->update($table,$data,$cond);
  }
  function fetch_all($query){
    return $this->db->query($query)->result_array();
  }
  function last_id($table){
    return $this->db->insert_id($table);
  }
  function fetch_table($table){
    return $this->db->get($table)->result_array();
  }
  function fetch_single($table,$cond){
    return $this->db->get_where($table,$cond)->result_array();
  }

}
?>