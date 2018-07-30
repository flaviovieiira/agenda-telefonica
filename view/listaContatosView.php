<!DOCTYPE html>
<html lang="pt-br">
<head>
 <meta charset="utf-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Agenda Telefonica</title>

 <link href="public/css/bootstrap.min.css" rel="stylesheet">
 <link href="public/css/style.css" rel="stylesheet">
 <link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">

<!-- Datatable / Bootstrap -->
<link href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css" rel="stylesheet">
 
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
    <a class="navbar-brand" href="#">Agenda Telefonica</a>
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

 <div id="main" class="container-fluid" style="margin-top: 50px">
 
 	<div id="top" class="row">
		<div class="col-sm-3">
			<h2>Contatos</h2>
		</div>
		<div class="col-sm-6">
		</div>
		<div class="col-sm-3">
			<a href="?op=new" class="btn btn-primary pull-right h2">Novo Item</a>
		</div>
	</div> <!-- /#top -->
 
 	<hr />
 	<div id="list" class="row">
	
	<div class="table-responsive col-md-12">
		<table id="example" class="table table-striped table-bordered" cellspacing="0" cellpadding="0">
			<thead>
				<tr>
					<th>Nome</th>
					<th>Email</th>
					<th>Celular</th>
					<th class="actions">Ações</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($contacts as $contact) : ?>
				<tr>
					<td><?= $contact->name; ?></td>
					<td><?= $contact->email; ?></td>
					<td><?= $contact->phone; ?></td>
					<td class="actions">
						<a class="btn btn-success btn-xs" href="index.php?op=show&id=<?php echo $contact->id; ?>">Visualizar</a>
						<a class="btn btn-warning btn-xs" href="index.php?op=edit&id=<?php echo $contact->id; ?>">Editar</a>
						<a class="open-excluirContato btn btn-danger btn-xs" data-delete-contato="<?php echo $contact->id; ?>"  href="#" onClick="ShowModal(this)" data-toggle="modal" data-target="#delete-modal">Excluir</a>
                    </td>
      
				<?php  endforeach;  ?>
				</tr>
			</tbody>
		</table>
	</div>
	
	</div> <!-- /#list -->
 </div> <!-- /#main -->


<!-- Modal -->
<div class="modal fade" id="delete-modal" tabindex="-1" role="dialog" aria-labelledby="modalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="modalLabel">Excluir Contato</h4>
      </div>
      <div class="modal-body">
        Deseja realmente excluir este contato?
      </div>
      <div class="modal-footer">
	<a id="acaoRemoverContato" class="btn btn-danger" href="#">Sim</a>
	<button type="button" class="btn btn-default" data-dismiss="modal">N&atilde;o</button>
      </div>
    </div>
  </div>
</div>

 <script src="public/js/jquery.min.js"></script>
 <script src="public/js/bootstrap.min.js"></script>
 <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.18/datatables.min.js"></script>
 <script src="public/js/agenda.js"></script>
</body>
</html>
