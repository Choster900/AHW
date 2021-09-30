$(document).ready(function (){
	$("#dataTable").dataTable();

	//MODAL DE AGREGAR
	$(document).on("click","#agregarCliente",function (){
		$("#frmAgregar").modal("show");
	})

	//JALAR INFO Y MOSRAR PARA EDITAR
	$(document).on("click",".editarCliente",function (){
		var idCliente = $(this).attr("id")
		$.ajax({
			url: "Cliente/jalar_info",
			type: "post",
			data: {id:idCliente}
		})
			.done(function (data){
				var datos = JSON.parse(data)
				$("#idCliente").val(datos[0].id)
				$("#nombreE").val(datos[0].nombres)
				$("#ApellidoE").val(datos[0].apellidos)
				$("#DireccionE").val(datos[0].direccion)
				$("#TelefonoE").val(datos[0].telefono)
				$("#emailE").val(datos[0].email)

			})
			.fail(function (){
				console.log("error en ajax")
			})
		$("#frmModificar").modal("show")
	})
})
