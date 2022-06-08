<div class="row">
	<div class="col-5">
		<h5> GESTION DEL GRADOS Y MATERIAS</h5>
	</div>
</div>
<div class="row">
	<!-- Boton para agregar cliente -->
	<div class="col-3">
		<div class="btn btn-success" id="btn_agregrar_materiasxalumnos">Agregar grado con materias</div>
	</div>
</div>

<br>
<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
		<thead>
			<th>#</th>
			<th>Grados</th>
			<th>Materias</th>
			<th>Acciones</th>

		</thead>
		<tfoot>
			<th>#</th>
			<th>Grados</th>
			<th>Materias</th>
			<th>Acciones</th>
		</tfoot>
		<tbody>
			<?php
			foreach ($mxg_materiasxgrado as $value) {
		?>
			<tr>
				<td><?=$value->GRD_ID ?></td>
				<td><?=$value->GRD_NOMBRE ?></td>
				<td><?=$value->MATERIAS ?></td>
				<td>
					<div class='btn btn-primary editarmxg_materiasxgrado' id='<?=$value->GRD_ID ?>'>Ver</div>
				</td>
			</tr>
			<?php
			}
		?>
		</tbody>
	</table>
</div>
<!--MODAL PARA GUARDAR MATERIAS EN CADA GRADO QUE SE DESEE-->
<div class="modal fade" id="frm_agregar_gradosxmaterias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Agregar materias a un grado</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Gradosxmaterias/agregar_mxg_materiasxgrado" method="POST" id="FrmGradosMaterias">
					<div class="row">
						<div class="form-column col-md-6">
							<div class=" form-group">
								<label>Grado</label>
								<select name="slcGrado" id="" class="form-control" required>
									<option value="">Grados</option>

									<?php
									foreach ($grado as  $value) {
									?>
									<option value="<?=$value->GRD_ID ?>"><?=$value->GRD_NOMBRE ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Materias</label>
								<select name="sclMaterias" id="" class="form-control" required>
									<option value="">Materias</option>
									<?php
									foreach ($materias as  $value) {
									?>
									<option value="<?=$value->MAT_ID ?>"><?=$value->MAT_NOMBRE ?></option>
									<?php
									}
									?>
								</select>
							</div>
						</div>

					</div>
					<button type="submit" name="cmdGuardarCliente" class="btn btn-primary">Guardar Alumno</button>
				</form>
			</div>

		</div>
	</div>
</div>

<!--MODAL PARA EDITAR GRADO-->
<div class="modal fade" id="frm_editar_gradosxmaterias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Grado con sus materias</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="table-responsive">
					<table class="table table-bordered" width="100%" cellpadding="0" id="table_materias">
						
						<tbody>
							<!--AQUI SE MUESTRA LA INFORMACION-->
						</tbody>
					</table>
				</div>
			</div>

		</div>
	</div>
</div>
