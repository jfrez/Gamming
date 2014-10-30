<!DOCTYPE html>
<html>
        <head>
                <title>King Size - portfolio with a fullscreen slider</title>
                <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
		<link href="<?php echo base_url(); ?>assets/FlatUI/dist/css/vendor/bootstrap.min.css" rel="stylesheet">
		<link href="<?php echo base_url(); ?>assets/FlatUI/dist/css/flat-ui.css" rel="stylesheet">
                <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script>
		 <script src="<?php echo base_url(); ?>assets/FlatUI/dist/js/flat-ui.min.js"></script>

<?php $user= ( $this->session->userdata('fb')); ?>

        </head>
<div class="row demo-row">
        <div class="col-xs-12">
          <nav class="navbar  navbar-default" role="navigation">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse-01">
                <span class="sr-only">Toggle navigation</span>
              </button>
              <a class="navbar-brand" href="<?php echo base_url(); ?>">UDPiler</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse-01">
              <ul class="nav navbar-nav navbar-left">
                <li><a href="<?php echo base_url(); ?>?/Main/index">PlayBox</a></li>
                <li ><a href="<?php echo base_url(); ?>?/Main/rewards" >Medallas<span class="navbar-unread">1</span></a> </li>
                <li><a href="<?php echo base_url(); ?>?/Compiler/">Compilador</a></li>
               </ul>
              <ul class="nav navbar-nav navbar-right">
		<? if(isset($user['id'])) { ?>
                <li >
                  <a href="<?php echo base_url(); ?>?/Profile/info" > <img width="30px" src="http://graph.facebook.com/<?=$user['id']?>/picture" ><?=$user['name']?></a>

                </li>
                <li >
                  <a href="<?php echo base_url(); ?>?/Profile/logout" >Salir</a>
                </li>
		<? }else{ ?>
                <li >
                  <a href="<?php echo base_url(); ?>?/Profile/login" >Ingresar</a>
                </li>
		<? } ?>
               </ul>

		 </div><!-- /.navbar-collapse -->
          </nav><!-- /navbar -->
        </div>
      </div>
<div class="row demo-row">

        <div class="col-xs-1"></div>
        <div class="col-xs-10">
