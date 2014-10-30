<? include_once("header.php");?>

<body class="body_home slider">
 <link rel="stylesheet" href="<?php echo base_url(); ?>assets/js/fireworks.js/style/fireworks.css">
<script src="<?php echo base_url(); ?>assets/js/jquery.textarea-expander.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fireworks.js/script/soundmanager2-nodebug-jsmin.js"></script>
<script src="<?php echo base_url(); ?>assets/js/fireworks.js/script/fireworks.js"></script>
<div id="fireworks-template">
 <div id="fw" class="firework"></div>
 <div id="fp" class="fireworkParticle"><img src="<?php echo base_url(); ?>assets/js/fireworks.js/image/particles.gif" alt="" /></div>
</div>
<div class="jumbotron">
        <h1>Felicidades!</h1>
        <p class="lead">Has pasado esta prueba!, puedes seguir con las siguientes!. Tambien has obtenido la siguiente medalla:</p>
	<center><img src="<?=$reward['image']?>" alt="..." class="img-circle"></center>
        <p><a class="btn btn-lg btn-success" href="<?php echo base_url(); ?>?/main" role="button">Continuar</a></p>
      </div>
<div id="fireContainer"></div>
<script>
function happy(){
var r=4+parseInt(Math.random()*16);for(var i=r; i--;){setTimeout('createFirework(11,30,3,4,null,null,null,null,false,true);',(i+1)*(1+parseInt(Math.random()*1000)));}

}
happy();
</script>

</body>
</html>
