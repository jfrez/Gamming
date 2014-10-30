<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/Admin/CreateChallengeSubmit" method="POST">
		 <h2 class="demo-section-title">Create Challenge</h2>
                    <div class="row">
		    <div class="col-xs-3">
				<label for="title">Challenge's Name</label><input type="text" name="title" />
			</div>
		    <div class="col-xs-3">
			<label for="level">Select a level</label>
			<select class="form-control select select-primary" data-toggle="select" name="level">
		            <option value="0">None</option>
				<? foreach($levels as $level){ ?>
					 <option value="<?=$level['id']?>"><?=$level['title']?></option>
				<? } ?>
	                </select>
			</div>


		    </div> <!-- /row -->
	
        <hr />
	      <div class="row">

                    <div class="col-md-6">
                        </div>


                        </div> <!-- /row -->
<hr />
	      <div class="row">

                    <div class="col-md-6">
                                <label for="type">Type</label><br>
			<select class="form-control select select-primary" data-toggle="select" name="type">
		            <option value="MC">Multiple Choice</option>
		            <option value="CT">Compile & Test</option>
		            <option value="FC">Fix Code</option>
	                </select>
                        </div>


                        </div> <!-- /row -->
<hr />
	      <div class="row">

                    <div class="col-md-6">
                                <label for="reward">Reward</label><br>
			<select class="form-control select select-primary" data-toggle="select" name="reward">
		            <option value="0">None</option>
				<? foreach($rewards as $reward){ ?>
					 <option value="<?=$reward['id']?>"><?=$reward['title']?></option>
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


	<hr /> 


		</form>
	</div>
	</div>
	<!-- wrapper ends here -->


<script>
	Cufon.now();     
</script>

</body>
</html>
