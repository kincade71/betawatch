<!DOCTYPE html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
	<title>BetaWatch</title>



	<style type="text/css" media="screen">
		<?php include( 'styles.css' ); ?>
	</style>
    <meta charset="utf-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Richard Robinson http://www.richardorobinson.com">

    <!-- CSS  -->
    <?php if($this->session->userdata('lights') == 'inverse'){ ?>
    	<link href="<?= base_url()?>css/lightsoff.css" rel="stylesheet">
    <?php }else{?>
    	<link href="<?= base_url()?>css/bootstrap.css" rel="stylesheet">
    <?php }?>
    <link rel="stylesheet" href="<?= base_url()?>datepicker/css/smoothness/jquery-ui-1.10.3.custom.css">
    <style type="text/css">
body {
	padding-top: 60px;
	padding-bottom: 40px;
}
.sidebar-nav {
	padding: 9px 0;
}
</style>
    <link href="<?= base_url()?>css/bootstrap-responsive.css" rel="stylesheet">
    <link href="<?= base_url()?>css/app.css" rel="stylesheet">
    <link href="<?= base_url()?>css/font-awesome.min.css" rel="stylesheet">
    <!-- End CSS -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons and touch icons -->
    <link rel="shortcut icon" href="<?= base_url()?>img/favicon.ico">
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url()?>img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url()?>img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url()?>img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url()?>img/apple-touch-icon-57-precomposed.png">-->

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>


</head>
<body>
<!--  HEADER HERE   -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
    <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?= base_url()?>">
      BetaWatch
      </a>
          <div class="nav-collapse">
          <?php if($this->session->userdata('lights') == 'inverse'){ ?>
			<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightson" class="btn btn-link pull-right lightson tipping hidden-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights on." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
			<hr class="visible-phone"/>
			<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightson" class="btn btn-primary btn-block pull-right lightson tipping visible-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights on." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
			<br class="visible-phone"/>          
          <?php }else{?>
          	<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightsoff" class="btn btn-link pull-right tipping hidden-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights off." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
          	<hr class="visible-phone"/>
          	<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightsoff" class="btn btn-primary btn-block pull-right tipping visible-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights off." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
          	<br class="visible-phone"/>
          <?php }?>

        <ul class="nav">
            </ul>
      </div>
        </div>
  </div>
    </div>    <div class="container-fluid">
  <div class="row-fluid">
    <div class="span12 ">
	<h1><?php if( $today ) echo $this->lang->line( 'fire_log_today' ); ?></h1>
	<!--<div id="nav">
		<?php 
		foreach ( $list as $file ){
			echo build_log_link( $file, $log_file_name );
		} 
		?>
		
		</div>-->
			<div id="filterBar" class="well">
			<?php
			echo build_filter_link( 'all', 'SHOW ALL' );
			echo build_filter_link( 'error', 'ERRORS' );
			echo build_filter_link( 'info', 'INFO' );
			echo build_filter_link( 'debug', 'DEBUG' );
			
			?>
			<a href="<?php echo build_spark_url( array( 'delete'=>$log_file_name ), TRUE )?>" onclick="return confirm('Are You Sure?');" class="deleteFile" >DELETE CURRENT FILE</a>
			<a href="<?php echo build_spark_url( array( 'delete_all' => $log_file_name ), TRUE )?>" onclick="return confirm('Are You Sure?');" class="deleteFile" >DELETE ALL FILES</a>
			</div>
			
		
			<div class="tabbable tabs-left">
  <ul class="nav nav-tabs">
    <?php 
		foreach ( $list as $file ){
			echo '<li>'.build_log_link( $file, $log_file_name ).'</li>';
		} 
		?>
  </ul>
  <div class="tab-content">
    <?php echo str_replace( "&nbsp;", '', $pagination_links ); ?>
			
			<div class="logContainer"><?php echo $log_contents ?></div>
			<?php echo str_replace( "&nbsp;", '', $pagination_links ); ?>
  </div>
</div>
			
			
			
			
			
			
			
			
			
			</div>
			
		
	</div>
	</div>
<hr>
<div class="container-fluid">
  <footer>
    <div class="row-fluid">
      <div class="span4">
        <p>&copy;
          TracSuite
          <?= date('Y'); ?>
        </p>
      </div>
      <div class="span4">
      </div>
      <div class="span4">
        <p class="pull-right"><a href="<?= base_url() ?>user_guide/">CI Framework User Guide</a> | </p>
      </div>
    </div>
  </footer>
</div>
<!-- javascript
    ================================================== --> 
<!-- Placed at the end of the document so the pages load faster --> 

<script src="<?= base_url()?>datepicker/development-bundle/ui/jquery.ui.core.js"></script> 
<script src="<?= base_url()?>datepicker/development-bundle/ui/jquery.ui.widget.js"></script> 
<script src="<?= base_url()?>datepicker/development-bundle/ui/jquery.ui.datepicker.js"></script> 
<script src="<?= base_url()?>/js/bootstrap.js"></script> 
<script>
  $(function() {
    $( "#datepicker" ).datepicker();
   
      $( "#datepicker" ).datepicker( "option", "dateFormat", "dd-mm-yy" );

  });
  </script> 
<script>
$(document).ready(function(){
    $('.tipping').tooltip();
});
</script> 
<script>
$(document).ready(function(){
    $('.pop').popover();
});
</script> 
<script>
  $(function() {
    $( "#from" ).datepicker({
      defaultDate: "+1w",
      changeMonth: false,
      numberOfMonths: 1,
      dateFormat: "dd-mm-yy",
      onClose: function( selectedDate ) {
        $( "#to" ).datepicker( "option", "minDate", selectedDate );
      }
    });
    $( "#to" ).datepicker({
      defaultDate: "+1w",
      changeMonth: false,
      numberOfMonths: 2,
      dateFormat: "dd-mm-yy",
      onClose: function( selectedDate ) {
        $( "#from" ).datepicker( "option", "maxDate", selectedDate );
      }
    });
  });
  </script>
</body></html>