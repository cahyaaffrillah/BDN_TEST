<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Mosaddek">
    <meta name="keyword" content="FlatLab, Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <link rel="shortcut icon" href="img/favicon.png">

    <title><?php echo $title?></title>

    <!-- Bootstrap core CSS -->
  <link href="<?php echo base_url()?>assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/bootstrap-reset.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url()?>assets/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url()?>assets/css/style-responsive.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/bootstrap.min.css') ?>"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('datatables/lib/css/dataTables.bootstrap.min.css') ?>"/>
    
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg">
         <?php $this->load->view($notif)?>
     </header>
      <!--header end-->
      <!--sidebar start-->
      <aside>
        <?php $this->load->view($menu_admin)?>
      </aside>
      <!--sidebar end-->
      <!--main content start-->

      <section id="main-content">
          <section class="wrapper site-min-height">
              <!-- page start-->
             <!-- <div class="container"> -->
                 <div class="row">
                            <div class="col-md-12">
                                <!-- BEGIN SAMPLE TABLE PORTLET-->
                                <div class="portlet box green">
                                
                                        <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">

        <div class="panel panel-default">
            <div class="panel-heading" role="tab" id="headingOne">
                <h4 class="panel-title">
                   <a class="btn btn-xs default" href="javascript:;" id="form_act">
                        <i class="more-less glyphicon glyphicon-plus"></i>
                       Tambah Data Transaksi 
                    </a>
                </h4>
            </div>
           
    </div>
                                    </div>
                                    <div class="portlet-body" id="form_container" style="display:none;">
                                        <form role="form" class="form-horizontal" id="form_vendor" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="act" id="act" value="add"/>
                    <input type="hidden" name="id_transaksi" id="id_transaksi" value=""/>
                                         <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover table-checkable order-column" id="sample_1">

                                                <tr>
                                                   <td colspan="6" style="font-weight:bold"> Detail Transaksi </td>

                                                    <!-- <td colspan="3"  style="font-weight:bold"> Atribut surat </td> -->

                                                </tr>
                                                 <tr>

                                                     <td width="150px"> Customer </td>
                                                    <td width="10px"> : </td>
                                                    <td>  
                                                      <select class="form-control" id="id_customer" name="id_customer">
                                                        <option value="">Pilih Customer</option>
                                                        <?php foreach($customer as $cus){?>
                                                        <option value="<?php echo $cus->id_customer?>"><?php echo $cus->name?></option>
                                                        <?php }?>
                                                      </select>
                                                    </td>
                                                   
                                                   
                                                </tr>
                                                <tr>

                                                     <td width="150px"> Item </td>
                                                    <td width="10px"> : </td>
                                                    <td>  
                                                      <select class="form-control" id="id_item" name="id_item">
                                                        <option value="">Pilih Item</option>
                                                        <?php foreach($item as $it){?>
                                                        <option value="<?php echo $it->id_item?>"><?php echo $it->id_item?></option>
                                                        <?php }?>
                                                      </select>
                                                    </td>
                                                   
                                                   
                                                </tr> 
                                                 <tr>

                                                     <td width="150px"> Channel </td>
                                                    <td width="10px"> : </td>
                                                    <td>  
                                                      <select class="form-control" id="id_channel" name="id_channel">
                                                        <option value="">Pilih Channel</option>
                                                        <?php foreach($channel as $c){?>
                                                        <option value="<?php echo $c->id_channel?>"><?php echo $c->code?> - <?php echo $c->name?></option>
                                                        <?php }?>
                                                      </select>
                                                    </td>
                                                   
                                                   
                                                </tr> 
                                                <tr>
                                                   <td width="150px"> Provider  </td>
                                                    <td width="10px"> : </td>
                                                    <td> 
                                                        <select class="form-control" id="id_provider" name="id_provider">
                                                        <option value="">Pilih Provider</option>
                                                        <?php foreach($provider as $p){?>
                                                        <option value="<?php echo $p->id_provider?>"><?php echo $p->code?> - <?php echo $p->name?></option>
                                                        <?php }?>
                                                      </select>
                                                     </td>
                                                </tr>
                                                <tr>
                                                   <td width="150px"> Nomor Transaksi  </td>
                                                    <td width="10px"> : </td>
                                                    <td>  <input type="text" class="form-control" name="transaction_no" id="transaction_no" tabindex="1" value="<?php echo $no_transaksi?>" readonly> </td>
                                                </tr>
                                                <tr>
                                                  <td width="150px"> Jenis Pembayaran  </td>
                                                    <td width="10px"> : </td>
                                                    <td> 
                                                      <select class="form-control" id="jenis_transaksi" name="jenis_transaksi">
                                                        <option value="">Pilih Jenis Pembayaran</option>
                                                        <option value="debit">Debit</option>
                                                        <option value="cash">Cash</option>
                                                        <option value="kredit">Kredit</option>
                                                      </select>
                                                    </td>
                                                </tr>
                                                <tr>
                                                  <td width="150px"> Item Quantity  </td>
                                                    <td width="10px"> : </td>
                                                    <td> 
                                                     <input type="text" class="form-control" name="item_qty" id="item_qty" tabindex="1" >
                                                    </td>
                                                </tr>
                                               
                                                
                                                
                                                 
                                              
                <td colspan="6" align="center">

            <button id="cancel" type="button" class="btn default" tabindex="15">Cancel</button>
            <button id="save" type="button" class="btn blue"  data-loading-text="Loading..." tabindex="14">Save</button>

                </td>
            </tr>

                                        </table>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- END EXAMPLE TABLE PORTLET-->
                            </div>
</div>
<div class="row">
  <div class="col-lg-12">
    <!-- BEGIN EXAMPLE TABLE PORTLET-->
    <div class="portlet box green">
      <div class="portlet-title">
        <div class="caption">
          <i class="fa fa-globe"></i>
          <big>Data Transaksi</big>
        </div>
        <div class="actions"></div>
      </div>
      <div class="portlet-body">
        <div id="view-table">
          <table class="table table-bordered" id="table-siswa">
                      <thead>
                      
                        <tr>
                          <th>Nomor</th>
                          
                          
                          <th>Nomor Transaksi</th>
                          <th>Tipe Transaksi</th>
                          <th>Email Customer</th>
                          <th>Total Harga</th>
                          <th>Nama Channel</th>
                          <th>Nama Provider</th>
                          <th>Status</th>
                          
                         
                          
                          <th width="10%">Aksi</th>
                        </tr>
                      </thead>
                      <tbody></tbody>
                    </table>
        </div>
      </div>
    </div>
  </div>
</div>
                <!-- </div> -->

          </section>
      </section>
      <!--main content end-->
      <!--footer start-->
      <footer class="site-footer">
          <div class="text-center">
              2020 &copy; <?php echo $title?>.
              <a href="#" class="go-top">
                  <i class="icon-angle-up"></i>
              </a>
          </div>
      </footer>
      <!--footer end-->
  </section>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url()?>assets/js/jquery.js"></script>
    <script src="<?php echo base_url()?>assets/js/bootstrap.min.js"></script>
    <script class="include" type="text/javascript" src="<?php echo base_url()?>assets/js/jquery.dcjqaccordion.2.7.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.scrollTo.min.js"></script>
    <script src="<?php echo base_url()?>assets/js/jquery.nicescroll.js" type="text/javascript"></script>
    <script src="<?php echo base_url()?>assets/js/respond.min.js" ></script>

    <!--common script for all pages-->
    <script src="<?php echo base_url()?>assets/js/common-scripts.js"></script>
    <!-- <script type="text/javascript" src="<?php echo base_url('js/jquery.min.js') ?>"></script> -->
    <script type="text/javascript" src="<?php echo base_url('datatables/datatables.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('datatables/lib/js/dataTables.bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url()?>assets/assets/ckeditor/ckeditor.js"></script>
    <!-- <script src="<?php echo base_url()?>assets/dist/js/select2.min.js"></script> -->
    <script>
    var tabel = null;
    var TableAdvanced = function () {
  var initTable1 = function() {

  
    /*
    * Initialize DataTables, with no sorting on the 'details' column
    */

    var target='#table-siswa';
    var oTable = $(target).dataTable( {
        "aoColumnDefs": [
          {
            "bSortable": false,
            "aTargets": [ -1 ]
          },{
            "bSortable": false,
            "aTargets": [ 0 ]
          }
        ],
        "aoColumns": [
          { "sWidth": "1%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
          { "sWidth": "10%" },
         
          { "sWidth": "5%" }
                    ],
        "aaSorting": [[0, 'asc']],
        "aLengthMenu": [
          [5,10, 20, 50, -1],
          [5,10, 20, 50, "All"] // change per page values here
        ],
        // set the initial value
        "iDisplayLength": 5, // default records per page
        "oLanguage": {
          // language settings
          "sLengthMenu": "Display _MENU_ records",
          "sSearch": "Search _INPUT_ <a class='btn default bts' href='javascript:void(0);'><i class='fa fa-search'></i></a>",
          "sProcessing": '<img src="<?php echo base_url(); ?>assets/global/img/loading-spinner-grey.gif"/><span>&nbsp;&nbsp;Loading...</span>',
          "sInfoEmpty": "No records found to show",
          "sAjaxRequestGeneralError": "Could not complete request. Please check your internet connection",
          "sEmptyTable":  "No data available in table",
          "sZeroRecords": "No matching records found",
          "oPaginate": {
            "sPrevious": "Prev",
            "sNext": "Next",
            "sPage": "Page",
            "sPageOf": "of"
          }
        },
        "bAutoWidth": true,   // disable fixed width and enable fluid table
        "bSortCellsTop": true, // make sortable only the first row in thead
        "sPaginationType": "full_numbers", // pagination type(bootstrap, bootstrap_full_number or bootstrap_extended)
        "bProcessing": true, // enable/disable display message box on record load
        "bServerSide": true, // enable/disable server side ajax loading
        "sAjaxSource": "<?php echo base_url(); ?>c_transaksi/view", // define ajax source URL
        "sServerMethod": "POST"
      });

      jQuery(target+'_wrapper .dataTables_filter input').addClass("form-control input-small input-inline"); // modify table search input
      jQuery(target+'_wrapper .dataTables_length select').addClass("form-control input-small"); // modify table per page dropdown
      // jQuery(target+'_wrapper .dataTables_length select').select2(); // initialize select2 dropdown
      jQuery(target+'_wrapper .dataTables_filter input').unbind();
      jQuery(target+'_wrapper .dataTables_filter input').bind('keyup', function(e) {
        if(e.keyCode == 13) {
          oTable.fnFilter(this.value);
        }
      });
      jQuery(target+'_wrapper .dataTables_filter a').bind('click', function(e) {
        var key=jQuery(target+'_wrapper .dataTables_filter input').val();
        oTable.fnFilter(key);
      });
  }

  return {
    //main function to initiate the module
    init: function () {
      if (!jQuery().dataTable) {
        return;
      }
      initTable1();
    }
  };

}();
    $(document).ready(function() {
      TableAdvanced.init();
      jQuery('#form_act').bind('click', function(e) {
          jQuery('#form_container').slideToggle(500);
          $('#form_vendor')[0].reset();
          $('#act').val('add');
          $("#id_fee").val("");
        });

      

      $('#save').click(function(){
       if ($('#id_provider').val() == "") {
          alert("Provider harus di isi");
          $('#id_provider').focus();
          return false;
        }else  if ($('#id_channel').val() == "") {
          alert("Channel harus di isi");
          $('#id_channel').focus();
          return false;
        }else  if ($('#id_customer').val() == "") {
          alert("Customer harus di isi");
          $('#id_customer').focus();
          return false;
        }else  if ($('#id_item').val() == "") {
          alert("Item harus di isi");
          $('#id_item').focus();
          return false;
        }else  if ($('#transaction_no').val() == "") {
          alert("Nomor Transaksi harus di isi");
          $('#transaction_no').focus();
          return false;
        }else  if ($('#jenis_transaksi').val() == "") {
          alert("Jenis Transaksi harus di isi");
          $('#jenis_transaksi').focus();
          return false;
        }else  if ($('#item_qty').val() == "") {
          alert("Item Quantity harus di isi");
          $('#item_qty').focus();
          return false;
        }else  if ($('#admin_fee').val() == "") {
          alert("Fee Admin harus di isi");
          $('#admin_fee').focus();
          return false;
        }else {
        
          $('#form_vendor').submit();
        
        }

    return false;
  });
      $('#cancel').click(function(){
        $('#form_vendor')[0].reset();
        
        $('#id_fee').val('');
       
        $('#act').val('add');
        $('#form_container').slideUp(500);
            // window.location.href = window.location.href;
      });
      $('#form_vendor').submit(function(e){
    e.preventDefault();
    var sInap = 0;
    var sPen = 0;

    $.ajax({
      type: 'POST',
      url: 'c_transaksi/save',
      data:new FormData(this),
                     processData:false,
                     contentType:false,
                     cache:false,
      // data: $(this).serialize(),

      beforeSend: function(){
        $('#save').prop('innerHTML', 'Loading...');
                $('#save').prop('disabled', true);  
      },
      complete: function() {
        $('#save').prop('innerHTML', 'Save');
                $('#save').prop('disabled', false);
      },
      success: function(data) {
        console.log(data);
        if(data=='1') {
          alert("Data telah berhasil di simpan");
          $('#cancel').click();
          loadTbl();
        }else if(data=='1del'){
          alert("Data berhasil dihapus");
          $('#cancel').click();
          loadTbl();
        }else if(data=='1up'){
          alert("Data berhasil update");
          $('#cancel').click();
          loadTbl();
        }else if(data=='0') {
          alert("Data gagal di simpan");
        }else if(data=='0del'){
          alert("Data gagal dihapus");
        }else if(data=='0up'){
          alert("Data gagal update");
        }
      }
    });
    return false;
  });

       
    });
function loadTbl(){
  $("#table-siswa").dataTable().fnDraw();
} 
function set_val(data) {
  // body...
   $.post('<?php echo base_url()?>c_transaksi/dataedit', {id_transaksi: data}, function(respond) {  
                  $("#id_transaksi").val(respond[0].id_transaksi);
                  $("#id_fee").val(respond[0].id_fee);
                 
                  $("#id_provider").val(respond[0].id_provider);
                  $("#id_channel").val(respond[0].id_channel);
                $("#id_customer").val(respond[0].id_customer);
                  $("#id_item").val(respond[0].id_item);
                  $("#transaction_no").val(respond[0].transaction_no);
                  $("#jenis_transaksi").val(respond[0].jenis_transaksi);
                  $("#item_qty").val(respond[0].item_qty);
                  
                
                
                                        }, 'json');
   $('#form_container').slideDown(500);
   $("#act").val("edit");
  $('html, body').animate({scrollTop: 0}, 500);
}
function set_del(data) {
  if( confirm("Apakah data ingin dihapus ?") ){
    $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>c_transaksi/delete',
                data: { id : data },
                success: function(data) {
                    if(data === 'true')
                    // $('#cancel').click();
                alert('Data berhasil dihapus');
                // window.location.href = window.location.href;
                loadTbl();
                }
            });
  }
}
function set_payment(data) {
  if( confirm("Apakah pembayaran sukses ?") ){
    $.ajax({
                type: 'POST',
                url: '<?php echo base_url() ?>c_transaksi/sukses',
                data: { id : data },
                success: function(data) {
                    if(data === 'true')
                    // $('#cancel').click();
                alert('Data berhasil diganti');
                // window.location.href = window.location.href;
                loadTbl();
                }
            });
  }
}
function isNumberKey(evt){
    var charCode = (evt.which) ? evt.which : evt.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))
        return false;
    return true;
}


    </script>
  </body>
</html>