<?= $this->element('Cursos/header')?>

    <main role="main">
        <div class="banner-cursos">
          <div class="container">
              <div class="row">
                 <div class="col-md-12">
                  <?= $this->Html->link('<i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;</i>&nbsp;</i>&nbsp;Cecomp / Virtuales',['controller' => 'cursos','action' => 'presenciales'],['escape' => false])?>
                  <?= $this->Html->link('<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;</i>&nbsp;</i>&nbsp;Cecomp / Presenciales',['controller' => 'cursos','action' => 'virtuales'],['escape' => false,'class' => 'float-right'])?>
                  <h2 class="text-center">CURSOS VIRTUALES</h2>
                 </div>
                 <div class="col-md-12">
                   
                 </div>
              </div>
          </div>
        </div>

        <div class="container pt-5">
          <div class="row pt-1">
            <!--Anuncios Cursos-->
          <?php foreach ($cursos as $curso): ?>
            <div class="col-xl-3 col-lg-3 col-md-6">
              <div class="card mb-4 box-shadow">
                <?= $this->Html->image('../files/cursos/photo/'. $curso->photo_dir. '/square_' . $curso->photo,['alt' => $curso->name,'class'  => 'card-img-top','url' => ['controller' => 'cursos', 'action'=> 'viewCourceVirtual', $curso->id]])?>
                <div class="card-body">
                  <p class="card-text text-center text-uppercase"><?= $curso->nombre ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <?= $this->Html->link('Ver Curso',['action' => 'viewCourceVirtual', $curso->id],['class' => 'btn btn-sm btn-outline-secondary'])?>
                    </div>
                    <small class="text-muted">CECOMP</small>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
          </div>
        </div>

        <div class="cecomp-web">
          <div class="container text-center">
          <h2>No existen límites para estudiar, estudia desde donde te encuentres!</h2>
          </div>
        </div>

        <div class="temario">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-12">
                <h2 class="mb-5">¿ Por qué un curso virtual ?</h2>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c3">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-home fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Disponibilidad</h2>
                <p>Estudia en tus ratos libres!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c2">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-hourglass-half fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Facilidad</h2>
                <p>El tiempo tu lo decides!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c1">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-graduation-cap  fa-stack-1x"></i>
                </span>
                <h2>Certificación</h2>
                <p>Valoramos tu esfuerzo y dedicación!</p>
              </div>
              
              
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c4">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-pencil-square-o fa-stack-1x"></i>
                </span>
                <h2>Desempeño</h2>
                <p>Evaluamos tu aprendizaje!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c5">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Atención</h2>
                <p>Resolvemos tus dudas de inmediato!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c6">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Recursos</h2>
                <p>Te brindamos todo lo necesario!</p>
              </div>
            </div>
          </div>
        </div>

        

      

      
      
    </main>

    <?= $this->element('Cursos/footer')?>

	