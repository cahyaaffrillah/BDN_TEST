 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_transaksi extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_transaksi'); // Load model SiswaModel.php yang ada di folder models
      

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            "channel"=>$this->db->query("SELECT * FROM public.payment_channel")->result(),
            "provider"=>$this->db->query("SELECT * FROM public.payment_provider")->result(),
            "item"=>$this->db->query("SELECT * FROM public.item")->result(),
            "customer"=>$this->db->query("SELECT * FROM public.customer")->result(),
            "no_transaksi"=>$this->m_transaksi->max_number(),
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_transaksi',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_transaksi', true);
        $respond= $this->m_transaksi->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        
        $sql    = $this->m_transaksi->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }
    function sukses(){
        
        $id     = $this->input->post('id', true);
        
        $data['id_transaksi'] = $id;
        $data['status'] = "SUCCESS";
        $data['paid_at'] = date("Y-m-d");
        $sql = $this->m_transaksi->edit($data);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('a.id_transaksi','a.transaction_no as transaction_no','a.jenis_transaksi as jenis_transaksi','b.email','a.total_harga','c.name as channel_name','d.name as provider_name','a.status' );
        $typeColumns = array('int','int','chr','chr','int','chr','chr','chr');
        $sSearch    = $this->input->post('sSearch',true);
        $sSearch    = str_replace("'","''",$sSearch);
        $sWhere     = "";
        
         if ( isset($sSearch) && $sSearch != "" ) {
            $sWhere = "AND (";
            for ( $i = 0 ; $i < count($aColumns) ; $i++ ) {
                if($typeColumns[$i]!="chr"){
                    $sWhere .= " LOWER(".$aColumns[$i].") LIKE LOWER('%".($sSearch)."%') OR ";
                }else{
                    $sWhere .= " LOWER(".$aColumns[$i].") LIKE LOWER('%".($sSearch)."%') OR ";
                }
            }
            $sWhere = substr_replace( $sWhere, "", - 3 );
            $sWhere .= ')';
        }
        
        $iTotalRecords = $this->m_transaksi->get_total($aColumns, $sWhere);
        $iDisplayLength = intval($this->input->post('iDisplayLength',true));
        $iDisplayLength = $iDisplayLength < 0 ? $iTotalRecords : $iDisplayLength;
        $iDisplayStart  = intval($this->input->post('iDisplayStart',true));
        $sEcho          = intval($_REQUEST['sEcho']);
        $iSortCol_0     = $this->input->post('iSortCol_0',true);
        $records        = array();
        $records["aaData"] = array();
        $sOrder = "";
        if ( isset($iDisplayStart) && $iDisplayLength != '-1' ) {
            $sLimit = " limit ".intval($iDisplayLength)." offset ".intval( $iDisplayStart );
        }

            if ( isset($iSortCol_0)) {
                    $sOrder = "ORDER BY  ";
                    for ( $i = 0 ; $i < intval($this->input->post('iSortingCols')) ; $i++ ) {
                        if ( $this->input->post('bSortable_'.intval($this->input->post('iSortCol_'.$i))) == "true" ) {
                            $sOrder .= "".$aColumns[ intval($this->input->post('iSortCol_'.$i)) ]." ".($this->input->post('sSortDir_'.$i) === 'desc' ? 'asc' : 'desc') .", ";
                        }
                    }

                    $sOrder = substr_replace( $sOrder, "", - 2 );
                    if ( $sOrder == "ORDER BY" ) {
                            $sOrder = "";
                    }
            }
        
        $data = $this->m_transaksi->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_transaksi;
            
            $action = ' 
                        <a href="javascript:void(0)" onclick="set_val(\'' . $id . '\')" class="btn btn-xs default" title="Edit">
                                        <i class="icon-pencil"></i>
                                    </a>
                        <a href="javascript:void(0)" onclick="set_del(\'' . $id . '\')" class="btn btn-xs default" title="Delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                ';
            if ($row->status=="PENDING") {
            	$action.='<a href="javascript:void(0)" onclick="set_payment(\'' . $id . '\')" class="btn btn-xs default" title="Pembayaran Sukses ?">
                                        <i class="icon-shopping-cart"></i>
                                    </a>';
            }
            
            $records["aaData"][] = array(
                "<center>" . $ino . "</center>",
                
                $row->transaction_no,
                $row->jenis_transaksi,
                $row->email,
                $row->total_harga,
                $row->channel_name,
                $row->provider_name,
                $row->status,
                
             
                $action
            );
        }
        $records["iTotalRecords"] = $iTotalRecords;
        $records["iTotalDisplayRecords"] = $iTotalRecords;

        echo json_encode($records);
    }
	 public function save() {
        $sql = '';
        

        $act = $this->input->post('act', true);
       
                        $data = array (
                        'id_provider'=>$this->input->post('id_provider'),
                        'id_channel'=>$this->input->post('id_channel'),
                       
                       'id_item'=>$this->input->post('id_item'),
                       'id_customer'=>$this->input->post('id_customer'),
                       'transaction_no'=>$this->input->post('transaction_no'),
                       'jenis_transaksi'=>$this->input->post('jenis_transaksi'),
                       'item_qty'=>$this->input->post('item_qty'),
                       'status'=>"PENDING",
                       
                       'created_at'=>date("Y-m-d "),

                    );
       				$data['expired_at']=date('Y-m-d', strtotime($data['created_at'] . " + 3 day"));
       				$harga=$this->db->query('SELECT item_price FROM public.item WHERE id_item='.$data['id_item'])->row()->item_price;
       				$data['total_harga']=$data['item_qty']*$harga;
       				$data['id_fee']=$this->db->query('SELECT id_fee FROM public.payment_channel_provider_fee WHERE id_channel='.$data['id_channel'].' AND id_provider='.$data['id_provider'])->row()->id_fee;
                if ($act == 'add') {

                   

                    $sql = $this->m_transaksi->add($data);
                   
                    
                    if ($sql== true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } elseif ($act == 'edit') {
                 $data['id_transaksi'] = $this->input->post('id_transaksi', true);
                 $sql = $this->m_transaksi->edit($data);
                    if ($sql == true) {
                        echo "1up";
                    } else {
                        echo "0up";
                    }
                }
       
    }
}
