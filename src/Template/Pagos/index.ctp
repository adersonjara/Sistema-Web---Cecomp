<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'users'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de pagos -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Pagos 
              <?= $this->Html->link(__('PDF'), ['action' => 'impresion','allPagos'.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning float-right']) ?>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('cod_pago') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('precio') ?></th>
                            <th scope="col"><?= 'Curso' ?></th>
                            <th scope="col"><?= $this->Paginator->sort('categoria') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pagos as $pago): ?>

                        <tr>
                            <td><?= $this->Number->format($pago->id) ?></td>
                            <td><?= $this->Number->format($pago->cod_pago) ?></td>
                            <td><?= "S/. ".$pago->precio.".00" ?></td>
                            <?php if (empty($pago['cursos'])): ?>
                              <td><b>No se asigno curso</b></td>
                            <?php else: ?>
                              <?php foreach ($pago['cursos'] as $value): ?>
                               <td class="text-uppercase"><b><?= $value->nombre ?></b></td>        
                            <?php endforeach ?>
                            <?php endif ?>
                            
                            <td><?= h($pago->categoria) ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $pago->id],['class' => 'btn btn-sm btn-primary']) ?>                                
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $pago->id],['class' => 'btn btn-sm btn-success']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $pago->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pago->id),'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('>') ?>
                    </ul>
                  <!--   <p> $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) </p> -->
              </div>
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>





