$(document).ready(function (){
	$("#dataTable").dataTable();

	//MODAL DE AGREGAR
	$(document).on("click","#agregarCliente",function (){
		$("#frmAgregar").modal("show");
	})
})
