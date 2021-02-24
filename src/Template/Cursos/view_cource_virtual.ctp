   <?= $this->Html->css(['bootstrap.min','bootstrap.min2','font-awesome.min','agency','estilos-cursos']);?>
   <style>
   	.estructura_cursos {
    
    margin-top: 50px;
    
	}

	.estructura_cursos .fondo-blanco {
    
    margin-top: 25px;
	}
	.card-header {
    
    background-color: rgb(174, 24, 31);
}

.card-link:hover,.card-link:active, .card-link:focus {
    text-decoration: none;
}
.cecomp{
	color: #dc3545;
    text-shadow: 0 0 50px black;
}
   </style>

   <?php $i=1; ?>

<div class="estructura_cursos">
<!--***************************************CABECERA***********************************-->
<header>
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top cabecera-cursos" id="mainNav">
		<div class="container">
			<a class="navbar-brand js-scroll-trigger logocecomp" href="/"><?= $this->Html->image('logocecomp.png');?></a>
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
				Menu
				<i class="fa fa-bars"></i>
			</button>
			<div class="collapse navbar-collapse" id="navbarResponsive">
				<ul class="navbar-nav text-uppercase ml-auto" style="margin-right:-5%">
					<li class="nav-item">
						<?=$this->Html->link('INICIO',['controller' => 'cursos','action' => 'home'],['class' => 'nav-link js-scroll-trigger']);?>
					</li>

					<li class="nav-item">
						<a class="nav-link js-scroll-trigger" href=""><?= $cursos->nombre;?></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
</header>
<!--***************************************FIN CABECERA***********************************-->

<!-- Toggle Bar -->
<div class="social">
		<ul>
			<li><a href="http://www.facebook.com" target="_blank" class="fa fa-facebook"></a></li>
			<li><a href="http://www.twitter.com" target="_blank" class="fa fa-twitter"></a></li>
			<li><a href="http://www.googleplus.com" target="_blank" class="fa fa-google-plus"></a></li>
			<li><a href="http://www.pinterest.com" target="_blank" class="fa fa-pinterest"></a></li>
			<li><label class="fa fa-whatsapp"> <span class="dato">943516253</span></label></li>
		</ul>
	</div>

	<!--***************************************CUERPO***********************************-->
	<main>
		<div class="container fondo-blanco" id="autocad">

			<div class="row fondo-img-1">

				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 titulo2-container">
					<br>
					<div class="titulo2"><?= $cursos->nombre;?></div>
					<br>
				</div>
				<div class="container fondo-contenedor">

					<div class="col-xs-0 col-sm-0 col-md-0 col-lg-1"></div>
					<div class="col-xs-12 col-sm-7 col-md-7 col-lg-6 flotante">

						<h4><span class="glyphicon glyphicon-blackboard"></span> Modalidad: <tc class="texto-curso"> Virtual</tc></h4>
						<h4><span class="glyphicon glyphicon-hourglass"></span> Duracion: <tc class="texto-curso"><?= $cursos->duracion ?></tc></h4>
						<h4><span class="glyphicon glyphicon-education"></span> Certificacion: <tc class="texto-curso">Universidad Nacional del Santa</tc></h4>
					</div>
					<div class="col-xs-12 col-sm-5 col-md-5 col-lg-4">
						<?= $this->Html->image('../files/cursos/photo/'. $cursos->photo_dir. '/square_' . $cursos->photo)?>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
    				<div class="col-lg-12 col-md-12 col-sm-12">
    					<div class="cecomp text-center text-uppercase display-4 mb-3">TEMARIO</div>
							
							<div id="accordion">
							    			<?php foreach ($sesiones as $sesion): ?>
							    				<?php if (empty($cursos->plane_id)) {
							    					break;
							    				} ?>
							    				<?php 
							    					if ($sesion['plane_id'] != $cursos->plane_id && $cursos->plane_id != $cursos->plane->id ){
							    						break;
							    					}
							    				 ?>
													<?php if ($sesion->plane_id == $cursos->plane_id ): ?>
														<div class="card">
														    <div class="card-header cecomp-temario">
														    	<?php if ($sesion['plane_id'] == $cursos->plane_id): ?>
														    		<?php if ($i == 1): ?>
														    			<?= $this->Html->link($sesion['tema'],'#'.'collapse'.$i,['class' => 'card-link','data-toggle' => 'collapse','data-parent' => '#accordion'])?>
														    		<?php else: ?>
																		<?= $this->Html->link($sesion['tema'],'#'.'collapse'.$i,['class' => 'collpase card-link','data-toggle' => 'collapse','data-parent' => '#accordion'])?>
														    		<?php endif ?>
														    		
														    		
														    	<?php endif ?>
														    </div>
														    
														    <div id="<?php echo "collapse$i" ?>" class="<?php if($i==1){ echo 'collapse show';}else{echo 'collapse';} ?>" >
														      <div class="card-body">
														        <?php foreach ($subsesiones as $sub): ?>
														        	<?php if ($sub['sesione_id'] == $sesion['id'] && $sesion['plane_id'] == $cursos->plane_id): ?>
														        		<?php echo $sub['sub_tema'].'<br>'; ?>
														        	<?php endif ?>
														        <?php endforeach ?>
														      </div>
														    </div>
														  </div>
														  <?php $i++; ?>
													<?php endif ?>
														  
							    					<?php endforeach ?>		
								</div>
    				</div>
			
		</div>

		<div class="container">
    		<div class="row">
    			
    			<div class="col-lg-12">
    				<h2 class="cecomp text-center text-uppercase display-4 mb-3">Pagos</h2>
    			</div>
				
				
    		</div>
				<hr class="cecomp-divider">
			<div class="row">
				<div class="col-lg-6 col-sm-6">
					<h4><b>Banco de la Nación Interior UNS</b></h4>
					<ul>
						<li><strong>Código ALUMNO/DNI </strong></li>
						<li class="text-uppercase"><strong>Código de Curso <?= $cursos->nombre ?></strong>
							<ul>
								
								<?php foreach ($cursos->pagos as $pago): ?>
									<?php if ($pago->categoria == 'Virtual'): ?>
										<li class="text-uppercase"><?= $pago->categoria.': '.$pago->cod_pago .' ---- s/. '.$pago->precio?></li>
									<?php else: ?>
										
									<?php endif ?>
									
								<?php endforeach ?>
							</ul>
						</li>	
					</ul>

					<small class="font-chiqui-2">Si NO encuentra el código VIRTUAL comuniquese con nosotros, puede llamarnos o escribirnos al Chat de la Web!</small>
				</div>
				<div class="col-lg-6 col-sm-6">
					<h4><b>Banco de la Nacion Exterior UNS</b></h4>
					<ul>
						<li><strong>Tazas Educativas:</strong> Código 9135</li>
						<li><strong>Universidad:</strong> Código 29 "Código UNS"</li>
						<li><strong>Código ALUMNO/DNI</strong> </li>
						<li class="text-uppercase"><strong>Código de Curso <?= $cursos->nombre ?></strong>
							<ul>
								<?php foreach ($cursos->pagos as $pago): ?>
									<?php if ($pago->categoria == 'Virtual'): ?>
										<li class="text-uppercase"><?= $pago->categoria.': '.$pago->cod_pago .' ---- s/. '.$pago->precio?></li>
									<?php else: ?>
										
									<?php endif ?>
									
								<?php endforeach ?>
							</ul>
						</li>	
					</ul>

					<small class="font-chiqui-2">Si NO encuentra el código VIRTUAL comuniquese con nosotros, puede llamarnos o escribirnos al Chat de la Web!</small>
				</div>
			</div>
			<hr class="cecomp-divider">
		</div>
	</main>
	<!--***************************************FIN CUERPO********************************-->



	<div class="separador"></div>

	<footer id="pie">
		<div class="pie">
			<div class="container">
				<div class="row text-center">
					<div class="col-md-4 text">
						<i class="fa fa-phone ico"></i><span class="title"> Teléfono</span> <br><br>
						<span class="content">* (043) 31-0445 | Anexo: 1018</span><br>
						<span class="content">* (043) 31-4516 directo</span>
					</div>
					<div class="col-md-4 text">
						<i class="fa fa-map-marker ico"></i><span class="title"> Dirección</span><br><br>
						<span class="content">Urb. Bellamar, Av. Universitaria S/N- Pabellón de la EX-EPISI</span>
					</div>
					<div class="col-md-4 text">
						<i class="fa fa-envelope-o ico"></i><span class="title"> E-mail</span><br><br>
						<span class="content">* cecomp@uns.edu.pe</span><br>
						<span class="content">* centro_computo_uns@hotmail.com</span>
					</div>
				</div>
			</div>

			<div class="row centro pie-ico">
				<div class="col-md-12">
					<ul class="list-inline social-buttons">
						<li class="list-inline-item">
							<a href="https://www.facebook.com/centrocomputouns/" target="_blank">
								<i class="fa fa-facebook"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fa fa-instagram"></i>
							</a>
						</li>
						<li class="list-inline-item">
							<a href="#">
								<i class="fa fa-whatsapp"></i>
							</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="margen">
					<div class="row text-center color">
						<div class="col-lg-12">
							<small>Centro de Cómputo - UNS | Derechos Reservados</small><br>
							<small>© 2018</small>
						</div>
					</div>
			</div>
		</div>
	</footer>

	</div>
	
	<!-- <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="https://v2.zopim.com/?50YE8CMrXUKkmiUGUhQ11FrwxVEpRVd2";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script> -->