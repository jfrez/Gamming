<? include_once("header.php");?>
<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
		
	     <!-- Navigation starts here -->	 
		<div id="menu_wrap">
			
			<!-- Menu starts here -->
			<div id="menu">
		    	
				<!-- Logo -->
		      	<div id="logo">   
			        <h1><a href="index.html" class="logo_image"></a></h1>      
		      	</div>
		      	<!-- Logo ends here -->
		      
		      	
		      	<!-- Navbar -->
			

			<!-- Navbar ends here -->
			    	       
		    </div>
		    <!-- Menu ends here -->
		    
		    <!-- Hide menu arrow -->
		    <div id="hide_menu">   
		        	<!-- Hide menu tooltip - remove if you don't need it! -->
		    </div>   		     
		    <!-- Hide menu arrow ends here -->
		       
		</div>
		<!-- Navigation ends here -->
	        

<?
foreach($tree as $w){
		if(is_array($w)){
?>
	<div class="panel panel-primary">
	<div class="panel-heading">
	<h3 class="panel-title"><?=$w['title'] ?></h3>
	</div>
	<div class="panel-body">
				<?
	foreach($w as $p){
		if(is_array($p)){
		?>
		 <div class="panel panel-success">
                 <div class="panel-heading">
                 <h3 class="panel-title"><?= $p['title'] ?></h3>
                 </div>
                 <div class="panel-body">
		<?
		foreach($p as $l){
		if(is_array($l)){
			 ?>
	                 <div class="panel panel-info">
        	         <div class="panel-heading">
                	 <h3 class="panel-title"><?= $l['title'] ?></h3>
	                 </div>
        	         <div class="panel-body">
<?
			foreach($l as $c){
			if(is_array($c)){
?>
			<div class="pallete-item">
			<? if(isset($passed[$c['id']])) { ?>
	 <a style="color: #ecf0f1;" href="#">
			      <dl class="palette palette-nephritis">
			<span class="fui-check-circle">
			<?=$c['title']?></span></a>
			<? } else{ ?>
	 <a style="color: #ecf0f1;" href="<?php echo base_url(); ?>?/ChallengeHandler/<?=$c['type']?>/<?=$c['id']?>">
			      <dl class="palette palette-peter-river">
			<span>
		<?=$c['title']?></span></a>
			<? } ?>
              			</dl>
		      </div>

		<? } ?>
		<? } ?>
			</div>
			</div>
		<? } ?>
		<? } ?>
		</div>
		</div>
		<? } ?>
		<? } ?>
	</div>
	</div>
		<? } ?>
		<? } ?>
 
	</div>
	<!-- wrapper ends here -->



</body>
</html>
