<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class Admin extends CI_model
{
  function check($uname, $pass)
  {
    $this->db->select('*');
    $this->db->where('uname', $uname);
    $this->db->where('password', $pass);

    $row = $this->db->get('admin');
    if ($row->num_rows() == 1) {
      return $row->row();
    } else {
      return false;
    }
  }
 
  function homestay($data){
    return $this->db->insert('homestay',$data);

  }
  function homestay_view(){
    $this->db->select('*,l.id as lid, h.id as hid');
    $this->db->join('location l','l.id = h.location');
    return $this->db->get('homestay h')->result_array();

  }
  function delete_homestay($id){
    return $this->db->delete('homestay',['id'=>$id]);
  }
  function homestay_view_id($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('homestay h',['h.id'=>$id])->result_array();
  }
  function update_homestay($data,$id){
  $this->db->select('*,l.id as lid, h.id as hid');
    $this->db->join('location l','l.id = h.location');
    return $this->db->update('homestay',$data,['id'=>$id]);
  }
  function gallery($data){
    return $this->db->insert('homestay_gallery',$data);
  }
  function gallery_view($id){
    return $this->db->get_where('homestay_gallery',['homestay_id'=>$id])->result_array();
  }
  function delete_gallery($id){
    return $this->db->delete('homestay_gallery',['id'=>$id]);
  }
  function roomtype_id($id){

    return $this->db->get_where('roomtype',['id'=>$id])->result_array();
  }
  function roomtype($data){
    return $this->db->insert('roomtype',$data);

  }
  function roomtype_view(){
    return $this->db->get('roomtype')->result_array();

  }
  function update_roomtype($data,$id){

    return $this->db->update('roomtype',$data,['id'=>$id]);
  }
  function delete_roomtype($id){
    return $this->db->delete('roomtype',['id'=>$id]);
  }
  function category_id($id){

    return $this->db->get_where('category',['id'=>$id])->result_array();
  }
  function category($data){
    return $this->db->insert('category',$data);

  }
  function category_view(){
    return $this->db->get('category')->result_array();

  }
  function update_category($data,$id){

    return $this->db->update('category',$data,['id'=>$id]);
  }
  function delete_category($id){
    return $this->db->delete('category',['id'=>$id]);
  }
  function location_id($id){
    $this->db->select('*,l.id as lid,s.id as sid,d.id as did');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get_where('location l',['l.id'=>$id])->result_array();
  }
  function location($data){
    return $this->db->insert('location',$data);

  }
  function location_view(){
    $this->db->select('*,l.id as lid,s.id as sid,d.id as did');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->get('location l')->result_array();

  }
  function update_location($data,$id){
    $this->db->select('*,l.id as lid,s.id as sid,d.id as did');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    return $this->db->update('location l',$data,['id'=>$id]);
  }
  function delete_location($id){
    return $this->db->delete('location',['id'=>$id]);
  }
  function guestlove_id($id){

    return $this->db->get_where('guestlove',['id'=>$id])->result_array();
  }
  function guestlove($data){
    return $this->db->insert('guestlove',$data);

  }
  function guestlove_view(){
    return $this->db->get('guestlove')->result_array();

  }
  function update_guestlove($data,$id){

    return $this->db->update('guestlove',$data,['id'=>$id]);
  }
  function delete_guestlove($id){
    return $this->db->delete('guestlove',['id'=>$id]);
  }
   function pricerange_id($id){

    return $this->db->get_where('pricerange',['id'=>$id])->result_array();
  }
  function pricerange($data){
    return $this->db->insert('pricerange',$data);

  }
  function pricerange_view(){
    return $this->db->get('pricerange')->result_array();

  }
  function update_pricerange($data,$id){

    return $this->db->update('pricerange',$data,['id'=>$id]);
  }
  function delete_pricerange($id){
    return $this->db->delete('pricerange',['id'=>$id]);
  }
   function homerules_id($id){

    return $this->db->get_where('homerules',['id'=>$id])->result_array();
  }
  function homerules($data){
    return $this->db->insert('homerules',$data);

  }
  function homerules_view(){
    return $this->db->get('homerules')->result_array();

  }
  function update_homerules($data,$id){

    return $this->db->update('homerules',$data,['id'=>$id]);
  }
  function delete_homerules($id){
    return $this->db->delete('homerules',['id'=>$id]);
  }
  function homestay_lastid(){
    return $this->db->insert_id('homestay');
  }
  function homestay_category($data){
    return $this->db->insert('homestay_category',$data);

  }
  function homestay_roomtype($data){
    return $this->db->insert('homestay_roomtype',$data);

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
  function rooms($data){
    return $this->db->insert('rooms',$data);
  }
  function update_rooms($data,$id){
    return $this->db->update('rooms',$data,['id'=>$id]);
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
  function delete_rooms($id){
    return $this->db->delete('rooms',['id'=>$id]);
  }
  function events($data){
    return $this->db->insert('events',$data);
  }
  function update_events($data,$id){
    return $this->db->update('events',$data,['id'=>$id]);
  }
  function events_view(){
    return $this->db->get('events')->result_array();
  }
  function events_view_id($id){
    return $this->db->get_where('events',['id'=>$id])->result_array();
  }
  function delete_events($id){
    return $this->db->delete('events',['id'=>$id]);
  }
  function delete_state($id){
    return $this->db->delete('state',['id'=>$id]);
  }
  function state($data){
    return $this->db->insert('state',$data);
  }
  function update_state($data,$id){
    return $this->db->update('state',$data,['id'=>$id]);
  }
  function state_view(){
    return $this->db->get('state')->result_array();
  }
  function state_view_id($id){
    return $this->db->get_where('state',['id'=>$id])->result_array();
  }
  function delete_district($id){
    return $this->db->delete('district',['id'=>$id]);
  }
  function district($data){
    return $this->db->insert('district',$data);
  }
  function update_district($data,$id){
    return $this->db->update('district',$data,['id'=>$id]);
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
  function homestay_services($data){
    return $this->db->insert('homestay_services',$data);
  }
  function homestay_rules($data){
    return $this->db->insert('homestay_rules',$data);
  }
  function homestay_rules_view(){
    $this->db->select('*');
    $this->db->join('homerules hr','hr.id = hrs.rules');
    return $this->db->get('homestay_rules hrs')->result_array();
  }
  function homestay_services_view(){
    $this->db->select('*');
    $this->db->join('guestlove g','g.id = hss.services');
    return $this->db->get('homestay_services hss')->result_array();
  }
  function update_wonderland($data,$id){
    return $this->db->update('wonderland',$data,['id'=>$id]);
  }
  function wonderland_view(){
    return $this->db->get('wonderland')->result_array();
  }
  function wonderland_view_id($id){
    return $this->db->get_where('wonderland',['id'=>$id])->result_array();
  }
  function delete_wonderland($id){
    return $this->db->delete('wonderland',['id'=>$id]);
  }
  function wonderland($data){
    return $this->db->insert('wonderland',$data);
  }
  function booking_view(){
    return $this->db->select('*,b.id as bid,b.status as bstatus,h.name as homestay_name')
                    ->join('homestay h','h.id = b.homestay_id')
                    ->order_by('b.id','desc')
                    ->get('booking b')->result_array();
  }
  function booking_rooms_view(){
    $this->db->select('*,b.id as bid');
    $this->db->join('rooms r','r.id = b.room_id');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get('book_room b')->result_array();
  }
  
  function food_category($data){
    return $this->db->insert('food_category',$data);
  }
  function food_category_view(){
    return $this->db->get('food_category')->result_array();
  }
  function delete_food_category($id){
    return $this->db->delete('food_category',['id'=>$id]);
  }
  function food_category_id($id){
    return $this->db->get_where('food_category',['id'=>$id])->result_array();
  }
  function food_category_update($data,$id){
    return $this->db->update('food_category',$data,['id'=>$id]);
  }

  function food($data){
    return $this->db->insert('food',$data);
  }
  function food_update($data,$id){
    return $this->db->update('food',$data,['id'=>$id]);
  }
  function food_id($id){
    $this->db->select('*,fc.id as fcid,f.id as fid');
    $this->db->join('food_category fc','fc.id = f.food_category_id');
    return $this->db->get_where('food f',['f.id'=>$id])->result_array();
  }
  function food_view(){
     $this->db->select('*,fc.id as fcid,f.id as fid');
    $this->db->join('food_category fc','fc.id = f.food_category_id');
    return $this->db->get('food f')->result_array();
  }
  function food_delete($id){
    return $this->db->delete('food',['id'=>$id]);
  }
  function slider($data){
    return $this->db->insert('slider',$data);
  }
  function slider1_view(){
    return $this->db->get_where('slider',['status'=>1])->result_array();
  }
  function slider2_view(){
    return $this->db->get_where('slider',['status'=>2])->result_array();
  }
  function delete_slider($id){
      return $this->db->delete('slider',['id'=>$id]);
  }
  function coupon($data){
    return $this->db->insert('coupon',$data);
  }
  function coupon_update($data,$id){
    return $this->db->update('coupon',$data,['id'=>$id]);
  }
  function coupon_id($id){
    return $this->db->get_where('coupon',['id'=>$id])->result_array();
  }
  function coupon_view(){
    return $this->db->get('coupon')->result_array();
  }
  function coupon_delete($id){
    return $this->db->delete('coupon',['id'=>$id]);
  }
  function contact(){
    $this->db->order_by('id','desc');
    return $this->db->get('contact')->result_array();
  }
  function delete_contact($id){
    return $this->db->delete('contact',['id'=>$id]);
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