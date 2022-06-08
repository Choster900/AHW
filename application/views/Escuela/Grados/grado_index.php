<div class="row">
    <div class="col-sm-12 col-md-6">
        <h5> GESTION DEL GRADOS</h5>
    </div>
    <div class="col-sm-12 col-md-6">
        <h5> GESTION DEL MATERIAS</h5>
    </div>
</div>

<div class="row">
    <!-- Select mostrando todos los alumnos -->
    <div class="col-6">
        <div class="btn btn-success" id="btn_aagregar_grados">Agregar mas grados a la escuela</div>
        <br>
    </div>
    <!-- Boton para agregar cliente -->
    <div class="col-6">
        <div class="btn btn-success" id="btn_agregar_materias">Agregar mas materias</div>
        <br>
    </div>
</div>
<br>
<div class="row">
    <div class="col-6">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>Grado</th>
                    <th>Acciones</th>
                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Grado</th>
                    <th>Acciones</th>

                </tfoot>
                <tbody>
                    <?php
                    foreach ($grados as $values) {
                    ?>
                        <tr>
                            <td><?= $values->GRD_ID ?></td>
                            <td><?= $values->GRD_NOMBRE ?></td>
                            <td>
                                <div class='btn btn-primary editarGrado' id='<?= $values->GRD_ID ?>'>Ver</div>
                                <div class='btn btn-danger borrarGrado' id='<?= $values->GRD_ID ?>'>Borrar</div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-6">
        <div class="table-responsive">
            <table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
                <thead>
                    <th>#</th>
                    <th>Materia</th>
                    <th>Acciones</th>

                </thead>
                <tfoot>
                    <th>#</th>
                    <th>Materia</th>
                    <th>Acciones</th>

                </tfoot>
                <tbody>
                    <?php
                    foreach ($materias as $values) {
                    ?>
                        <tr>
                            <td><?= $values->MAT_ID ?></td>
                            <td><?= $values->MAT_NOMBRE ?></td>
                            <td>
                                <div class='btn btn-primary editarMaterias' id='<?= $values->MAT_ID ?>'>Ver</div>
                                <div class='btn btn-danger borrarMaterias' id='<?= $values->MAT_ID ?>'>Borrar</div>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--modal para guardar Grados-->
<div class="modal fade" id="frm_agregar_grados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agrega mas grados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellpadding="0" id="table_materias">

                        <tbody>
                            <form action="Grados/agregar_grados" method="POST" id="frmAgreggarGrado">
                                <div class="row">
                                    <div class="form-column col-md-6">
                                        <div class=" form-group">
                                            <input type="text" placeholder="Nombre del grado" name="txtNombreGrado" id="txtNombreGrado" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-column col-md-6">
                                        <button type="submit" name="btnGuardarGrado" class="btn btn-primary">Guardar</button>
                                    </div>
                                </div>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal para editar Grados-->
<div class="modal fade" id="frm_editar_grados" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar grados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellpadding="0" id="table_materias">
                        <tbody>
                            <form action="Grados/editar_grado" method="POST" id="frmModificarGrado">
                                <div class="row">
                                    <div class="form-column col-md-6">
                                        <div class=" form-group">
                                            <input type="hidden" name="txtCodigo" id="txtCodigo">
                                            <input type="text" placeholder="Nombre del  grado" name="txtNombreGrado" id="txtNombreGradoE" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-column col-md-6">
                                        <button type="submit" name="btnGuardarGrado" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal para Guardar Materias-->
<div class="modal fade" id="frm_agregar_materias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar grados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellpadding="0" id="table_materias">
                        <tbody>
                            <form action="Materias/agregar_materias" method="POST" id="frmAgregarMateria">
                                <div class="row">
                                    <div class="form-column col-md-6">
                                        <div class=" form-group">
                                            <input type="text" placeholder="Nombre de la materias" name="txtNombreMateria" id="txtNombreMateria" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-column col-md-6">
                                        <button type="submit" name="btnGuardarGrado" class="btn btn-primary">Agregar</button>
                                    </div>
                                </div>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--modal para editar Grados-->
<div class="modal fade" id="frm_editar_materias" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar grados</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table table-bordered" width="100%" cellpadding="0" id="table_materias">
                        <tbody>
                            <form action="Materias/editar_materia" method="POST" id="frmModificarMaterias">
                                <div class="row">
                                    <div class="form-column col-md-6">
                                        <div class=" form-group">
                                            <input type="hidden" name="txtCodigoMat" id="txtCodigoMat">
                                            <input type="text" placeholder="Nombre de la materia" name="txtNombreMat" id="txtNombreMat" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="form-column col-md-6">
                                        <button type="submit" name="btnGuardarGrado" class="btn btn-primary">Editar</button>
                                    </div>
                                </div>
                            </form>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>