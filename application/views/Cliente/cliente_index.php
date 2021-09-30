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
							<div class='btn btn-primary editarCliente' id='$value->id'>Editar</div>
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
<div class="modal fade" id="frmAgregar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">AGREGAR CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Cliente/save_cliente" method="post">
					<div class="row">
						<div class="form-column col-md-6">
							<div class=" form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" id="nombre" class="form-control">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Apellido</label>
								<input type="text" name="Apellido" id="Apellido" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Direccion</label>
								<input type="text" name="Direccion" id="Direccion" class="form-control">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Telefonoo</label>
								<input type="text" name="Telefonoo" id="Telefonoo" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>

						<div class="form-column col-md-6">
							<div class="form-group">
								<label>email</label>
								<input type="email" name="email" id="email" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" name="cmdGuardarCliente" class="btn btn-primary">Save client</button>
				</form>
			</div>

		</div>
	</div>
</div>
<!-- Modal modificarCliente-->
<div class="modal fade" id="frmModificar" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	 aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">MODIFICAR CLIENTE</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Cliente/update_cliente" method="post">
					<div class="row">
						<div class="form-column col-md-6">
							<input type="hidden" name="idCLiente" id="idCliente">
							<div class=" form-group">
								<label>Nombre</label>
								<input type="text" name="nombre" id="nombreE" class="form-control">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Apellido</label>
								<input type="text" name="Apellido" id="ApellidoE" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Direccion</label>
								<input type="text" name="Direccion" id="DireccionE" class="form-control">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Telefono</label>
								<input type="text" name="Telefono" id="TelefonoE" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>

						<div class="form-column col-md-6">
							<div class="form-group">
								<label>email</label>
								<input type="email" name="email" id="emailE" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" name="cmdEditarCliente" class="btn btn-primary">Editar client</button>
				</form>
			</div>

		</div>
	</div>
</div>
