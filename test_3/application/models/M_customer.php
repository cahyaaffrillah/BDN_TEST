<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_customer extends CI_Model {
	public function get_total($aColumns,$sWhere)
    {
    	$total = 0;
		$result= $this->db->query("SELECT COUNT('id_customer') total FROM public.customer WHERE 0=0 $sWhere");
		foreach ($result->result() as $row) {
			$total = $row->total;
		}
		return $total;
    }

    function get_data($sLimit,$sWhere,$sOrder,$aColumns)
	{
		$sql    = "SELECT ". implode(', ',$aColumns) ." FROM public.customer WHERE 0=0 $sWhere $sOrder $sLimit";
		
		$result = $this->db->query($sql);
		$result = $result->result();
		return $result;
	}	
	function add($data){
       	$a=array();
		$this->db->insert('public.customer', $data);
		if($this->db->affected_rows()){
			
			return true;
		}else{
			return false;
		}
	}
	
	function edit($data){
		$this->db->where('id_customer',$data['id_customer']);
		$this->db->update('public.customer', $data);
		if($this->db->affected_rows()){
			return true;
		}else{
			return false;
		}
	}
	public function findedit($id)
	{
		# code...
		$sql=$this->db->query("SELECT * FROM public.customer WHERE id_customer=".$id)->result();
		return $sql;
	}
	function deletedata($data)
    {	 
    	
        $this->db->where("id_customer", (int) $data);
        $this->db->delete("public.customer");

                return ($this->db->affected_rows()) ? true : false;
    }
   
}
