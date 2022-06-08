$(document).ready(function () {
    $(document).on("click", "#btn_aagregar_grados", function () {
        $("#frm_agregar_grados").modal("show")
    });
    //capturar evento de envio
    $('#frmAgreggarGrado').submit(function (ev) {
		$.ajax({
			type: $('#frmAgreggarGrado').attr('method'),
			url: $('#frmAgreggarGrado').attr('action'),
			data: $('#frmAgreggarGrado').serialize(),
			success: function (data) {
					Swal.fire({
						position: '',
						icon: 'success',
						title: 'Grado agregado correctamente',
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

    $(document).on("click",".editarGrado",function () {
        var grd_id = $(this).attr("id")
        
        $.ajax({
            type: "POST",
            url: "Grados/consultar_alumno",
            data: {codigo:grd_id},
            success: function (data) {
                console.log(data)
                var datos = JSON.parse(data)
                $("#txtCodigo").val(datos[0].GRD_ID)
                $("#txtNombreGradoE").val(datos[0].GRD_NOMBRE)
                $("#frm_editar_grados").modal("show")

            },
            default: function () {
				alert('Error en el ajax !!!');
			}
        });
    });
     //Formulario para modifcar grado
     $('#frmModificarGrado').submit(function (ev) {
		$.ajax({
			type: $('#frmModificarGrado').attr('method'),
			url: $('#frmModificarGrado').attr('action'),
			data: $('#frmModificarGrado').serialize(),
			success: function (data) {
					Swal.fire({
						position: '',
						icon: 'success',
						title: 'Grado modificado correctamente',
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
	//eliminar grado
	$(document).on("click",".borrarGrado",function () {
		var grd_id = $(this).attr("id")

		Swal.fire({
			title: 'Desea eliminar el grado?',
			showDenyButton: true,
			confirmButtonText: 'Eliminar',
			denyButtonText: `Cancelar`,
		  }).then((result) => {
			/* Read more about isConfirmed, isDenied below */
			if (result.isConfirmed) {
				$.ajax({
					type: "POST",
					url: "Grados/eliminar_materia",
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
			  Swal.fire('Cambio de guardados', '', 'info')
			}
		  })

		
	});
});