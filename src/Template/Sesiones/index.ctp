<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'sesiones'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Temas de estudio <?= $this->Html->link('Crear', ['controller' => 'sesiones','action' => 'add'],['class' => 'btn btn-sm btn-primary float-right']) ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('tema') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('plane_id','Plan') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sesiones as $sesione): ?>
                        <tr>
                            <td><?= $this->Number->format($sesione->id) ?></td>
                            <td><?= h($sesione->tema) ?></td>
                            <td><?= $sesione->has('plane') ? $this->Html->link($sesione->plane->nombre, ['controller' => 'Planes', 'action' => 'view', $sesione->plane->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $sesione->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $sesione->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $sesione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sesione->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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
              </div>
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>



