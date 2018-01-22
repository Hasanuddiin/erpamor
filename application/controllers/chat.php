<?php  

class chat extends CI_Controller {
 
    var $limit=10;
    var $offset=10; 
    function index($limit='',$offset=''){
        $this->load->model("chat_model"); 
        $data['judul']='Selamat Datang';
        $data['view']='chat';
        $this->load->view('index',$data);
    }
    function retrieve(){
        $this->load->model("chat_model"); 
        $this->chat_model->retrieve();
    }
    function actchat(){
        $this->load->model("chat_model"); 
        $this->chat_model->actchat();   
        $this->retrieve();
    }   
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */