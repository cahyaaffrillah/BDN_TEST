<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_item extends CI_Controller {

	public function __construct(){
		parent::__construct();

		$this->load->model('m_item'); // Load model SiswaModel.php yang ada di folder models
      

	}

	public function index(){
		// $this->load->view('v_pasien');
		 $data=array(
            "title"=>"BDN TEST",
            "menu_admin"=>"sidebar",
            "notif"=>"header"
            );
         $this->load->view('v_item',$data);
	}
	public function dataedit() {
        $respond= new stdClass(); 
        $id     = $this->input->post('id_item', true);
        $respond= $this->m_item->findedit($id);
        echo json_encode($respond);
    }
    function delete(){
        
        $id     = $this->input->post('id', true);
        
        $sql    = $this->m_item->deletedata($id);

        echo ($sql == true) ? 'true' : 'false';
    }

	 function view() {
        
        $aColumns = array('id_item','item_name','item_description','item_price' );
        $typeColumns = array('int','chr','chr','int');
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
        
        $iTotalRecords = $this->m_item->get_total($aColumns, $sWhere);
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
        
        $data = $this->m_item->get_data($sLimit, $sWhere, $sOrder, $aColumns);
        // var_dump($data);
        $no = 1 + $iDisplayStart;
        $ino = 0+ $iDisplayStart;
        foreach ($data as $row) {
            $ino++;
            $id = $row->id_item;

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
                
                $row->item_name,
                $row->item_description,
                $row->item_price,
             
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
                        'item_name'=>$this->input->post('item_name'),
                        'item_price'=>$this->input->post('item_price'),
                        'item_description'=>$this->input->post('item_description')
                       
                    );
       

                if ($act == 'add') {

                   

                    $sql = $this->m_item->add($data);
                   
                    
                    if ($sql== true) {
                    
                     echo "1";
                    } else {
                     echo "0";
                    }
                } elseif ($act == 'edit') {
                 $data['id_item'] = $this->input->post('id_item', true);
                 $sql = $this->m_item->edit($data);
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
