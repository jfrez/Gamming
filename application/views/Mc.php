<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/ChallengeHandler/MCanswer/1" method="POST">
		 <h2 class="demo-section-title"><?=$challenge['title']?></h2>
                    <div class="row">
		    <div class="col-md-8">
			<p><?=$challenge['description']?></p>		<input type="hidden" name="ch" value="<?=$challenge['id']?>"/>	
			</div>


		    </div> <!-- /row -->
                    <div class="row">
		    <div class="col-md-8">
		    	<? foreach($choices as $ch) { ?>
			<label class="radio">
            		<input type="radio" name="choice" id="choice<?=$ch['id']?>" value="<?=$ch['id']?>" data-toggle="radio" class="custom-radio"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span><code><?=$ch['choice']?></code>
          		</label>
			<? } ?>

		   </div> <!-- /row -->
		    </div> <!-- /row -->
	
	<hr /> 
                    <div class="row">
		   		<div class="col-xs-3">
		        	  <input type="submit" class="btn btn-block btn-lg btn-primary" value="Check">
			        </div> 
		


			</div> <!-- /row --> 
		</form>
	</div>
	</div>
	<!-- wrapper ends here -->


<script>
	Cufon.now();     
</script>

</body>
</html>
