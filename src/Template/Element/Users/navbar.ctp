<?= $this->Html->css(['sb-admin.min']) ?>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
        <a class="navbar-brand text-uppercase" href=""><i class="fa fa-user-circle" aria-hidden="true"></i> <?php if(isset($current_user)) { echo $current_user['fullname'];}?></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-user-circle"></i>
                <span class="nav-link-text">Usuarios</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseComponents">
                <li>
                  <?= $this->Html->link('Listar Usuarios', ['controller' => 'users','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Usuarios', ['controller' => 'users','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Cursos">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseCursos" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-graduation-cap"></i>
                <span class="nav-link-text">Cursos</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseCursos">
                <li>
                  <?= $this->Html->link('Listar Cursos', ['controller' => 'Cursos','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Cursos', ['controller' => 'Cursos','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Talleres">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseTalleres" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-laptop"></i>
                <span class="nav-link-text">Talleres</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseTalleres">
                <li>
                  <?= $this->Html->link('Listar Talleres', ['controller' => 'Talleres','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Talleres', ['controller' => 'Talleres','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Anuncios">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseAnuncios" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-newspaper-o"></i>
                <span class="nav-link-text">Anuncios</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseAnuncios">
                <li>
                  <?= $this->Html->link('Listar Anuncios', ['controller' => 'Anuncios','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Anuncios', ['controller' => 'Anuncios','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Pagos">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePagos" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-money"></i>
                <span class="nav-link-text">Pagos</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapsePagos">
                <li>
                  <?= $this->Html->link('Listar Pagos', ['controller' => 'pagos','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Pagos', ['controller' => 'pagos','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Plan">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapsePlan" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-book"></i>
                <span class="nav-link-text">Planes Estudio</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapsePlan">
                <li>
                  <?= $this->Html->link('Listar Planes', ['controller' => 'planes','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Planes', ['controller' => 'planes','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Sesion">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSesion" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-navicon"></i>
                <span class="nav-link-text">Temas Estudio</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseSesion">
                <li>
                  <?= $this->Html->link('Listar Temas', ['controller' => 'sesiones','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Temas', ['controller' => 'sesiones','action' => 'add']) ?>
                </li>
              </ul>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Subsesiones">
              <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseSubsesiones" data-parent="#exampleAccordion">
                <i class="fa fa-fw fa-minus"></i>
                <span class="nav-link-text">Subtemas Estudio</span>
              </a>
              <ul class="sidenav-second-level collapse" id="collapseSubsesiones">
                <li>
                  <?= $this->Html->link('Listar Subtemas', ['controller' => 'subsesiones','action' => 'index']) ?>
                </li>
                <li>
                  <?= $this->Html->link('Crear Subtemas', ['controller' => 'subsesiones','action' => 'add']) ?>
                </li>
              </ul>
            </li>
          </ul>

          <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
              <a class="nav-link text-center" id="sidenavToggler">
                <i class="fa fa-fw fa-users"></i>
              </a>
            </li>
          </ul>
          <ul class="navbar-nav ml-auto">
          
            <li class="nav-item">

              <?= $this->Form->create("",['type'=> 'get','class' => 'form-inline my-2 my-lg-0 mr-lg-2','url' => 'cursos/buscar']) ?>
              <div class="input-group">
                  <?= $this->Form->control('keyword',['label' => ' ','default' => $this->request->query('keyword'),'class' => 'form-control','placeholder' => 'Buscar Curso ...']); ?>
                  
              
              <button class="btn btn-primary"><i class="fa fa-search"></i></button>
                </div>

              <?= $this->Form->end() ?>

            </li>
            
            <li class="nav-item">
               <?= $this->Html->link('<i class="fa fa-fw fa-sign-out"></i>Salir', ['controller' => 'users','action' => 'logout'],['class' => 'nav-link','escape' => false]) ?>
            </li>
          </ul>
        </div>
    </nav>
