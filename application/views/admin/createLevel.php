<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/Admin/CreateLevelSubmit" method="POST">
		 <h2 class="demo-section-title">Create Level</h2>
                    <div class="row">
		    <div class="col-xs-3">
				<label for="title">Level's Name</label><input type="text" name="title" />
			</div>
		    <div class="col-xs-3">
			<label for="path">Select a Path</label>
			<select class="form-control select select-primary" data-toggle="select" name="path">
		            <option value="0">None</option>
				<? foreach($paths as $path){ ?>
					 <option value="<?=$path['id']?>"><?=$path['title']?></option>
				<? } ?>

			
	                </select>
			</div>


		    </div> <!-- /row -->
	
	<hr /> 
                    <div class="row">
                    
		    <div class="col-md-6">
				<label for="desc">Description</label><br>
			<textarea name="desc" cols=80 rows=10></textarea>
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
