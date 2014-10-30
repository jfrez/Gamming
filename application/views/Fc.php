<? include_once("header.php");?>

<body class="body_home slider">
 <link rel="stylesheet" href="//codemirror.net/lib/codemirror.css">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/fireworks.js/style/fireworks.css">
    <script src="http://codemirror.net/lib/codemirror.js"></script>
    <script src="http://codemirror.net/mode/clike/clike.js"></script>
    <script src="http://codemirror.net/addon/selection/active-line.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.textarea-expander.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fireworks.js/script/soundmanager2-nodebug-jsmin.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fireworks.js/script/fireworks.js"></script>
<style>
#noty{
  width: 100%;

}
#content{
margin:1%;
width:48%;
min-width:530px;
float:left;
}
#code2{
width:100%;
height:600px;
}
.ex{
background-color: white

}
</style>
<div id="fireworks-template">
 <div id="fw" class="firework"></div>
 <div id="fp" class="fireworkParticle"><img src="<?php echo base_url(); ?>assets/js/fireworks.js/image/particles.gif" alt="" /></div>
</div>

<div id="fireContainer"></div>


    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/ChallengeHandler/MCanswer/1" method="POST">
		 <h2 class="demo-section-title"><?=$challenge['title']?></h2>
                    <div class="row">
		    <div class="col-md-8">
			<p><?=$Fc['desc']?></p>		
			<input type="hidden" name="ch" id="ch" value="<?=$challenge['id']?>"/>	
			<input type="hidden" name="fc" id="fc" value="<?=$Fc['id']?>"/>	
			</div>


		    </div> <!-- /row -->
                    <div class="row">
		    <div class="col-md-8">
<textarea name="code" id="code2" rows="30" style="">
	<?=$Fc['code']?>
</textarea>

<textarea id="input" rows="1" class="form-control"  placeholder="Entrada de texto">
</textarea>
 <p id="file"></p> 
<div  id="noty"></div>
<script type="text/javascript">$("#input").TextAreaExpander();</script>
<a class="btn btn-primary" onClick="compile();" style="float:left;">Ejecutar</a>

		   </div> <!-- /row -->
		    </div> <!-- /row -->
	
	<hr /> 
		</form>
	</div>
	</div>
	<!-- wrapper ends here -->


<script>
var editor;
var widgets = [];
var lastcode= 1;
$(document).ready(function() {
 editor= CodeMirror.fromTextArea(document.getElementById("code2"), {     
  styleActiveLine: true,
     lineNumbers: true,
      matchBrackets: true,
      mode: "text/x-csrc",
  lineWrapping: true

            });
editor.setSize("100%","370px");
});
function compile(){
editor.save();

$.ajax({
type:"post",
url:"<?php echo base_url(); ?>?/Compiler/Fc",
data:{code:$("#code2").val(),input:$("#input").val(),fc: $("#fc").val(), ch:  $("#ch").val()},
success: function(data){
console.log(data);

editor.operation(function(){
    for (var i = 0; i < widgets.length; ++i)
      editor.removeLineWidget(widgets[i]);
  });
    widgets.length = 0;


//$( "#matrix" ).dialog( "open" );
var i=data.indexOf("error");
var error =false;

while(i>0){

var str =data.substr(i-10,i );
var arr=str.match(/[0-9]*/g);
var n;
  for(var j =0;j<arr.length;j++){
    if(parseInt(arr[j])>0){
    n = parseInt(arr[j])-2;
    break;
    }
  }

var line = n;

var x = i;
i=data.indexOf("error",x+1);
var f = i>0?i:data.length;
var txt = data.substr(x,f)

var msg = document.createElement("div");
     
      msg.appendChild(document.createTextNode(txt));
      msg.className = "alert alert-error";
widgets.push(editor.addLineWidget(line, msg));
error=true;
}

if(!error) noty(data);
else noty("Errores encontrados");
//save();
}
});
}
function notyappend(txt){

noty($("#txt").html()+txt);

}
function noty(txt){

$("#noty").html('<div class="alert alert-success" style="width:93%; margin-top:0; z-index:99000;">  <button type="button" class="close" data-dismiss="alert">&times;</button><p id="txt">'+txt+'</p></div>');

}
function happy(){
var r=4+parseInt(Math.random()*16);for(var i=r; i--;){setTimeout('createFirework(11,30,3,4,null,null,null,null,false,true);',(i+1)*(1+parseInt(Math.random()*1000)));}

}

</script>

</body>
</html>
