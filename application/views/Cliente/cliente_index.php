<div class="row">
	<div class="col-3">
		<h5> GESTION DEL CLIENTE</h5>
	</div>
	<div class="col-md-4">
		<div class="btn btn-success" id="agregarCliente">Agregar</div>
	</div>


</div>

<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
		<thead>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Direccion</th>
		<th>Acciones</th>

		</thead>
		<tfoot>
		<th>Nombre</th>
		<th>Apellidos</th>
		<th>Direccion</th>

		</tfoot>
		<tbody>
		<?php
		foreach ($clientes as $value) {

			echo "<tr>
						<td>$value->nombres</td>
						<td>$value->apellidos</td>
						<td>$value->direccion</td>
						<td>
							<div class='btn btn-primary editarCliente' id=''>Editar</div>
						</td>
				</tr>";
		}
		?>
		</tbody>
	</table>
</div>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
	Launch demo modal
</button>

<!-- Modal insercionCliente-->
<div class="modal fade" id="frmAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">AGREGAR CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" method="post">


				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" name="cmdGuardarCliente" class="btn btn-primary">Save client</button>
			</div>
		</div>
	</div>
</div>
