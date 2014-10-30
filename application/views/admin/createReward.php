<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/Admin/CreateRewardSubmit" method="POST">
		 <h2 class="demo-section-title">Create Reward</h2>
                    <div class="row">
		    <div class="col-xs-3">
				<label for="title">Reward's Name</label><input type="text" name="title" />
			</div>
		    </div>
		   	<hr /> 
                    <div class="row">
                    
		    <div class="col-md-6">
				<label for="desc">Description</label><br>
			<textarea name="desc" cols=80 rows=10></textarea>
			</div>


			</div> <!-- /row --> 
                    <div class="row">
		    <div class="col-xs-3">
				<label for="icon">icon</label><input type="text" name="icon" />
			</div>
		    </div>
		   	<hr /> 
                    <div class="row">
		    <div class="col-xs-3">
				<label for="image">icon</label><input type="text" name="image" />
			</div>
		    </div>
		   	<hr /> 
	<hr /> 
		    <div class="row">
		   		<div class="col-xs-3">
		        	  <input type="submit" class="btn btn-block btn-lg btn-primary" value="Save">
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
