<? include_once("header.php");?>

<body class="body_home slider">
<script src="<?php echo base_url(); ?>assets/js/jquery.textarea-expander.js"></script>
<div class="jumbotron palette palette-carrot">
        <h1>Tus Medallas</h1>
        <p class="lead">Esta es la colección de medallas que has conseguido con tu esfuerzo. Sigue juntando!</p>
<? 
$count = 0;
foreach($rewards as $re) {
	if($count%3 ==0){
 ?>
<? if($count!=0)echo "</div>"; ?>
<div class="row">
	<? } ?>
  <div class="col-md-4">
<img src="<?=$re['image']?>" alt="..." class="img-circle">
<h5><?=$re['title']?></h5>
<p><?=$re['description']?></p>
</div>
<? } ?>
</div>
<div id="fireContainer"></div>
"Data provided by Marvel. © 2014 Marvel"
</body>
</html>
