<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>CRUD com Bootstrap 3</title>

 <link href="public/css/bootstrap.min.css" rel="stylesheet">
 <link href="public/css/style.css" rel="stylesheet">
</head>
<body>

 <nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
   <div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
     <span class="sr-only">Toggle navigation</span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
     <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">Web Dev Academy</a>
   </div>
   <div id="navbar" class="navbar-collapse collapse">
    <ul class="nav navbar-nav navbar-right">
    <li><a href="/">In&iacute;cio</a></li>
     <li><a href="view/dash.html">Perfil</a></li>
     <li><a href="#">Ajuda</a></li>
    </ul>
   </div>
  </div>
 </nav>

 <div id="main" class="container-fluid">
  <h3 class="page-header">Visualizando Item #<?php echo $contact->id; ?></h3>
  
  <div class="row">
    <div class="col-md-4">
      <p><strong>Nome</strong></p>
  	  <p><?php echo $contact->name; ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Email</strong></p>
  	  <p><?php echo $contact->email; ?></p>
    </div>
	
	<div class="col-md-4">
      <p><strong>Celular</strong></p>
  	  <p><?php echo $contact->phone; ?></p>
    </div>
 </div>
 
 <hr />
 <div id="actions" class="row">
   <div class="col-md-12">
     <a href="edit.html" class="btn btn-primary">Editar</a>
	 <a href="/" class="btn btn-default">Fechar</a>
   </div>
 </div>
 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>

</body>
</html>