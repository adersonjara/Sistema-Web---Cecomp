<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'subsesiones'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de SubTema<?= $this->Html->link('Crear', ['controller' => 'subsesiones','action' => 'add'],['class' => 'btn btn-sm btn-primary float-right']) ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            
                            <th scope="col"><?= $this->Paginator->sort('Id') ?></th>
                            <th scope="col"><?= __('Subtema') ?></th>
                            <th scope="col"><?= __('Plan') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($subsesiones as $subsesione): ?>

                            
                              <tr>
                                <td><?= $subsesione->id ?></td>
                                <td><?= $subsesione->sub_tema ?></td>
                                <?php foreach ($planes as $value): ?>
                                  <?php if ($subsesione->sesione->plane_id == $value->id): ?>
                                    <td><?= $this->Html->link($value->nombre, ['controller' => 'Planes', 'action' => 'view', $value->id]) ?></td>
                                  <?php endif ?>
                                <?php endforeach ?>
                                  <td class="actions">
                                     <?php // $this->Html->link(__('Ver'), ['action' => 'view', $subsesione->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                      <?= $this->Html->link(__('Editar'), ['action' => 'edit', $subsesione->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                      <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $subsesione->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subsesione->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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



