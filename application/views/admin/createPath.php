<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/Admin/CreatePathSubmit" method="POST">
		 <h2 class="demo-section-title">Create Path</h2>
                    <div class="row">
		    <div class="col-xs-3">
				<label for="title">Path's Name</label><input type="text" name="title" />
			</div>
		    <div class="col-xs-3">
			<label for="world">Select a world</label>
			<select class="form-control select select-primary" data-toggle="select" name="world">
		            <option value="0">None</option>
				<? foreach($worlds as $world){ ?>
					 <option value="<?=$world['id']?>"><?=$world['title']?></option>
				<? } ?>

			
	                </select>
			</div>


		    </div> <!-- /row -->
	
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
