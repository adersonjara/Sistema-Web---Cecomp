<?= $this->element('Users/navbar')?>


<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'pagos'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ver Pago - <?php echo $pago['cod_pago']; ?></div>
            <div class="card-body">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-12">
                              <p class="text-center">Modalidad: <?= $pago->categoria ?></p>
                              
                              <p class="text-center"><b>CódigoPago: <?= $pago->cod_pago ?></b></p>
                              
                              <p class="text-center">Precio: <?= 's/. '.$pago->precio ?></p>
                              
                            <td class="actions">
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pago->id],['class' => 'btn btn-sm btn-success mb-3']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id),'class' => 'btn btn-sm btn-danger mb-3']) ?>
                            </td>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Cursos Relacionados
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <tr>
                                    <th scope="col"><?= __('Id') ?></th>
                                    <th scope="col"><?= __('Nombre') ?></th>
                                    <th scope="col"><?= __('Duración') ?></th>
                                    <th scope="col" class="actions"><?= __('Acciones') ?></th>
                                </tr>
                                <?php foreach ($pago->cursos as $cursos): ?>
                                <tr>
                                    <td><?= h($cursos->id) ?></td>
                                    <td><?= h($cursos->nombre) ?></td>
                                    <td><?= h($cursos->duracion) ?></td>
                                    <td class="actions">
                                        <?= $this->Html->link(__('Ver Curso'), ['controller' => 'cursos', 'action' => 'view', $cursos->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </table>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>

        </div>
    </div>

