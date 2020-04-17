<?php $this->load->view("admin/common/header_view");?>

<body>

<?php $this->load->view("admin/common/headsection_view");?>

<section>
<?php $this->load->view("admin/common/sidebar_view");?>

  <div class="mainpanel">

    <!--<div class="pageheader">
      <h2><i class="fa fa-home"></i> Dashboard</h2>
    </div>-->

    <div class="contentpanel">

      <ol class="breadcrumb breadcrumb-quirk">
        <li><a href="<?php echo base_url();?>admin"><i class="fa fa-home mr5"></i> Dashboard</a></li>
        <li class="active"><?php echo $title;?></li>
      </ol>

      <div class="row">
          <div class="col-md-12">
           <?php
            if($this->session->flashdata('msg')){
                echo $this->session->flashdata('msg');
            }
           
           ?>
             <?php  echo $content;?>

          </div> 
      </div><!-- row -->

    </div><!-- contentpanel -->

  </div><!-- mainpanel -->

</section>


<script src="<?php echo base_url();?>assetsadmin/lib/jquery-ui/jquery-ui.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/bootstrap/js/bootstrap.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/jquery-toggles/toggles.js"></script>

<script src="<?php echo base_url();?>assetsadmin/lib/datatables/jquery.dataTables.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.js"></script>

<script src="<?php echo base_url();?>assetsadmin/lib/morrisjs/morris.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/raphael/raphael.js"></script>

<script src="<?php echo base_url();?>assetsadmin/lib/flot/jquery.flot.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/flot/jquery.flot.resize.js"></script>
<script src="<?php echo base_url();?>assetsadmin/lib/flot-spline/jquery.flot.spline.js"></script>

<script src="<?php echo base_url();?>assetsadmin/lib/jquery-knob/jquery.knob.js"></script>

<script src="<?php echo base_url();?>assetsadmin/js/quirk.js"></script>
<script src="<?php echo base_url();?>assetsadmin/js/dashboard.js"></script>


<script>
$(document).ready(function() {

  'use strict';

  $('#dataTable1').DataTable();



  // Select2
  $('select').select2({ minimumResultsForSearch: Infinity });

});
</script>



</body>
</html>
