<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <title>
    <?= $title ?>
    </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Richard Robinson http://www.richardorobinson.com">
	<link rel="stylesheet" href="http://netdna.bootstrapcdn.com/bootstrap/3.0.3/css/bootstrap.min.css">
    <!-- CSS  -->
    <?php if($this->session->userdata('lights') == 'inverse'){ ?>
    	<link href="<?= base_url()?>css/lightsoff.css" rel="stylesheet">
    <?php }else{?>
    	<link href="<?= base_url()?>css/bootstrap.css" rel="stylesheet">
    <?php }?>
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
      <link href="<?= base_url()?>css/jquery.dataTables.css" rel="stylesheet">
    <!-- End CSS -->

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Favicons and touch icons -->
    <link rel="shortcut icon" href="<?= base_url()?>img/AIRApp_16.png">
    <link rel="shortcut icon" href="<?= base_url()?>img/AIRApp_32.png">
    <link rel="shortcut icon" href="<?= base_url()?>img/AIRApp_48.png">
    <link rel="shortcut icon" href="<?= base_url()?>img/AIRApp_128.png">
    <link rel="shortcut icon" href="<?= base_url()?>img/AIRApp_16.png">
    <!--<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?= base_url()?>img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url()?>img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url()?>img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?= base_url()?>img/apple-touch-icon-57-precomposed.png">-->

  	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="<?= base_url()?>js/bootstrap.js"></script>
	<script src="<?= base_url()?>js/jquery.dataTables.min.js"></script>
	<script src="<?= base_url()?>js/jquery.cookie.js"></script>
	<script src="<?= base_url()?>js/docready.js"></script>
	<script src="<?= base_url()?>js/methods.js"></script>
	<script src="<?= base_url()?>js/jquery.html5storage.min.js"></script>
	<script src="<?= base_url()?>js/bootstrap-rating-input.min.js"></script>
    <body>
<!--  HEADER HERE   -->
<div class="navbar navbar-fixed-top">
      <div class="navbar-inner">
    <div class="container-fluid">
          <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </a> <a class="brand" href="<?= base_url()?>">
      <?= $projectname ?>
      </a>
          <div class="nav-collapse">
          <?php if($this->session->userdata('lights') == 'inverse'){ ?>
			<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightson" class="btn btn-link pull-right lightson  hidden-phone tipping" data-toggle="tooltip" title data-original-title="Click to turn the lights on." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
			<hr class="visible-phone"/>
			<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightson" class="btn btn-primary btn-block pull-right lightson tipping visible-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights on." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
			<br class="visible-phone"/>          
          <?php }else{?>
          	<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightsoff" class="btn btn-link pull-right  hidden-phone tipping" data-toggle="tooltip" title data-original-title="Click to turn the lights off." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
          	<hr class="visible-phone"/>
          	<a href="<?= base_url()?><?= ($whereiam)?$whereiam.'/':'welcome/' ?>lightsoff" class="btn btn-primary btn-block pull-right tipping visible-phone" data-toggle="tooltip" title data-original-title="Click to turn the lights off." data-placement="bottom"><i class="fa fa-lightbulb-o fa-lg"></i></a>
          	<br class="visible-phone"/>
          <?php }?>
          <div id="button">
          <?php if($_COOKIE['desktop_notifications_enabled']){?>
          	<?php if($whereiam != NULL){?>
			<input type="button" class="btn btn-link pull-right hidden-phone" id="watch" value="Enable Desktop Notifications for <?= ucfirst($whereiam)?>"></input>
			<input id="where" type="hidden" value="<?= $whereiam ?>"></input>
			<?php }?>
		  <?php }else{?>
		  	<input type="button" class="btn btn-link pull-right hidden-phone" id="ask_permission" value="Enable Desktop Notifications"></input>	
		  	<input id="where" type="hidden" value="<?= $whereiam ?>"></input>
		  <?php }?>
		  <?php if($_COOKIE['desktop_notifications_enabled_'.$whereiam]){?>
		  	<input type="button" class="btn btn-link pull-right hidden-phone" id="stopwatch" value="Disable Desktop Notifications for <?= ucfirst($whereiam)?>"></input>
		  	<input id="where" type="hidden" value="<?= $whereiam ?>"></input>
		  <?php }?>
		  </div>
        <ul class="nav">
        <?php foreach($navigation as $nav){?>
        		<li class="<?= ($whereiam == str_replace('-', '', $nav))?'active':NULL; ?>"><a href="<?= base_url() ?><?= str_replace('-', '', $nav) ?>" class="" data-placement="bottom" title="<?= ucfirst($nav) ?>"><?= ucfirst($nav) ?></a></li>
        <?php }?>
            </ul>
      </div>
        </div>
  </div>
    </div>
           
<!-- END HEADER --> 

