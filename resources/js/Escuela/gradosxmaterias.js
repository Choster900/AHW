$(document).ready(function () {
	//mostrar modal cuando le de al boton agregar 
	$(document).on("click", "#btn_agregrar_materiasxalumnos", function () {
		$("#frm_agregar_gradosxmaterias").modal("show")

	})
	//envia informacion el formulario de agregar y valida si el metodo de agregar retorna un valor
	//booleano y asi mostrar un alert donde dice si existe o no el registro
	$('#FrmGradosMaterias').submit(function (ev) {
		$.ajax({
			type: $('#FrmGradosMaterias').attr('method'),
			url: $('#FrmGradosMaterias').attr('action'),
			data: $('#FrmGradosMaterias').serialize(),
			success: function (data) {
				if (data == true) {
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Materia ya existe en esa materia!',
						footer: '<a href="">Why do I have this issue?</a>'
					})
				} else {
					Swal.fire({
						position: '',
						icon: 'success',
						title: 'Materia registrado en grado correctamente',
						showConfirmButton: false,
						timer: 1500
					})
					setTimeout('document.location.reload()', 2000);
				}
			},
			default: function () {
				alert('Error en el ajax !!!');
			}
		});
		ev.preventDefault();
	});
	//cuando le de al boton de editar vamos a mostrar un modal
	$(document).on("click", ".editarAlumno", function () {

	})

    $(document).on("click",".editarmxg_materiasxgrado",function () {
        var mxg_id = $(this).attr("id")
        
        $.ajax({
            type: "POST",
            url: "Gradosxmaterias/consultar_materias_de_grado",
            data: {codigo:mxg_id},
            success: function (data) {
                console.log(data)
                $("#table_materias tbody").html(data);
                $("#frm_editar_gradosxmaterias").modal("show")

            },
            default: function () {
				alert('Error en el ajax !!!');
			}
        });
    });
`
`
    $(document).on("click",".eliminarMateria",function () {
        var mxg_id = $(this).attr("id")

		
        $.ajax({
            type: "POST",
            url: "Gradosxmaterias/eliminar_materia",
            data: {codigo:mxg_id},
            success: function (data) {
                Swal.fire({
					icon: 'success',
					title: 'Materia Eliminada',
					showConfirmButton: false,
					timer: 1500
				  })
				  setTimeout('document.location.reload()', 2000);
            },
            default: function () {
				alert('Error en el ajax !!!');
			}
        });
        
    });

});
