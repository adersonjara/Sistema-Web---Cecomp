<?= $this->element('Users/navbar')?>


<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inicio',['action' => 'index','controller' => 'cursos'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ver Curso - <?php echo $curso['nombre']; ?></div>
            <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="text-center">
                              <?= $this->Html->image('../files/cursos/photo/'. $curso->photo_dir. '/square_' . $curso->photo,['alt' => $curso->nombre,'class'  => 'img-fluid'] )?>
                            </div>
                        </div>
                        <div class="col-lg-6">
                          <dl class="row text-justify">
                              <dt class="col-sm-3">Nombre: </dt>
                              <dd class="col-sm-9"><?= $curso->nombre ?></dd>
                              <dt class="col-sm-3">Descripción: </dt>
                              <dd class="col-sm-9"><?= $curso->descripcion ?></dd>
                              <dt class="col-sm-3">Duración: </dt>
                              <dd class="col-sm-9"><?= $curso->duracion ?></dd>
                              <dt class="col-sm-3">Plan: </dt>
                             <?php if (isset($curso->plane->nombre)) {
                                  echo '<dd class="col-sm-9 text-uppercase">';
                                  echo $curso->plane->nombre;
                                  echo '</dd>';
                              }else{ 
                                  echo '<dd class="col-sm-9 text-danger text-uppercase">';
                                  echo "No se asigno un plan de estudios";}
                                  echo '</dd>';

                              ?>
                              
                            </dl>
                            
                        </div>
                        <div class="col-lg-12 text-center">
                          <td class="actions">
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $curso->id],['class' => 'btn btn-sm btn-success']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $curso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->id),'class' => 'btn btn-sm btn-danger']) ?>
                              <?= $this->Html->link(__('PDF'), ['action' => 'impresion',$curso->nombre.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning']) ?>
                            </td>
                        </div>
                    </div>
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

