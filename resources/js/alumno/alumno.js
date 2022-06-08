$(document).ready(function () {
    //poner una funcion para mostrar el modal para agregar alumnos
    $(document).on("click", "#Btn_Agregar_Alumno", function () {
        $("#Frm_Agregar_Alumno").modal("show")

    })
    //AJAX PARA MOSTRAR EL MODAL Y A LA MISMA VES LLENAR EL MODAL
    $(document).on("click", ".editarAlumno", function () {
        //get codigo de estudiante
        var alm_id = $(this).attr("id");

        $.ajax({
            url: "Alumno/consultar_alumno",
            type: "POST",
            data: { id: alm_id }
        })
            .done(function (data) {
                console.log(data)

                var datos = JSON.parse(data)
                $("#ALM_ID").val(datos[0].ALM_ID)
                $("#txtCodigoE").val(datos[0].ALM_CODIGO)
                $("#txtNombreE").val(datos[0].ALM_NOMBRE)
                $("#txtEdadE").val(datos[0].ALM_EDAD)

                var sexo = datos[0].ALM_SEXO
                $("input[name=rdbSexo][value=" + sexo + "]").prop("checked",true);

                var grado = datos[0].ALM_ID_GRD
                console.log(grado)
                $("#sGradoE > option[value=" + grado + "]").attr("selected", true)//seleccionando posicion del select

                $("#txtObservacionesAlumnoE").val(datos[0].ALM_OBSERVACION)

                $("#Frm_Editar_Alumno").modal("show")
            })
            .fail(function () {
                console.log("Error ocn el ajax")
            })


    })
    //ajax para filtrar alumnos por medio de selecto
    $(document).ready(function () {
        $("#ALM_NOMBRE").on('change', function () {
            var value = $(this).val();//obtenemos el valor del select seleccionado
            //alert(values)

            $.ajax({
                url: "Alumno/consultar_alumno_select",
                type: "POST",
                data: { ALM_ID: value }
            })
                .done(function (data) {
                    console.log(data)
                    $("#dataTable tbody").html(data);
                })
                .fail(function () {
                    console.log("Error ocn el ajax")
                })
        })
    })

    $(document).on("click", ".borrarAlumno", function () {
        var alm_id = $(this).attr("id");

        Swal.fire({
            title: 'Desea eliminar el registro?',
            showDenyButton: true,
            
            confirmButtonText: 'Eliminar',
            denyButtonText: `Cancelar`,
        }).then((result) => {
            /* Read more about isConfirmed, isDenied below */
            if (result.isConfirmed) {
                $.ajax({
                    url: "Alumno/eliminar_alumno",
                    type: "POST",
                    data: { id: alm_id }
                })
                    .done(function (data) {
                        Swal.fire('Registro eliminado!', '', 'Eliminado')
                        setTimeout('document.location.reload()', 1000);

                    })
                    .fail(function () {
                        console.log("Error ocn el ajax")
                    })
            } else if (result.isDenied) {
                Swal.fire('Cambios no guardados', '', 'info')
            }
        })



    })
    //aqui guardamos el alumno
    $('#Guardar_Alumno').submit(function (ev) {
        $.ajax({
            type: $('#Guardar_Alumno').attr('method'),
            url: $('#Guardar_Alumno').attr('action'),
            data: $('#Guardar_Alumno').serialize(),
            success: function (data) {

                if(data){
                    Swal.fire({
                        position: '',
                        icon: 'success',
                        title: 'Guardado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout('document.location.reload()', 2000);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Al parecer el codigo del alumno que desea agregar ya existe',
                        footer: '<a href="">Why do I have this issue?</a>'
                      })
                }
            },
            default: function () {
                alert('Error en el ajax !!!');
            }
        });
        ev.preventDefault();
    });
    //aqui modificamos el alumno
    $('#ModificarAlumno').submit(function (ev) {
        $.ajax({
            type: $('#ModificarAlumno').attr('method'),
            url: $('#ModificarAlumno').attr('action'),
            data: $('#ModificarAlumno').serialize(),
            success: function (data) {

                if(data){
                    Swal.fire({
                        position: '',
                        icon: 'success',
                        title: 'Modificado',
                        showConfirmButton: false,
                        timer: 1500
                    })
                    setTimeout('document.location.reload()', 2000);
                }else{
                    Swal.fire({
                        icon: 'error',
                        title: 'Oops...',
                        text: 'Al parecer el codigo del alumno que desea editar ya existe',
                        footer: '<a href="">Why do I have this issue?</a>'
                      })
                }
            },
            default: function () {
                alert('Error en el ajax !!!');
            }
        });
        ev.preventDefault();
    });


    /*PROBANDO */

    document.addEventListener('DOMContentLoaded', function() {
        applyInputMask('elinput', '0--0*0 000_000');
      });

});