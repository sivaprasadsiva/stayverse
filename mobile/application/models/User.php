<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class User extends CI_model
{
 
  function homestay_view(){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get('homestay h')->result_array();

  }
   function homestay_view1(){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get('homestay h')->result_array();

  }
  
  function homestay_view_id($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('homestay h',['h.id'=>$id])->result_array();
  }
  function homestay_view_location($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('homestay h',['h.location'=>$id])->result_array();
  }
  function homestay_view_location_state($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('homestay h',['s.id'=>$id])->result_array();
  }
 
  
  function gallery_view($id){
    return $this->db->get_where('homestay_gallery',['homestay_id'=>$id])->result_array();
  }
 function gallery_view_limit($id){
      $this->db->limit(2);
    return $this->db->get_where('homestay_gallery',['homestay_id'=>$id])->result_array();
  }
  function roomtype_id($id){

    return $this->db->get_where('roomtype',['id'=>$id])->result_array();
  }
 
  function roomtype_view(){
    return $this->db->get('roomtype')->result_array();

  }
 
  function category_id($id){

    return $this->db->get_where('category',['id'=>$id])->result_array();
  }
  
  function category_view(){
    return $this->db->get('category')->result_array();

  }
 
  function location_id($id){
    $this->db->select('*,l.id as lid,s.id as sid,d.id as did');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('location l',['l.id'=>$id])->result_array();
  }
  
  function location_view(){
    $this->db->select('*,l.id as lid,s.id as sid,d.id as did');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get('location l')->result_array();

  }
 
  function guestlove_id($id){

    return $this->db->get_where('guestlove',['id'=>$id])->result_array();
  }
  
  function guestlove_view(){
    return $this->db->get('guestlove')->result_array();

  }
  
  
   function pricerange_id($id){

    return $this->db->get_where('pricerange',['id'=>$id])->result_array();
  }
  
  function pricerange_view(){
    return $this->db->get('pricerange')->result_array();

  }
  
   function homerules_id($id){

    return $this->db->get_where('homerules',['id'=>$id])->result_array();
  }
  
  function homerules_view(){
    return $this->db->get('homerules')->result_array();

  }
 
  function homestay_roomtype_view(){
    $this->db->select('*,rt.id as rtid');
    $this->db->join('roomtype rt','rt.id = hrt.roomtype');
    return $this->db->get('homestay_roomtype hrt')->result_array();
  }
  function homestay_category_view(){
    $this->db->select('*');
    $this->db->join('category c','c.id = hc.category');
    return $this->db->get('homestay_category hc')->result_array();
  }
  function homestay_rules_view(){
    $this->db->select('*');
    $this->db->join('homerules hr','hr.id = hrs.rules');
    return $this->db->get('homestay_rules hrs')->result_array();
  }
   function homestay_rules_view_id($id){
    $this->db->join('homerules hr','hr.id = h.rules');
    return $this->db->get('homestay_rules h')->result_array();
  }
  function homestay_services_view(){
    $this->db->select('*');
    $this->db->join('guestlove g','g.id = hss.services');
    return $this->db->get('homestay_services hss')->result_array();
  }
 
  function rooms_view($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,r.id as rid,rt.id as rtid');
    $this->db->join('homestay h','h.id = r.homestay_id');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get_where('rooms r',['r.homestay_id'=>$id])->result_array();
  }
  function rooms(){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,r.id as rid');
    $this->db->join('homestay h','h.id = r.homestay_id');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get('rooms r')->result_array();
  }
  function rooms_view_id($id){
    
    return $this->db->get_where('rooms',['id'=>$id])->result_array();
  }

  function events_view(){
    return $this->db->get('events')->result_array();
  }
  function events_view_id($id){
    return $this->db->get_where('events',['id'=>$id])->result_array();
  }
 
  function state_view(){
    return $this->db->get('state')->result_array();
  }
  function state_view_id($id){
    return $this->db->get_where('state',['id'=>$id])->result_array();
  }
 
  function district_view(){
    $this->db->select('*,d.id as did,s.id as sid');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('district d')->result_array();
  }
  function district_view_id($id){
    return $this->db->get_where('district',['id'=>$id])->result_array();
  }
  function district_ajax($state){
    return $this->db->get_where('district',['state_id' => $state])->result_array();
  }
  function location_ajax($district){
    return $this->db->get_where('location',['district_id' => $district])->result_array();
  }
  function rooms_type_view($id){
    $this->db->select('rt.roomtype,rt.id as rid');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('roomtype rt','rt.id = hrt.roomtype');
    $this->db->group_by('roomtype');
    return $this->db->get_where('homestay h',['h.id'=>$id])->result_array();
  }
  function location_search($search){
    if($search != ''){
    $this->db->select('*,l.id as lid');
    $this->db->from('location l');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->like('location',$search);
    $this->db->or_like('district',$search);
    $this->db->or_like('state',$search);
    return $this->db->get()->result_array();
    }
         
  }
  function userLogin($data){
    return $this->db->insert('user_login',$data);
  }
  function wonderland(){
    return $this->db->get('wonderland')->result_array();
  }
}
?>