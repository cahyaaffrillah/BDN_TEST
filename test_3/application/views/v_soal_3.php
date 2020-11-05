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
                                         Write a query to list top 10 customers this month based on total transaction amount. In case of the same transaction amount, sort by customer email. The result must contain:
customer_email, total transaction amount

                                      </a>
                                  </h4>
                              </div>
                              <div id="collapse" class="panel-collapse in" style="height: auto;">
                                  <div class="panel-body">
                                    <p>Query</p>
                                    <p>SELECT a.email as email,COUNT(b.id_transaksi) as transaction_amount FROM public.customer as a LEFT JOIN transaksi as b ON a.id_customer=b.id_customer GROUP BY a.id_customer ORDER BY transaction_amount DESC, email ASC LIMIT 10</p>
                                     <table class="table table-bordered">
                                       <thead>
                                         <th>email</th>
                                         <th>transaction amount</th>
                                         
                                       </thead>
                                       <tbody>
                                         
                                           <?php
                                           foreach($jawaban as $j){
                                           ?>
                                           <tr>
                                           <td><?php echo $j->email?></td>
                                           <td><?php echo $j->transaction_amount?></td>
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
