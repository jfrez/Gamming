<? include_once("header.php");?>

<body class="body_home slider">
 <link rel="stylesheet" href="//codemirror.net/lib/codemirror.css">
    <script src="http://codemirror.net/lib/codemirror.js"></script>
    <script src="http://codemirror.net/mode/clike/clike.js"></script>
    <script src="http://codemirror.net/addon/selection/active-line.js"></script>
<script src="<?php echo base_url(); ?>assets/js/jquery.textarea-expander.js"></script>
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


    <!-- Wrapper starts here -->
	<div id="wrapper">
	          <div class="container">
		<form action="<?php echo base_url(); ?>?/ChallengeHandler/MCanswer/1" method="POST">
		 <h2 class="demo-section-title">Compilador - C++</h2>
                    <div class="row">
		    <div class="col-md-8">
			</div>


		    </div> <!-- /row -->
                    <div class="row">
		    <div class="col-md-12">
<textarea name="code" id="code2" rows="50" cols=30 style="">

   #include <iostream>
   using namespace std;

   int main()
   {
      cout << "Hola Mundo"; 
      return 0;
   }

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
editor.setSize("100%","470px");
});
function compile(){
editor.save();

$.ajax({
type:"post",
url:"<?php echo base_url(); ?>?/Compiler/compile",
data:{code:$("#code2").val(),input:$("#input").val()},
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

</script>

</body>
</html>
