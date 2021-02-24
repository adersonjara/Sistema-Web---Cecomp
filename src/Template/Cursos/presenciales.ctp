<?= $this->element('Cursos/header')?>

    <main role="main">
        <div class="banner-cursos">
          <div class="container">
              <div class="row">
                 <div class="col-md-12">
                  <?= $this->Html->link('<i class="fa fa-user-o" aria-hidden="true"></i>&nbsp;</i>&nbsp;</i>&nbsp;Cecomp / Presenciales',['controller' => 'cursos','action' => 'presenciales'],['escape' => false])?>
                  <?= $this->Html->link('<i class="fa fa-mobile" aria-hidden="true"></i>&nbsp;</i>&nbsp;</i>&nbsp;Cecomp / virtuales',['controller' => 'cursos','action' => 'virtuales'],['escape' => false,'class' => 'float-right'])?>
                  <h2 class="text-center">CURSOS PRESENCIALES</h2>
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
                <?= $this->Html->image('../files/cursos/photo/'. $curso->photo_dir. '/square_' . $curso->photo,['alt' => $curso->name,'class'  => 'card-img-top','url' => ['controller' => 'cursos', 'action'=> 'viewCource', $curso->id]])?>
                <div class="card-body">
                  <p class="card-text text-center text-uppercase"><?= $curso->nombre ?></p>
                  <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                      <?= $this->Html->link('Ver Curso',['action' => 'viewCource', $curso->id],['class' => 'btn btn-sm btn-outline-secondary'])?>
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
          <h2>Ven y aprende de la mejor manera, somos especialistas en enseñanza!</h2>
          </div>
        </div>

        <div class="temario">
          <div class="container">
            <div class="row text-center">
              <div class="col-lg-12">
                <h2 class="mb-5">6 Razones por las que debes estudiar en CECOMP</h2>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c3">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-hourglass-half fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Esfuerzo</h2>
                <p>Desarrolla tu potencial al máximo!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c2">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-line-chart fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Enfoque</h2>
                <p>Cumple tus metas con nuestros cursos!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c1">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-graduation-cap  fa-stack-1x"></i>
                </span>
                <h2>Responsabilidad</h2>
                <p>Valoramos tu esfuerzo y dedicación!</p>
              </div>
              
              
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c4">
                  <i class="fa fa-square-o fa-stack-2x"></i>
                  <i class="fa fa-university fa-stack-1x"></i>
                </span>
                <h2>Trascendencia</h2>
                <p>Formamos profesionales de calidad!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c5">
                  <i class="fa fa-square fa-stack-2x"></i>
                  <i class="fa fa-handshake-o fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Compromiso</h2>
                <p>Enseñanza de alta competencia.!</p>
              </div>
              <div class="col-lg-4 col-sm-6">
                <span class="fa-stack fa-lg c6">
                  <i class="fa fa-circle fa-stack-2x"></i>
                  <i class="fa fa-book fa-stack-1x fa-inverse"></i>
                </span>
                <h2>Perseverancia</h2>
                <p>Nos preocupamos porque aprendas!</p>
              </div>
            </div>
          </div>
        </div>

        

      

      
      
    </main>

    <?= $this->element('Cursos/footer')?>

	