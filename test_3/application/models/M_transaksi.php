<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_transaksi extends CI_Model {
	
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_transaksi') total FROM public.transaksi a JOIN public.customer b ON a.id_customer=b.id_customer JOIN public.payment_channel c ON a.id_channel=c.id_channel JOIN public.payment_provider d ON a.id_provider=d.id_provider WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM public.transaksi a JOIN public.customer b ON a.id_customer=b.id_customer JOIN public.payment_channel c ON a.id_channel=c.id_channel JOIN public.payment_provider d ON a.id_provider=d.id_provider WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('public.transaksi', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_transaksi',$data['id_transaksi']);
		$this->db->update('public.transaksi', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM public.transaksi WHERE id_transaksi=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_transaksi", (int) $data);
        $this->db->delete("public.transaksi");

                return ($this->db->affected_rows()) ? true : false;
    }
 	public function max_number()
 	  {
 	  	$sql = $this->db->query("SELECT MAX(transaction_no) as a FROM public.transaksi")->row()->a;
 	  	if ($sql==0) {
 	  		return $last=0;
 	  	}else{
 	  		$last=$sql+1;
 	  		return $last;
 	  	}
 	  }  
}
