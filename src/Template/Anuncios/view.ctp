<?= $this->element('Users/navbar')?>


<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'anuncios'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ver Anuncio - <?php echo $anuncio['nombre']; ?></div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 col-md-6">
                            <div class="text-center">
                              <?= $this->Html->image('../files/anuncios/photo/'. $anuncio->photo_dir. '/square_' . $anuncio->photo,['alt' => $anuncio->nombre,'class'  => 'img-fluid img-thumbnail'] )?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                          <dl class="row">
                              <dt class="col-sm-3">Nombre: </dt>
                              <dd class="col-sm-9"><?= $anuncio->nombre ?></dd>
                              <dt class="col-sm-3">Descripción: </dt>
                              <dd class="col-sm-9"><?= $anuncio->descripcion ?></dd>
                              <dt class="col-sm-3">URL: </dt>
                              <dd class="col-sm-9"><?= $this->Html->link('Ver anuncio',$anuncio->url) ?></dd>
                            </dl>
                            <td class="actions">
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $anuncio->id],['class' => 'btn btn-sm btn-success']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $anuncio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anuncio->id),'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

