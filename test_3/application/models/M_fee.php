<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_fee extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_fee') total FROM public.payment_channel_provider_fee a JOIN public.payment_channel b ON a.id_channel=b.id_channel JOIN public.payment_provider c ON a.id_provider=c.id_provider WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM public.payment_channel_provider_fee a JOIN public.payment_channel b ON a.id_channel=b.id_channel JOIN public.payment_provider c ON a.id_provider=c.id_provider WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('public.payment_channel_provider_fee', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_fee',$data['id_fee']);
		$this->db->update('public.payment_channel_provider_fee', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM public.payment_channel_provider_fee WHERE id_fee=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_fee", (int) $data);
        $this->db->delete("public.payment_channel_provider_fee");

                return ($this->db->affected_rows()) ? true : false;
    }
   
}
