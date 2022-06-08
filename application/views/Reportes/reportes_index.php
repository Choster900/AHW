<div class="row">
    <div class="col-2">
        <h5>Reportes</h5>
    </div>
</div>
<div class="row">
    <div class="col-3">
        <table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
            <thead>
                <th>Grado</th>
                <th>Mujeres</th>
                <th>Hombres</th>
            </thead>
            <tfoot>
                <?php
                foreach ($cant_h_m as $value) {
                ?>
                    <tr>
                        <th>Total</th>
                        <th><?= $value->FEMENINO ?></th>
                        <th><?= $value->MASCULINO ?></th>

                    </tr>
                <?php
                }
                ?>
            </tfoot>
            <tbody>
                <?php
                foreach ($cant_generos_grados as $value) {
                ?>
                    <tr>
                        <td><?= $value->GRD_NOMBRE ?></td>
                        <td><?= $value->FEMENINO ?></td>
                        <td><?= $value->MASCULINO ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
    <div class="col-4">
        <table class="table table-bordered" width="100%" cellpadding="0" id="dataTable">
            <thead>
                <th>Grado</th>
                <th>Mayor de edad</th>
                <th>Menor de edad</th>
            </thead>
            <tfoot>
                <?php
                foreach ($tot_mayor_edad as $value) {
                ?>
                    <tr>
                        <th>Total</th>
                        <th><?= $value->Mayores_edad ?></th>
                        <th><?= $value->Menores_edad ?></th>

                    </tr>
                <?php
                }
                ?>
            </tfoot>
            <tbody>
                <?php
                foreach ($cant_mayor_edad as $value) {
                ?>
                    <tr>
                        <td><?= $value->GRD_NOMBRE ?></td>
                        <td><?= $value->Mayores_edad ?></td>
                        <td><?= $value->Menores_edad ?></td>

                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>

</div>