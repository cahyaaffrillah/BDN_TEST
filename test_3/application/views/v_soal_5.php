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
                                         Create any indexes that you think are necessary for the transaction table and please explain why. Please also consider storage size and writing speed in determining the indexes. 

                                      </a>
                                  </h4>
                              </div>
                              <div id="collapse" class="panel-collapse in" style="height: auto;">
                                  <div class="panel-body">
                                    <p>Transaksi Tabel membutuhkan beberapa index, diantaranya index id_item, id_channel,id_provider dan id_payment_provider</p>
                                    <p>Index ini dibutuhkan untuk menormalisasikan tabel dan untuk mempercepat query yang akan di gunakan. Berikut susunan sql dari tabel transaksi yang saya buat</p>
                                    <p>

CREATE TABLE public.transaksi
(
    id_transaksi integer NOT NULL DEFAULT nextval('sequence_transaksi'::regclass),
    transaction_no character varying(45) COLLATE pg_catalog."default",
    status jenis_transaksi,
    item_qty integer,
    created_at timestamp without time zone,
    paid_at timestamp without time zone,
    expired_at timestamp without time zone,
    total_harga integer,
    id_item integer NOT NULL,
    id_customer integer NOT NULL,
    id_channel integer NOT NULL,
    id_provider integer NOT NULL,
    id_fee integer NOT NULL,
    jenis_transaksi character varying(50) COLLATE pg_catalog."default",
    CONSTRAINT transaksi_pkey PRIMARY KEY (id_transaksi),
    CONSTRAINT fk_channel FOREIGN KEY (id_channel)
        REFERENCES public.payment_channel (id_channel) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_customer FOREIGN KEY (id_customer)
        REFERENCES public.customer (id_customer) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_fee FOREIGN KEY (id_fee)
        REFERENCES public.payment_channel_provider_fee (id_fee) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_item FOREIGN KEY (id_item)
        REFERENCES public.item (id_item) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE,
    CONSTRAINT fk_provider FOREIGN KEY (id_provider)
        REFERENCES public.payment_provider (id_provider) MATCH SIMPLE
        ON UPDATE CASCADE
        ON DELETE CASCADE
)

TABLESPACE pg_default;

ALTER TABLE public.transaksi
    OWNER to postgres;</p>
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
