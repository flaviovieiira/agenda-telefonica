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
    <a class="navbar-brand" href="#">Lista Telefonica</a>
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
  
  <h3 class="page-header">Adicionar Item</h3>


  <div class="row">
	<?php
		if ($errors) {
			echo '<ul class="errors">';
			foreach ($errors as $field => $error) {
				echo '<li>' . htmlentities($error) . '</li>';
			}
			echo '</ul>';
		}
	?>
</div>

  <form id="agendaForm" name="agendaForm" action=""  data-toggle="validator" method="post" role="form">
  	<div class="row">
  	  <div class="form-group col-md-4">
  	  	<label>Nome</label>
  	  	<input type="text" class="form-control" name="name" placeholder="Digite o nome" autofocus value="<?php echo htmlentities($name); ?>"> 
		<span class="help-inline"></span>
  	  </div>
	  <div class="form-group col-md-4">
  	  	<label for="inputEmail">Email</label>
  	  	<input id="inputEmail" type="text" class="form-control" name="email" placeholder="Digite o email" value="<?php echo htmlentities($email); ?>">
	</div>
	  <div class="form-group col-md-4">
  	  	<label>Telefone</label>
  	  	<input type="text" class="form-control" name="mobile" placeholder="Digite o telefone" value="<?php echo htmlentities($mobile); ?>">
			<span class="help-inline"></span>		
		</div>
	</div>
	
	<hr />

	<div class="row">
	  <div class="col-md-12">
	  <div class="form-actions">
	  	<input type="hidden" name="form-submitted" value="1">
	  	<button type="submit" class="btn btn-primary">Salvar</button>
		<a href="/" class="btn btn-default">Cancelar</a>
	  </div>
	  </div>
	</div>

  </form>
 </div>
 
 <script src="public/js/jquery.min.js"></script>
 <script src="public/js/bootstrap.min.js"></script>

<!-- Mask Input Validator -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery.maskedinput/1.4.1/jquery.maskedinput.min.js"></script>

<!-- script page -->
<script src="public/js/novoContato.js"></script>
</body>
</html>