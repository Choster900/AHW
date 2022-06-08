$(document).ready(function () {
    //modal para guardar materias
    $(document).on("click", "#btn_agregar_materias", function () {
        $("#frm_agregar_materias").modal("show")

    });
    //modal para editar materias
    $(document).on("click", ".editarMaterias", function () {
        var mat_id = $(this).attr("id")

        $.ajax({
            type: "POST",
            url: "Materias/consultar_materias",
            data: {codigo:mat_id},
            success: function (data) {
                console.log(data)
                var datos = JSON.parse(data)
                $("#txtCodigoMat").val(datos[0].MAT_ID)
                $("#txtNombreMat").val(datos[0].MAT_NOMBRE)
               $("#frm_editar_materias").modal("show")

            },
            default: function () {
				alert('Error en el ajax !!!');
			}
        });
    });
    //eliminar materia
    $(document).on("click",".borrarMaterias",function () {
		var grd_id = $(this).attr("id")

		Swal.fire({
			title: 'Desea Eliminar el registro Materia?',
			showDenyButton: true,
			confirmButtonText: 'Eliminar',
			denyButtonText: `Cancelar`,
		  }).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "Materias/eliminar_materia",
					data: {codigo:grd_id},
					success: function (data) {
						console.log(data)
						if(data>0){
							Swal.fire({
								position: '',
								icon: 'success',
								title: 'Grado Eliminado',
								showConfirmButton: false,
								timer: 1500
							})
							setTimeout('document.location.reload()', 2000);
						}else{
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'El grado no se puede eliminar por que tiene materias!',
								footer: '<a href="">Why do I have this issue?</a>'
							})
						}
					},
					default: function () {
						alert('Error en el ajax !!!');
					}
				});
			} else if (result.isDenied) {
			  Swal.fire('Cambio no guardados', '', 'info')
			}
		  })
		  
		
	});
    //aqui vamos a enviar los datos para agregar materias
    $('#frmAgregarMateria').submit(function (ev) {
		$.ajax({
			type: $('#frmAgregarMateria').attr('method'),
			url: $('#frmAgregarMateria').attr('action'),
			data: $('#frmAgregarMateria').serialize(),
			success: function (data) {
					Swal.fire({
						position: '',
						icon: 'success',
						title: 'Materia agregado correctamente',
						showConfirmButton: false,
						timer: 1500
					})
					setTimeout('document.location.reload()', 2000);
				
			},
			default: function () {
				alert('Error en el ajax !!!');
			}
		});
		ev.preventDefault();
	});
    //aqui vamos a modificar el empleado 
    $('#frmModificarMaterias').submit(function (ev) {
		$.ajax({
			type: $('#frmModificarMaterias').attr('method'),
			url: $('#frmModificarMaterias').attr('action'),
			data: $('#frmModificarMaterias').serialize(),
			success: function (data) {
					Swal.fire({
						position: '',
						icon: 'success',
						title: 'Materia Modificada correctamente',
						showConfirmButton: false,
						timer: 1500
					})
					setTimeout('document.location.reload()', 2000);
				
			},
			default: function () {
				alert('Error en el ajax !!!');
			}
		});
		ev.preventDefault();
	});
});