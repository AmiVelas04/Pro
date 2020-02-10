
<!-- SideBar -->
	<section class="full-box cover dashboard-sideBar">
		<div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
		<div class="full-box dashboard-sideBar-ct">
			<!--SideBar Title -->
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				<?php echo proy; ?><i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
			</div>
			<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
				 <i class="zmdi zmdi-close btn-menu-dashboard visible-xs"> </i>
			</div>

			<!-- SideBar User info -->
			<div class="full-box dashboard-sideBar-UserInfo">
				<figure class="full-box">
					<img src="<?php echo SERVERURL; ?>vistas/assets/avatars/<?php echo $_SESSION['foto_sbp'] ?>" alt="UserIcon">
					<figcaption class="text-center text-titles"><?php 
					echo $_SESSION['usuario']; ?></figcaption>
				</figure>
				<ul class="full-box list-unstyled text-center">
					<li>
						<a href=" <?php echo SERVERURL; ?>misdatos" title="Mis datos">
							<i class="zmdi zmdi-account-circle"></i>
						</a>
					</li>
					<li>
						<a href=" <?php echo SERVERURL; ?>micuenta" title="Mi cuenta">
							<i class="zmdi zmdi-settings"></i>
						</a>
					</li>
					<li>
						<a href="<?php echo $lc->encryption($_SESSION['token_pyc']); ?>" title="Salir del sistema" class="btn-exit-system">
							<i class="zmdi zmdi-power"></i>
						</a>
					</li>
				</ul>
			</div>
			<!-- SideBar Menu -->
			<ul class="list-unstyled full-box dashboard-sideBar-Menu">
				<li>
					<a href=" <?php echo SERVERURL; ?>home">
						<i class="zmdi zmdi-view-dashboard zmdi-hc-fw"></i> Dashboard
					</a>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-case zmdi-hc-fw"></i> Administración <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href=" <?php echo SERVERURL; ?>cat"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Catedraticos</a>
						</li>
						
						<li>
							<a href=" <?php echo SERVERURL; ?>alumno"><i class="zmdi zmdi-chart zmdi-hc-fw"></i> Alumnos</a>
						</li>
						<li>
							<a href=" <?php echo SERVERURL; ?>cursos"><i class="zmdi zmdi-book zmdi-hc-fw"></i> Ingreso de cursos</a>
						</li>
						<li>
							<a href=" <?php echo SERVERURL; ?>calificacion"><i class="zmdi zmdi-labels zmdi-hc-fw"></i>Ingreso de calificaciones</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="#!" class="btn-sideBar-SubMenu">
						<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Usuarios <i class="zmdi zmdi-caret-down pull-right"></i>
					</a>
					<ul class="list-unstyled full-box">
						<li>
							<a href=" <?php echo SERVERURL; ?>admin"><i class="zmdi zmdi-account zmdi-hc-fw"></i> Administradores</a>
						</li>
						<li>
							<a href=" <?php echo SERVERURL; ?>catedratico"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Catedraticos</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="catalog.html">
						<i class="zmdi zmdi-book-image zmdi-hc-fw"></i> Reportes
					</a>
				</li>
			</ul>
		</div>
	</section>