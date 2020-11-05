<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_soal extends CI_Controller {

	public function __construct(){
		parent::__construct();

		// Load model SiswaModel.php yang ada di folder models
      

	}

	public function soal_1(){
		// $this->load->view('v_pasien');
		 $data=array(
            "jawaban"=>$this->db->query("SELECT a.id_transaksi,a.transaction_no as transaction_no,a.jenis_transaksi as jenis_transaksi,b.email,a.total_harga,c.name as channel_name,d.name as provider_name,a.paid_at FROM public.transaksi a JOIN public.customer b ON a.id_customer=b.id_customer JOIN public.payment_channel c ON a.id_channel=c.id_channel JOIN public.payment_provider d ON a.id_provider=d.id_provider WHERE a.paid_at = TIMESTAMP'YESTERDAY'")->result(),
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_1',$data);
	}
	public function soal_2(){
        // $this->load->view('v_pasien');
         $data=array(
           "jawaban"=>$this->db->query("SELECT code,name FROM public.payment_channel WHERE id_channel NOT IN (SELECT id_channel FROM public.transaksi WHERE paid_at=TIMESTAMP'YESTERDAY')")->result(),
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_2',$data);
    }
    public function soal_3(){
        // $this->load->view('v_pasien');
         $data=array(
            "jawaban"=>$this->db->query("SELECT a.email as email,COUNT(b.id_transaksi) as transaction_amount FROM public.customer as a LEFT JOIN transaksi as b ON a.id_customer=b.id_customer GROUP BY a.id_customer ORDER BY transaction_amount DESC, email ASC LIMIT 10")->result(),
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_3',$data);
    }
     public function soal_4(){
        // $this->load->view('v_pasien');
         $data=array(
            "jawaban"=>$this->db->query("SELECT a.code as channel_code,b.admin_fee FROM public.payment_channel as a RIGHT JOIN public.transaksi b ON a.id_channel=b.id_channel")->result(),
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_4',$data);
    }
    public function soal_5(){
        // $this->load->view('v_pasien');
         $data=array(
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_5',$data);
    }
     public function soal_6(){
        // $this->load->view('v_pasien');
         $data=array(
            
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_soal_6',$data);
    }
}
