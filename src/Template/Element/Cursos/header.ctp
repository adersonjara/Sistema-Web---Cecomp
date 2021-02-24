    <div class="container-fluid">
  		<div class="row  cecomp-border2">
  		  	<div class="col-lg-12 col-sm-12 fondito">
    				<div class="container-fluid">
    					<a href="https://www.facebook.com/centrocomputouns/" target="_blank">
    						<i class="fa fa-facebook"></i>
    					</a>
    					<a href="https://plus.google.com/110150813670046399566" target="_blank">
    						<i class="fa fa-google-plus"></i>
    					</a>
    					<a href="https://www.youtube.com/channel/UC2yAvc1iqJ_6lbEEiX0xdsw/" target="_blank">
    						<i class="fa fa-youtube"></i>
    					</a>
                       
    					<a href="" target="">
    						<i class="fa fa-twitter"></i>
    					</a>
    					<div class="float-right li">
    						<a href="#informes" target=""><i class="fa fa-info-circle" aria-hidden="true"></i> Información</a>
    						<a href="" target=""><i class="fa fa-phone-square" aria-hidden="true"></i> Llamar: 043-314516</a>
    					</div>
    		  	</div>
  		  	</div>
  		</div>
  	</div>
  	<div class="fondito-2">
    	<div class="container d-none d-md-block">
    		<div class="row">
      		<div class="col-lg-6 col-md-6">
      			<div class="text-left">
              <?= $this->Html->image("logopng3.png", ['class' => 'img-fluid my-2','url' => ['controller' => 'cursos', 'action'=> 'home']
              ]); ?>
      			</div>
      		</div>
      		<div class="col-lg-6 col-md-6">
            <div class="container">
                <div class="row">
                  <div class="col-sm-6"></div>
                  <div class="col-sm-6">
                    <?= $this->Html->link('Cursos',['controller' => 'cursos','action' => 'presenciales'],['class' => 'bg-cecomp btn btn-block']) ?>
                  </div>
                </div>  
            </div>
          </div>
    		</div>
    	</div>
    </div>
	 <header class=" sticky-top fondito">
      <nav class="navbar navbar-expand-md navbar-dark container-fluid">
        <a class="navbar-brand d-none d-block d-sm-block d-md-none" href="#"><?= $this->Html->image('logopng2.png',['class' => 'img-fluid']) ?></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse text-center" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item">
              <?= $this->Html->link(
                  'Inicio',
                  ['controller' => 'cursos', 'action' => 'home'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link(
                  'Anuncios',
                  ['controller' => 'cursos', 'action' => 'home'.'#anuncios'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link(
                  'Modalidades',
                  ['controller' => 'cursos', 'action' => 'home'.'#modalidades'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link(
                  'Nosotros',
                  ['controller' => 'cursos', 'action' => 'home'.'#nosotros'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link(
                  'Contáctanos',
                  ['controller' => 'cursos', 'action' => 'home'.'#contactanos'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
            <li class="nav-item">
              <?= $this->Html->link(
                  'Virtuales',
                  ['controller' => 'cursos', 'action' => 'virtuales'],
                  ['class' => 'nav-link']
              ); ?>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
          	<li class="nav-item">
          		<a href="" class="nav-link">Intranet</a>
          	</li>
          </ul>
		      <form class="form-inline d-block d-md-none">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
            <br>

        </div>
      </nav>
    </header>