<?php    
class Mread extends CI_Model{
    function report(){
    	$identity=$this->session->userdata('identityID');
        $query = $this->db->query("SELECT trxDate,Sum(trxTotal) as total from as_sales_transactions WHERE identityID=3 GROUP BY trxDate ORDER BY trxID DESC LIMIT 7 ;");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function report2(){
        $identity=$this->session->userdata('identityID');
        $query = $this->db->query("SELECT trxDate,Sum(trxTotal) as total from as_sales_transactions_toko WHERE identityID=5 GROUP BY trxDate ORDER BY trxID DESC LIMIT 7 ;");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }

    function report3(){
        $identity=$this->session->userdata('identityID');
        $query = $this->db->query("SELECT trxDate,Sum(trxTotal) as total from as_sales_transactions_toko WHERE identityID=6 GROUP BY trxDate ORDER BY trxID DESC LIMIT 7 ;");
         
        if($query->num_rows() > 0){
            foreach($query->result() as $data){
                $hasil[] = $data;
            }
            return $hasil;
        }
    }
}