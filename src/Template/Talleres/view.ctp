<?= $this->element('Users/navbar')?>


<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'talleres'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ver Taller - <?php echo $tallere->curso->nombre ?></div>
            <div class="card-body">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <div class="text-center">
                              <?= $this->Html->image('../files/talleres/photo/'. $tallere->photo_dir. '/square_' . $tallere->photo,['alt' => $tallere->nombre,'class'  => 'img-fluid img-thumbnail'] )?>
                            </div>
                        </div>
                        <div class="col-sm-6">
<!--
                              <dt class="col-sm-3">Expositor: </dt>
                              <dd class="col-sm-9"><?php // $tallere->nombre_expositor ?></dd>
-->
                              <p>Curso: 
                              <?= $tallere->has('curso') ? $this->Html->link($tallere->curso->nombre, ['controller' => 'Cursos', 'action' => 'view', $tallere->curso->id]) : '' ?>
                              </p>
                              <p>Descripción: 
                              <?php if (($tallere->descripcion == ' ')) {
                                echo $tallere->descripcion;
                              }else{
                                echo 'No tiene descripción';
                              }
                              ?>
                              </p>
                              
<!--                          <dt class="col-sm-3">Fecha: </dt>
                              <dd class="col-sm-9"><?php // $tallere['fecha']->format('d-m-Y'); ?></dd>
                              <dt class="col-sm-3">Hora Inicio: </dt>
                              <dd class="col-sm-9"><?php // $tallere['hora_inicio']->format('h:i A'); ?></dd>
                              <dt class="col-sm-3">Hora Fin: </dt>
                              <dd class="col-sm-9"><?php // $tallere['hora_fin']->format('h:i A'); ?></dd>
-->
                             <p>Código de Pago: 
                              <?= $tallere->cod_pago ?>
                             </p>
                             <p> Link referencial: 
                              <?= $this->Html->link(
                              'FB Taller',
                              $tallere->url,
                              ['class' => 'link','target' => '_blak']

                              ); ?>
                             </p>
                            <td class="actions mx-auto">
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tallere->id],['class' => 'btn btn-sm btn-success']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tallere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tallere->id),'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                    </div>
                </div> 
            </div>
            <br>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

