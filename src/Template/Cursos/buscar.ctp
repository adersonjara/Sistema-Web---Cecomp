<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inicio',['action' => 'index','controller' => 'cursos'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de cursos -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Cursos 
               <?= $this->Html->link(__('PDF'), ['action' => 'impresion','allCources'.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning float-right']) ?>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('duracion') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('plane_id','Plan') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($cursos as $curso): ?>
                        <tr>
                            <td><?= $this->Number->format($curso->id) ?></td>
                            <td><?= h($curso->nombre) ?></td>
                            <td class="text-justify"><?= h($curso->descripcion) ?></td>
                            <td><?= h($curso->duracion) ?></td>
                            
                            <td><?= $curso->has('plane') ? $this->Html->link($curso->plane->nombre, ['controller' => 'Planes', 'action' => 'view', $curso->plane->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $curso->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $curso->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $curso->id], ['confirm' => __('Are you sure you want to delete # {0}?', $curso->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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

