<? include_once("header.php");?>

<body class="body_home slider">

    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/Admin/CreateFCSubmit" method="POST">
		 <h2 class="demo-section-title">Create Compile & Test</h2>
                    <div class="row">
		    <div class="col-xs-3">
			</div>
		    <div class="col-xs-3">
			<input type="hidden" name="ch" id="ch" value="<?=$challenge?>" />
			</div>


		    </div> <!-- /row -->
	
        <hr />
	      <div class="row">

                    <div class="col-md-12">
                                <label for="desc">Description</label><br>
                        <textarea name="desc" cols=80 rows=10 class="col-md-12 form-control"></textarea>
                        </div>


                        </div> <!-- /row -->
        <hr />
	      <div class="row">

                    <div class="col-md-12">
                                <label for="desc">Code to Fix</label><br>
                        <textarea name="code" cols=80 rows=10 class="col-md-12 form-control"></textarea>
                        </div>


                        </div> <!-- /row -->
        <hr />
	      <div class="row">

                    <div class="col-md-12">
                                <label for="desc">Input</label><br>
                        <textarea name="input" cols=80 rows=10 class="col-md-12 form-control"></textarea>
                        </div>


                        </div> <!-- /row -->
        <hr />
	      <div class="row">

                    <div class="col-md-12">
                                <label for="desc">Output</label><br>
                        <textarea name="output" cols=80 rows=10 class="col-md-12 form-control"></textarea>
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
var mc = Array();
$(function(){
if ($('[data-toggle="switch"]').length) {
      $('[data-toggle="switch"]').bootstrapSwitch();
    }
function add(){
	var data = {};
	data.text = $("#choice").val();
	data.correct = $("#correct").is(':checked');
	mc.push(data);
	 tablerefresh();
	$("#choices").val(JSON.stringify(mc));
}
function tablerefresh(){
$("#alternatives").html("");	

	for(var c in mc){
	$("#alternatives").append('<tr><td class="pbm">'+mc[c].text+'</td><td>'+mc[c].correct+'</td></tr>');
	}
}
$("#add").click(add);












});
</script>

</body>
</html>
