<div class="row">
	<div class="col-3">
		<h5> GESTION DEL ALUMNOS</h5>
	</div>
</div>
<div class="row">
	<!-- Select mostrando todos los alumnos -->
	<div class="col-3">
		<select name="" id="ALM_NOMBRE" class="form-control">
			<option value="0">Todos</option>
			<?php
			foreach ($alm_alumno as $value) {
				echo "<option value='$value->ALM_ID'>$value->ALM_NOMBRE</option>";
			}
			?>
		</select>
		<br>
	</div>
	<!-- Boton para agregar cliente -->
	<div class="col-3">
		<div class="btn btn-success" id="Btn_Agregar_Alumno">Agregar</div>
		<br>
	</div>

</div>


<div class="table-responsive">
	<table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
		<thead>
			<th>#</th>
			<th>Alumno</th>
			<th>Grado</th>
			<th>Materia</th>
			<th>Accion</th>

		</thead>
		<tfoot>
			<th>#</th>
			<th>Alumno</th>
			<th>Grado</th>
			<th>Materia</th>
			<th>Accion</th>

		</tfoot>
		<tbody>
			<?php
			foreach ($alm_alumno as $values) {
			?>
				<tr>
					<td><?= $values->ALM_ID ?></td>
					<td><?= $values->ALM_NOMBRE ?></td>
					<td><?= $values->GRD_NOMBRE ?></td>
					<td><?= $values->MATERIAS ?></td>
					<td>
						<div class='btn btn-primary editarAlumno' id='<?= $values->ALM_ID ?>'>Ver</div>
						<div class='btn btn-danger borrarAlumno' id='<?= $values->ALM_ID ?>'>Borrar</div>
					</td>
				</tr>
			<?php
			}
			?>
		</tbody>
	</table>
</div>

<!-- Modal para guardar alumno-->
<div class="modal fade" id="Frm_Agregar_Alumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">AGREGAR ALUMNO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="Alumno/agregar_alumno" method="POST" id="Guardar_Alumno">
					<div class="row">
						<div class="form-column col-md-6">
							<div class=" form-group">
								<label>Codigo alumno</label>
								<input type="text" name="txtCodeAlumno" id="txtCodeAlumno" class="form-control" required>

							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Nombre alumno</label>
								<input type="text" name="txtNombreAlumno" id="txtNombreAlumno" class="form-control" required>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Edad</label>
								<input type="number" min="0" name="txtEdadAlumno" id="txtEdadAlumno" class="form-control" required>
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Sexo</label>
								<div class="form-check">
									<input class="form-check-input" value="Masculino" type="radio" name="rdbSexo" id="Masculino">
									<label class="form-check-label" for="Masculino">
										Masculino
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" value="Femenino" type="radio" name="rdbSexo" id="Femenino" checked>
									<label class="form-check-label" for="Femenino">
										Femenino
									</label>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>

						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Grado</label>
								<select name="sGrado" id="" class="form-control" required>
									<option value="">Grado</option>
									<?php
									foreach ($grd_grado as $value) {
										echo "<option value='$value->GRD_ID'>$value->GRD_NOMBRE</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Observaciones</label>
								<input type="text" name="txtObservacionesAlumno" id="txtObservacionesAlumno" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" name="cmdGuardarCliente" class="btn btn-primary">Guardar Alumno</button>
				</form>

			</div>

		</div>
	</div>
</div>

<!-- Modal para editar alumno-->
<div class="modal fade" id="Frm_Editar_Alumno" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">EDITAR ALUMNO</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<form action="Alumno/actualizar_alumno" method="POST" id="ModificarAlumno">
					<div class="row">
						<div class="form-column col-md-6">
							<div class=" form-group">
								<input type="hidden" name="ALM_ID" id="ALM_ID">
								<label>Codigo alumno</label>
								<input type="text" name="txtCodeAlumno" id="txtCodigoE" class="form-control ">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Nombre alumno</label>
								<input type="text" name="txtNombreAlumno" id="txtNombreE" class="form-control">
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Edad</label>
								<input type="number" min="0" name="txtEdadAlumno" id="txtEdadE" class="form-control">
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Sexo</label>
								<div class="form-check">
									<input class="form-check-input" value="Masculino" type="radio" name="rdbSexo" id="Masculino">
									<label class="form-check-label" for="Masculino">
										Masculino
									</label>
								</div>
								<div class="form-check">
									<input class="form-check-input" value="Femenino" type="radio" name="rdbSexo" id="Femenino" checked>
									<label class="form-check-label" for="Femenino">
										Femenino
									</label>
								</div>
							</div>
						</div>
						<div class="clearfix"></div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Grado</label>
								<select name="sGradoE" id="sGradoE" class="form-control">
									<option value="0">Grado</option>
									<?php
									foreach ($grd_grado as $value) {
										echo "<option value='$value->GRD_ID'>$value->GRD_NOMBRE</option>";
									}
									?>
								</select>
							</div>
						</div>
						<div class="form-column col-md-6">
							<div class="form-group">
								<label>Observaciones</label>
								<input type="text" name="txtObservacionesAlumno" id="txtObservacionesAlumnoE" class="form-control">
							</div>
						</div>
					</div>
					<button type="submit" name="btnEditarAlumno" class="btn btn-primary">Editar Alumno</button>
				</form>
			</div>

		</div>
	</div>
</div>