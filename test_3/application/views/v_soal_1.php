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
    <!-- <link href="<?php echo base_url()?>assets/dist/css/select2.min.css" rel="stylesheet" /> -->
  </head>

  <body>

  <section id="container" class="">
      <!--header start-->
      <header class="header white-bg" >
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
            
            
            <div class="col-lg-12">
                      <section class="panel">
                          <header class="panel-heading">
                              Jawaban Soal
                          </header>
                          <div class="list-group">
                             
                             <div class="panel-group m-bot20" id="accordion">
                          <div class="panel panel-default">
                              <div class="panel-heading">
                                  <h4 class="panel-title">
                                      <a class="accordion-toggle" data-toggle="collapse" data-parent="#" href="#collapse">
                                          Write a query to print successful transactions for yesterday. The result must contain: 
                                          transaction_no, transaction_type, customer_email, amount, payment_channel_name, payment_provider_name, paid_at.

                                      </a>
                                  </h4>
                              </div>
                              <div id="collapse" class="panel-collapse in" style="height: auto;">
                                  <div class="panel-body">
                                    <p>Query</p>
                                    <p>SELECT a.id_transaksi,a.transaction_no as transaction_no,a.jenis_transaksi as jenis_transaksi,b.email,a.total_harga,c.name as channel_name,d.name as provider_name,a.paid_at FROM public.transaksi a JOIN public.customer b ON a.id_customer=b.id_customer JOIN public.payment_channel c ON a.id_channel=c.id_channel JOIN public.payment_provider d ON a.id_provider=d.id_provider WHERE a.paid_at = TIMESTAMP'YESTERDAY'</p>
                                     <table class="table table-bordered">
                                       <thead>
                                         <th>transaction_no</th>
                                         <th>transaction_type</th>
                                         <th>customer_email</th>
                                         <th>amount</th>
                                         <th>payment_channel_name</th>
                                         <th>payment_provider_name</th>
                                         <th>paid_at</th>
                                       </thead>
                                       <tbody>
                                         
                                           <?php
                                           foreach($jawaban as $j){
                                           ?>
                                           <tr>
                                           <td><?php echo $j->transaction_no?></td>
                                           <td><?php echo $j->jenis_transaksi?></td>
                                           <td><?php echo $j->email?></td>
                                           <td><?php echo $j->total_harga?></td>
                                           <td><?php echo $j->channel_name?></td>
                                           <td><?php echo $j->provider_name?></td>
                                           <td><?php echo date("d-m-Y",strtotime($j->paid_at))?></td>
                                           </tr>
                                           <?php }?>
                                         
                                       </tbody>
                                     </table>
                                  </div>
                              </div>
                          </div>
                       
                      </div>
                            
                             
                          </div>
                      </section>
                  </div>
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
   
  </body>
</html>
