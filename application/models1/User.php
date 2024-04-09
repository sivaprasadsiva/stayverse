<?php
if (!defined('BASEPATH'))
  exit('No direct script access allowed');
class User extends CI_model
{
 function login_user($uname,$pass){
  return $this->db->get_where('user_login',['email'=>$uname,'password'=>$pass])->row();
 }
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
  function homestay_view_location($id,$limit,$offset){
    
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    $this->db->limit($limit,$offset);
    return $this->db->get_where('homestay h',['h.location'=>$id])->result_array();
  }
  function homestay_view_location_state($id,$limit,$offset){
    
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    $this->db->limit($limit,$offset);
    return $this->db->get_where('homestay h',['s.id'=>$id])->result_array();
  }

 

  function homestay_view_location1($id){
    
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    return $this->db->get_where('homestay h',['h.location'=>$id])->result_array();
  }
  function homestay_view_location_state1($id){
    
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    return $this->db->get_where('homestay h',['s.id'=>$id])->result_array();
  }
 
  function getTotalRows_state($id){
    
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    return $this->db->get_where('homestay h',['s.id'=>$id])->num_rows();
  }
  function getTotalRows_location($id){
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,hc.id as hcid,c.id as cid,hrt.id as hrtid,hs.id as hsid,hr.id as hrid,r.id as rid,MIN(r.offerprice) as offer');
    $this->db->join('location l','l.id = h.location');
    $this->db->join('district d','d.id = l.district_id');
    $this->db->join('state s','s.id = d.state_id');
    $this->db->join('homestay_category hc','hc.homestay_id = h.id');
    $this->db->join('category c','c.id = hc.category');
    $this->db->join('homestay_roomtype hrt','hrt.homestay_id = h.id');
    $this->db->join('homestay_services hs','hs.homestay_id = h.id');
    $this->db->join('homestay_rules hr','hr.homestay_id = h.id');
    $this->db->join('rooms r','r.homestay_id = h.id');
    $this->db->group_by('h.id');
    return $this->db->get_where('homestay h',['h.location'=>$id])->num_rows();
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

    return $this->db->get_where('pricerange',['id'=>$id])->row();
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
  function homestay_roomtype_view_id(){
    $this->db->select('*,rt.id as rtid');
    $this->db->join('roomtype rt','rt.id = hrt.roomtype');
    $this->db->group_by('rt.roomtype');
    return $this->db->get_where('homestay_roomtype hrt')->result_array();
  }
  function homestay_category_view(){
    $this->db->select('*');
    $this->db->join('category c','c.id = hc.category');
    return $this->db->get('homestay_category hc')->result_array();
  }

  function homestay_category_view_id(){
    $this->db->select('*');
    $this->db->join('category c','c.id = hc.category');
    $this->db->group_by('c.category');
    return $this->db->get_where('homestay_category hc')->result_array();
  }
  function homestay_rules_view(){
    $this->db->select('*');
    $this->db->join('homerules hr','hr.id = hrs.rules');
    return $this->db->get('homestay_rules hrs')->result_array();
  }
   function homestay_rules_view_id_all(){
    $this->db->join('homerules hr','hr.id = h.rules');
    $this->db->group_by('hr.homerules');
    return $this->db->get_where('homestay_rules h')->result_array();
  }
   function homestay_rules_view_id($id){
    $this->db->join('homerules hr','hr.id = h.rules');
    $this->db->group_by('hr.homerules');
    return $this->db->get_where('homestay_rules h',['h.id'=>$id])->result_array();
  }
  function homestay_services_view(){
    $this->db->select('*');
    $this->db->join('guestlove g','g.id = hss.services');
    return $this->db->get('homestay_services hss')->result_array();
  }
  function homestay_services_view_id(){
    $this->db->join('guestlove g','g.id = hss.services');
    $this->db->group_by('services');
    return $this->db->get_where('homestay_services hss')->result_array();
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
    $this->db->select('*,l.id as lid, h.id as hid,s.id as sid,d.id as did,r.id as rid,MIN(offerprice)');
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
  function wonderland_view_id($id){
    return $this->db->get_where('wonderland',['id'=>$id])->result_array();
  }
  function pricerange_id_filter($data){
    $query = " SELECT MIN(starting_price),MAX(ending_price) FROM pricerange WHERE id IN(".$data.") ";
    $data = $this->db->query($query);
    return $data->result_array();
  }


  function filter_view($category,$roomtype,$services,$price,$rules){

    $query = "

    SELECT r.*,r.id as rid,s.*,d.*,l.*,h.*,c.*,hc.*,hrt.*,hs.*,hr.*,h.id as hid , c.id as cid , hc.id as hcid , hrt.id as hrtid, hs.id as hsid , hr.id as hrid ,h.photo as hphoto ,MIN(r.offerprice) as offer FROM homestay h inner join homestay_category hc on hc.homestay_id = h.id inner join category c on c.id = hc.category  inner join homestay_roomtype hrt on hrt.homestay_id = h.id inner join homestay_services hs on hs.homestay_id = h.id inner join homestay_rules hr on hr.homestay_id = h.id inner join location l on l.id = h.location inner join district d on d.id = l.district_id inner join state s on s.id = d.state_id inner join rooms r on r.homestay_id = h.id WHERE h.name != '' ";

    if(isset($price)){
      $price_filter = implode(',',$price);
     $data = $this->pricerange_id_filter($price_filter);
     foreach ($data as $d){
      $start = $d['MIN(starting_price)'];
      $end   = $d['MAX(ending_price)'];
     }
     
      $query .= "AND r.offerprice BETWEEN $start AND $end";
    }

    if(isset($category)){
      $category_filter = implode(',',$category);
      $query .= "
      AND hc.category IN(".$category_filter.")";
    }
    if(isset($roomtype)){
      $roomtype_filter = implode(',',$roomtype);
      $query .= "
      AND r.roomtype_id IN(".$roomtype_filter.")";
    }
    if(isset($services)){
      $services_filter = implode(',',$services);
      $query .= "
      AND hs.services IN(".$services_filter.")";
    }
    if(isset($rules)){
      $rule_filter = implode(',',$rules);
      $query .= "
      AND hr.rules IN(".$rule_filter.")";
    }
    return $query;

  }
  function getTotalRows_location_filter($location,$category,$roomtype,$services,$price,$rules){
    $query = $this->filter_view($category,$roomtype,$services,$price,$rules);
    $query .= ' AND h.location ='.$location .' GROUP BY h.id';
    $data = $this->db->query($query);
    return $data->num_rows();
  }
  function filter_data_location($location,$limit,$page,$category,$roomtype,$services,$price,$rules){
    $query = $this->filter_view($category,$roomtype,$services,$price,$rules);
    $query .= ' AND h.location ='.$location.' GROUP BY h.id LIMIT '.$page.' , '.$limit;
    $data = $this->db->query($query);
    return $data->result_array();
  }
  function filter_data_state($location,$limit,$page,$category,$roomtype,$services,$price,$rules){
    $query = $this->filter_view($category,$roomtype,$services,$price,$rules);
    $query .= ' AND s.id ='.$location.' GROUP BY h.id LIMIT '.$page.' , '.$limit;
    $data = $this->db->query($query);
    return $data->result_array();
  }
  function getTotalRows_state_filter($location,$category,$roomtype,$services,$price,$rules){
    
    $query = $this->filter_view($category,$roomtype,$services,$price,$rules);
    $query .= ' AND s.id ='.$location.' GROUP BY h.id';
    $data = $this->db->query($query);
    return $data->num_rows();
  }

  function booking($data){
     $this->db->insert('booking',$data);
     return $this->db->insert_id(); 
  }
  function book_room($data){
    return $this->db->insert('book_room',$data);
  }
  function booking_view_id($id){
    $this->db->select('*,b.id as bid,b.status as bstatus');
    $this->db->join('homestay h','h.id = b.homestay_id');
    $this->db->order_by('b.id','desc');
    return $this->db->get_where('booking b',['user_id'=>$id])->result_array();
  }
  function vehicle_booking_view_id($id){
    return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid,l.location as loc')
                    ->join('vehicle v','v.id = b.vehicle_id')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->join('location l','l.id = b.location')
                    ->order_by('b.id','desc')
                    ->get_where('vehicle_booking b',['b.user_id'=>$id])->result_array();
  }
  function booking_rooms_view(){
    $this->db->select('*,b.id as bid');
    $this->db->join('rooms r','r.id = b.room_id');
    $this->db->join('roomtype rt','rt.id = r.roomtype_id');
    return $this->db->get('book_room b')->result_array();
  }
  function vehicle_view_id($id){
    return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('v.id',$id)
                    ->get('vehicle v')->result_array();
  }
  function vehicle_booking($data){
    $this->db->insert('vehicle_booking',$data);
     return $this->db->insert_id();
  }
  function cars($limit,$offset){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','car')
                    ->or_where('vt.type','cars')
                    ->limit($limit,$offset)
                    ->get('vehicle v')->result_array();
  }
  function bike($limit,$offset){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','bike')
                    ->or_where('vt.type','bikes')
                    ->limit($limit,$offset)
                    ->get('vehicle v')->result_array();
  }
  function getTotalRows_cars(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','car')
                    ->or_where('vt.type','cars')
                    ->get('vehicle v')->num_rows();
  }
  function getTotalRows_bike(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','bike')
                    ->or_where('vt.type','bikes')
                    ->get('vehicle v')->num_rows();
  }

  function company_car(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','cars')
                    ->or_where('vt.type','car')
                    ->get('vehicle_model vm')->result_array();
  }
  function cars_all(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','car')
                    ->or_where('vt.type','cars')
                    ->group_by('v.vehicle_name')
                    ->get('vehicle v')->result_array();
  }
  function company_bike(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','bike')
                    ->or_where('vt.type','bikes')
                    ->get('vehicle_model vm')->result_array();
  }
   function bikes_all(){
    
   return $this->db->select('*,vm.id as mid,vt.id as tid,v.id as vid')
                    ->join('vehicle_model vm','vm.id = v.model_id')
                    ->join('vehicle_type vt','vt.id = vm.type_id')
                    ->where('vt.type','bike')
                    ->or_where('vt.type','bikes')
                    ->group_by('v.vehicle_name')
                    ->get('vehicle v')->result_array();
  }
  function filter_vehicle($company,$vehicle){
    $query = "SELECT *,v.vehicle_image as image,vm.id as mid FROM vehicle v inner join vehicle_model vm on vm.id = v.model_id inner join vehicle_type vt on vt.id = vm.type_id WHERE vt.id != ''";

    if(isset($company)){
      $company_filter = implode(',',$company);
      $query .=" AND vm.id IN($company_filter) ";
    }
    if(isset($vehicle)){
      $vehicle_filter = implode('\',\'',$vehicle);
      $vehicle = "'". $vehicle_filter ."'";
      $query .=" AND v.vehicle_name IN($vehicle)";
    }
    return $query;
    

  }
  function filter_cars($limit,$start,$company,$car){
    $query = $this->filter_vehicle($company,$car);
    $query .="AND (vt.type = 'cars' OR vt.type = 'car' ) LIMIT $start , $limit ";
    $data = $this->db->query($query);
    return $data->result_array();
  }
  function getTotalRows_car($company,$car){
    $query = $this->filter_vehicle($company,$car);
    $query .="AND (vt.type = 'cars' OR vt.type = 'car' )";
    $data = $this->db->query($query);
    return $data->num_rows();
  }
   function filter_bike($limit,$start,$company,$bike){
    $query = $this->filter_vehicle($company,$bike);
    $query .="AND (vt.type = 'bikes' OR vt.type = 'bike' ) LIMIT $start , $limit ";
    $data = $this->db->query($query);
    return $data->result_array();
  }
  function getTotalRows_bikes($company,$bike){
    $query = $this->filter_vehicle($company,$bike);
    $query .="AND (vt.type = 'bikes' OR vt.type = 'bike' )";
    $data = $this->db->query($query);
    return $data->num_rows();
  }
  function slider(){
    return $this->db->get('slider')->result_array();
  }
  function review($data){
    return $this->db->insert('review',$data);
  }
  function review_view($id){
    $this->db->order_by('id','desc');
    $this->db->limit(3,0);
    return $this->db->get_where('review',['homestay_id'=>$id])->result_array();
  }
  function review_count($id){
    return $this->db->get_where('review',['homestay_id'=>$id])->num_rows();
  }
  function allreview($id){
    $this->db->order_by('id','desc');
    return $this->db->get_where('review',['homestay_id'=>$id])->result_array();
  }
  function coupon($code){
    return $this->db->get_where('coupon',['code'=>$code])->result_array();
  }
  function contact($data){
    return $this->db->insert('contact',$data);
  }
  function user_view($id){
    return $this->db->get_where('user_login',['id'=>$id])->result_array();
  }
  function passwordCheck($id,$password){
    return $this->db->get_where('user_login',['id'=>$id,'password'=>$password])->result_array();
  }
  function user_update($data,$id){
    return $this->db->update('user_login',$data,['id'=>$id]);
  }
  function email_duplicate($email){
    return $this->db->get_where('user_login',['email'=>$email])->result_array();
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
