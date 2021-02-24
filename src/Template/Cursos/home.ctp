   <?= $this->Html->css(['bootstrap.min','bootstrap.min2','font-awesome.min','agency','estilos-cursos']);?>


   <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
          <a class="navbar-brand js-scroll-trigger logocecomp" href="/">
            <?= $this->Html->image('logocecomp.png');?>
          </a>
          <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fa fa-bars"></i>
          </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav text-uppercase ml-auto" style="margin-right:-5%">
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="/">INICIO</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#modalidades">MODALIDADES</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#nosotros">NOSOTROS</a>
              </li>

              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="#contactanos">CONTÁCTANOS</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger"  href="../intranet/" target="-_blank">INTRANET</a>
              </li>
              <li class="nav-item">
                <a class="nav-link js-scroll-trigger" href="../intranet/conscertificado.php" target="-_blank">VER CERTIFICADO</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- Toggle Bar -->
      <div class="social">
          <ul>
            <li><a href="https://www.facebook.com/centrocomputouns/" target="_blank" class="fa fa-facebook"></a></li>
            <li><a href="http://www.twitter.com" target="_blank" class="fa fa-twitter"></a></li>
            <li><a href="http://www.googleplus.com" target="_blank" class="fa fa-google-plus"></a></li>
            <li><a href="http://www.pinterest.com" target="_blank" class="fa fa-pinterest"></a></li>
            <li><label class="fa fa-whatsapp"> <span class="dato">943516253</span></label></li>
          </ul>
        </div>


      <!-- Header -->
      <header class="masthead">

        <!-- Section del slider/banner,es copia del keyphp  -->
        <section class="banner">
          <div id="myCarousel" class="carousel slide" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>
            <!-- Wrapper for slides -->
            <div class="carousel-inner" >
              <div class="item active">
                <?= $this->Html->image('slider/slider05.jpg')?>
                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <?= $this->Html->image('slider/slider01.png')?>

                <div class="carousel-caption">
                </div>
              </div>
              <div class="item">
                <?= $this->Html->image('slider/slider03.jpg')?>

                <div class="carousel-caption">
                </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>

           
          </div>
        </section>

        <!--********************   Fin del slider *****************-->

        <div class="container">
          <div class="intro-text">
            <div class="intro-lead-in">Bienvenido a Nuestra Pagina!!</div>
            <div class="intro-heading text-uppercase">Centro de Computo</div>
            <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#modalidades">Explorar</a>
          </div>
        </div>

      </header>

      <!-- Modalidades Grid -->
      <section  id="modalidades">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">Modalidades</h2>
              <h3 class="section-subheading text-muted"></h3>
            </div>
          </div>
          <div class="row">

            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link text-center" data-toggle="modal" href="#portfolioModal1">
                <div class="mod-cont center-block">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <?= $this->Html->image('modalidades/presencial.jpg',['class' => 'img-fluid'])?>
                </div>
              </a>

                <div class="portfolio-caption">
                  <h4>Presenciales</h4>
                  <p class="text-muted">Tenemos todo lo que necesitas para aprender de una manera práctica y en los mejores ambientes, con los equipos mas modernos y docentes altamente calificados para que te sientas a gusto.</p>
                </div>
            </div>

            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link text-center" data-toggle="modal" href="#portfolioModal2">
                <div class="mod-cont center-block">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <?= $this->Html->image('modalidades/virtual.jpg',['class' => 'img-fluid'])?>

                </div>
              </a>

              <div class="portfolio-caption">
                <h4>Virtuales</h4>
                <p class="text-muted">Nuestros cursos virtuales, te permitirán aprender cursos sin importar el lugar en el que te encuentres. El horario tu lo eliges, el avance de aprendizaje solo dependerá de tí y nadie mas.</p>
              </div>

            </div>
            <div class="col-md-4 col-sm-6 portfolio-item">
              <a class="portfolio-link text-center" data-toggle="modal" href="#portfolioModal3">
                <div class="mod-cont center-block">
                  <div class="portfolio-hover">
                    <div class="portfolio-hover-content">
                      <i class="fa fa-plus fa-3x"></i>
                    </div>
                  </div>
                  <?= $this->Html->image('modalidades/taller.jpg',['class' => 'img-fluid'])?>


                </div>
              </a>
                <div class="portfolio-caption">
                  <h4>Talleres</h4>
                  <p class="text-muted">Los talleres son una opción de reforzar lo aprendido y mejorar tus habilididades, promueve el ámbito de la investigacion y la formación tecnológica. Ven y aprende.</p>
                </div>
            </div>
          </div>
        </div>
      </section>

      <!-- About -->
      <section class="bg-light" id="nosotros">
        <div class="container">
          <div class="row">
            <div class="col-lg-12 text-center">
              <h2 class="section-heading text-uppercase">CECOMP</h2>
              <h3 class="section-subheading text-muted">
                El Centro de Cómputo de la UNS, les da la bienvenida y
                abre sus puertas a toda la comunidad universitaria y público en general, a través de su portal web.
              </h3>
            </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <ul class="timeline">
                <li>
                  <div class="timeline-image">
                  <?= $this->Html->image('nosotros/mirko.png',['class' => 'img-fluid rounded-circle'])?>


                  </div>
                  <div class="timeline-panel text-center">
                    <div class="timeline-heading">
                      <h4>DIRECTOR</h4>
                      <h4 class="subheading">Ing. Mirko Manrique Ronceros</h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">
                        El CECOMP es una unidad de capacitación orientada a formar especialistas en diversas áreas de la Informática,
                         preparados para incorporar en su trabajo los últimos avances tecnológicos, a través de los cursos que se dictan periódicamente
                       </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                  <?= $this->Html->image('nosotros/2.jpg',['class' => 'img-fluid rounded-circle'])?>

                  </div>
                  <div class="timeline-panel text-center">
                    <div class="timeline-heading">
                      <h4>VISIÓN</h4>
                      <h4 class="subheading"></h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Ser líder en el país en prestación de servicios en tecnologías de la información como soporte al conocimiento humano.</p>
                    </div>
                  </div>
                </li>
                <li>
                  <div class="timeline-image">
                  <?= $this->Html->image('nosotros/3.jpg',['class' => 'img-fluid rounded-circle'])?>

                  </div>
                  <div class="timeline-panel text-center">
                    <div class="timeline-heading">
                      <h4>MISIÓN</h4>
                      <h4 class="subheading"></h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">Brindar servicios de calidad en tecnologías de la información que contribuyan a perfeccionar el conocimiento del recurso humano de la región;
                      ayude a lograr los objetivos académicos y administrativos de la Universidad, permita la capacitación continua del personal docente y administrativo;
                      teniendo siempre presente la utilización adecuada de los recursos para un sostenimiento óptimo de la Ecología.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                  <?= $this->Html->image('nosotros/4.jpg',['class' => 'img-fluid rounded-circle'])?>

                  </div>
                  <div class="timeline-panel text-center">
                    <div class="timeline-heading">
                      <h4>RESEÑA HISTÓRICA</h4>
                      <h4 class="subheading"></h4>
                    </div>
                    <div class="timeline-body">
                      <p class="text-muted">
                        El CECOMP fue creado en 1991 a raíz de la creación de la escuela académico profesional de ingeniería de sistemas e informática.
                      El primer laboratorio del CECOMP, se ubica en uno de los ambientes del edificio del rectorado.
                      En 1993, bajo la gestión de la COUNS presidida por el doctor Juan Manuel Cisneros Navarrete y el magister Carlos Enrique Armas Ramírez, el CECOMP se implementó en el primer piso de sistemas informática con tres laboratorios y oficinas administrativas.
                      Actualmente, el Centro de Cómputo cuenta con cinco laboratorios informáticos y un promedio de 80 computadoras última generación y brinda a la comunidad universitaria y colectividad en general diversos cursos en el área de informática.
                      </p>
                    </div>
                  </div>
                </li>
                <li class="timeline-inverted">
                  <div class="timeline-image">
                    <h4>Se Parte
                      <br>De Nuestra
                      <br>Historia!</h4>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <!-- CARACTERISTICAS -->
      <section id="caracteristicas">
          <div class="container">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h2 class="section-heading text-uppercase">¿ POR QUÉ ELEGIR ESTUDIAR AQUÍ ?</h2>
                <h3 class="section-subheading text-muted"></h3>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-area-chart ico"></i></span> Organización Educativa</h4>
                <p class="text-muted">Nuestro centro de estudios cuenta con todo lo que necesitas para aprender de la manera mas cómoda y eficiente!</p>
              </div>

              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-child ico"></i></span> Gran apoyo</h4>
                <p class="text-muted">Los docentes estan altamente calificados para ofrecerte el apoyo que necesites y poder cumplir con tu expectativas.</p>
              </div>

              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-calculator ico"></i></span> Eventos tecnológicos</h4>
                <p class="text-muted">El Cecomp realiza eventualmente eventos sobres tecnología y desarrollo de software donde podrás aprender más.</p>
              </div>
            </div>

            <div class="row">
              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-motorcycle ico"></i></span> Entrenamiento</h4>
                <p class="text-muted">Las prácticas realizadas en cada clase te mantendrán siempre pendiente a los nuevos avances tecnológicos actualizados.</p>
              </div>

              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-taxi ico"></i></span> Sin límites</h4>
                <p class="text-muted">Sabemos que no tienes ninguna meta dificil de cumplir, nosotros te ofrecemos las herramientas para cumplir con tus objetivos.</p>
              </div>

              <div class="col-lg-4 text-justify">
                <h4><span><i class="fa fa-coffee ico"></i></span> Perseverancia</h4>
                <p class="text-muted">Nos esforzamos porque aprendas y seas el mejor, siempre tendremos los programas actualizados para que tu aprendizaje sea el mejor.</p>
              </div>
            </div>
        </div>
      </section>

      <!-- UBICANOS -->
      <section class="bg-light" id="contactanos">
        <div class="col-lg-12">
          <div class="contenedor">
            <div class="row">
              <div class="col-md-8">
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Contáctanos</h2>
                  </div>
                </div>

                <div class="row text-center">
                  <div class="col-md-12">
                    <iframe width="100%" height="520"  frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3939.374388508749!2d-78.51615138566537!3d-9.12061599345733!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91ab85b689424563%3A0x699ba0e0500a7e69!2sCentro+de+C%C3%B3mputo!5e0!3m2!1ses-419!2spe!4v1505833543873"></iframe>
                  </div>
                </div>
              </div>

              <div class="col-md-4">
                <div class="row">
                  <div class="col-lg-12 text-center">
                    <h2 class="section-heading text-uppercase">Anuncios</h2>
                  </div>
                </div>

                <div class="row">
                  <div class="col-md-12">
                    <div class="cursos">
                      <div class="">
                        <iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2Fcentrocomputouns%2F&tabs=timeline&width=340&height=520&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=false&appId=488638574611309" width="100%" height="600px" scrolling="no" frameborder="0" allowTransparency="true"></iframe>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <!-- Footer -->
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

      <!-- Portfolio Modals -->

      <!-- Modal Modalida Presencial -->
      <div class="portfolio-modal modal fade" id="portfolioModal1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="row">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
            </div>

            <div class="contenedor">
              <!-- Project Details Go Here -->
              <h2 class="text-uppercase">Presenciales</h2>
              <p class="item-intro text-muted">Lista de Cursos</p>
              <div class="row">


<?php foreach ($cursos as $curso): ?>

              <div class="col-md-4">
                  <div class="cursos">
                    <?= $this->Html->image('../files/cursos/photo/'. $curso->photo_dir. '/square_' . $curso->photo,['alt' => $curso->name,'class'  => 'img-fluid','url' => ['controller' => 'cursos', 'action'=> 'viewCource', $curso->id]])?>
                      <div class="mask">
                          
                          <h4><?= $curso->nombre;?></h4>
                      <h5><span>Duracion:</span><?= $curso->duracion;?><br>
                          </h5>
                          <?= $this->Html->link('Detalles',['action' => 'viewCource', $curso->id],['class' => 'info'])?>


                      </div>
                      <br>
                  </div>
                </div>

                

              
              

<?php endforeach ?>     
            </div>
            <button class="btn btn-primary" data-dismiss="modal" type="button">
                <i class="fa fa-times"></i>
                Close
              </button>
          </div>
        </div>
      </div>
      </div>

      <!-- Modal Modalida Virtual -->
      <div class="portfolio-modal modal fade" id="portfolioModal2" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="row">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
            </div>

            <div class="contenedor">
              <!-- Project Details Go Here -->
              <h2 class="text-uppercase">Virtuales</h2>
              <p class="item-intro text-muted">Lista de Cursos</p>
              <div class="row">


<?php foreach ($cursos as $curso): ?>

              <div class="col-md-4">
                  <div class="cursos">
                    <?= $this->Html->image('../files/cursos/photo/'. $curso->photo_dir. '/square_' . $curso->photo,['alt' => $curso->name,'class'  => 'img-fluid','url' => ['controller' => 'cursos', 'action'=> 'viewCource', $curso->id]])?>
                      <div class="mask">
                          
                          <h4><?= $curso->nombre;?></h4>
                      <h5><span>Duracion:</span><?= $curso->duracion;?><br>
                          </h5>
                          <?= $this->Html->link('Detalles',['action' => 'viewCourceVirtual', $curso->id],['class' => 'info'])?>


                      </div>
                      <br>
                  </div>
                </div>

                

              
              

<?php endforeach ?>     
            </div>
            <button class="btn btn-primary" data-dismiss="modal" type="button">
                <i class="fa fa-times"></i>
                Close
              </button>
          </div>
        </div>
      </div>
      </div>

     <div class="portfolio-modal modal fade" id="portfolioModal3" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="row">
              <div class="close-modal" data-dismiss="modal">
                <div class="lr">
                  <div class="rl"></div>
                </div>
              </div>
            </div>

            <div class="contenedor">
              <!-- Project Details Go Here -->
              <h2 class="text-uppercase">Talleres</h2>
              <p class="item-intro text-muted">Lista de talleres</p>
              <div class="row">


<?php foreach ($talleres as $tallere): ?>

              <div class="col-md-4">
                  <div class="cursos">
                    <?= $this->Html->image('../files/talleres/photo/'. $tallere->photo_dir. '/square_' . $tallere->photo,['alt' => $tallere->nmbre,'class'  => 'img-fluid','url' => ['controller' => 'cursos', 'action'=> 'viewCource', $tallere->id]])?>
                      <div class="mask">
                          
                      <h4><?= $tallere->nombre_expositor;?></h4>
                      <h5><span>Infórmate<br>
                          
                          </h5>
                           <?= $this->Html->link('Detalles',$tallere->url, ['target' => '_blank','class' => 'info']) ?>

                      </div>
                      <br>
                  </div>
                </div>

                

              
              

<?php endforeach ?>     
            </div>
            <button class="btn btn-primary" data-dismiss="modal" type="button">
                <i class="fa fa-times"></i>
                Close
              </button>
          </div>
        </div>
      </div>
      </div>
      
      <!-- <script type="text/javascript">
        window.$zopim||(function(d,s){var z=$zopim=function(c){z._.push(c)},$=z.s=
        d.createElement(s),e=d.getElementsByTagName(s)[0];z.set=function(o){z.set.
        _.push(o)};z._=[];z.set._=[];$.async=!0;$.setAttribute("charset","utf-8");
        $.src="https://v2.zopim.com/?50YE8CMrXUKkmiUGUhQ11FrwxVEpRVd2";z.t=+new Date;$.
        type="text/javascript";e.parentNode.insertBefore($,e)})(document,"script");
    </script> -->
   
   <?= $this->Html->script(['jquery-3.3.1-cursos.min','carousel-cursos.min','bootstrap.min','agency-cursos.min','jquery.easing-cursos.min']);?>

