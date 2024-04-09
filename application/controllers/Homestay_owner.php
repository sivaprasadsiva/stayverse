<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');
class Homestay_owner extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form'));
        $this->load->library(array('form_validation', 'session'));
        $this->load->model('homestay_model','admin');
    }

   function index(){
    if(isset($_POST['submit'])){
            $config = array(
                'allowed_types' => 'jpeg|png|jpg',
                'max_size'      => 3072,
                'upload_path'   => './assets/images/owner',
            );
            if(!file_exists($config['upload_path'])){
                mkdir('./assets/images/owner');
            }
            $this->load->library('upload',$config);
            if($this->upload->do_upload('voter_id')){
                $voter = $this->upload->data();
                $v      = $voter['file_name'];

                if($this->upload->do_upload('aadhar')){
                    $aadhar = $this->upload->data();
                    $a = $aadhar['file_name'];

                    if($this->upload->do_upload('license')){
                    $license = $this->upload->data();
                    $l = $license['file_name'];

                    $data = [

                        'name'             => $this->input->post('name'),
                        'age'              => $this->input->post('age'),
                        'phone'            => $this->input->post('phone'),
                        'homestay_license' => $l,
                        'aadharcard'       => $a,
                        'voter_id'         => $v,
                        'homestay_id'      => $_SESSION['homestay']['id'],
                        'created_at'       => date('d/m/Y h:i:s a'),
                    ];
                    $this->admin->insert_table('homestay_owner',$data);
                    redirect(base_url().'homestay_owner');
                }else{
                    echo $this->upload->display_errors();
                }
                }else{
                    echo $this->upload->display_errors();
                }
            }else{
                    echo $this->upload->display_errors();
                }
          

        }else{
            $data['role'] = $_SESSION['homestay']['name'];
            $data['title'] = 'Owner';
            $owner = $this->admin->fetch_single('homestay_owner',['homestay_id'=>$_SESSION['homestay']['id']]);
            $data['owner'] = $owner;
            if(!empty($owner)){
                $status = $owner[0]['approval']; 
                $data['approval'] = $status; 
                if($owner[0]['approval'] == 1) redirect(base_url().'homestay');
            }

            

            $this->load->view('homestay/header',$data);
            $this->load->view('homestay/sidebar');
            $this->load->view('homestay/owner_update');
            $this->load->view('homestay/footer');
        }
   }
   

}
?>