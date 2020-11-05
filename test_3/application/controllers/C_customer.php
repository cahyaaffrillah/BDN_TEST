<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_customer extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_customer'); // Load model SiswaModel.php yang ada di folder models
      

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_customer',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_customer', true);
        $respond= $this->m_customer->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        
        $sql    = $this->m_customer->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('id_customer','email','name','phone' );
        $typeColumns = array('int','chr','chr','chr');
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
        
        $iTotalRecords = $this->m_customer->get_total($aColumns, $sWhere);
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
        
        $data = $this->m_customer->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_customer;

            $action = '
                        <a href="javascript:void(0)" onclick="set_val(\'' . $id . '\')" class="btn btn-xs default" title="Edit">
                                        <i class="icon-pencil"></i>
                                    </a>
                        <a href="javascript:void(0)" onclick="set_del(\'' . $id . '\')" class="btn btn-xs default" title="Delete">
                                        <i class="icon-trash"></i>
                                    </a>
                                ';
            
            $records["aaData"][] = array(
                "<center>" . $ino . "</center>",
                
                $row->email,
                $row->name,
                $row->phone,
             
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
                        'email'=>$this->input->post('email'),
                        'name'=>$this->input->post('name'),
                        'phone'=>$this->input->post('phone'),
                        'password'=>$this->input->post('password'),
                    );
       

                if ($act == 'add') {

                   

                    $sql = $this->m_customer->add($data);
                   
                    
                    if ($sql== true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } elseif ($act == 'edit') {
                 $data['id_customer'] = $this->input->post('id_customer', true);
                 $sql = $this->m_customer->edit($data);
                    if ($sql == true) {
                        echo "1up";
                    } else {
                        echo "0up";
                    }
                }
        // }else{
        //     echo "0";
        // }
       
    }
}
