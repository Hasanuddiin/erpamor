<?php
class chat_model extends CI_Model{ 

	function chat_model()
	{
		parent::__construct();
	}
	function retrieve(){
			$menus='';
			$judul=$this->input->post('judul');
			$status=$this->session->userdata('STATUS');
			$addTag="";
			$query=$this->db->query("select *,as_pegawai.nama_lengkap from t_chat 
			left join as_pegawai on as_pegawai.nip=t_chat.nip
			order by t_chat.id DESC limit 0,20");
			 if ($query->num_rows() > 0) {
				foreach ($query->result() as $data) {
					echo "<p style='width:500px'><lebel style='font-family:calibri;text-align:left'><b>".$data->nama_lengkap."</b>: ";
					echo $data->chat."</label></p>";
				}
			}

		}
		function getSupplier($id=''){
			$menus='';
			$judul=$this->input->post('judul');
			$status=$this->session->userdata('STATUS');
			$addTag="";
			$query=$this->db->query("select * from supplier where id='$id'");
			return $query->row();

		}	
		 
	function actchat(){
		$id=$this->input->post('id');
		$nik=$this->session->userdata('admin_nama');
		$chatme=$this->input->post('chatme');
		 
		 
		$data=array(
	 	 'nik'=>$nik,
		 'chat'=>$chatme,
		 'date'=>date("Y-m-d"),
		 'jam'=>date("H:m:s"),
		);
		$this->db->trans_start();
		$this->db->insert('t_chat',$data);
		$this->db->trans_complete();
		
	}	
   
}
// END RiskIssue_model Class

/* End of file RiskIssue_model.php */
/* Location: ./application/models/RiskIssue_model.php */
?>