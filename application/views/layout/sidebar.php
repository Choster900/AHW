<ul class="sidebar navbar-nav">
	<li class="nav-item">
		<a class="nav-link" href="<?= base_url() ?>">
			<i class="fas fa-fw fa-tachometer-alt"></i>
			<i class="bi bi-arrow-down-left-square-fill"></i>
			<span>Inicio</span>
		</a>
	</li>
	<li class="nav-item dropdown">
		<a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="fas fa-fw fa-folder"></i>
			<span>Buscar</span>
		</a>
		<div class="dropdown-menu" aria-labelledby="pagesDropdown">
			<h6 class="dropdown-header">Gestiones de registros:</h6>
			<a class="dropdown-item" href="<?= base_url() ?>alumno">Gestionar alumnos</a>
			<a class="dropdown-item" href="<?= base_url() ?>gradosxmaterias">Agregar materias<br> a un grado</a>
			<a class="dropdown-item" href="<?= base_url() ?>grados">Grados y materias</a>
			<div class="dropdown-divider"></div>
			<h6 class="dropdown-header">Other Pages:</h6>
			<a class="dropdown-item" href="<?= base_url() ?>Reportes">Reportes</a>
			<a class="dropdown-item" href="blank.html">Blank Page</a>
		</div>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="charts.html">
			<i class="fas fa-fw fa-chart-area"></i>
			<span>Charts</span></a>
	</li>
	<li class="nav-item">
		<a class="nav-link" href="tables.html">
			<i class="fas fa-fw fa-table"></i>
			<span>Tables</span></a>
	</li>
</ul>
<div id="content-wrapper">

	<div class="container-fluid">
