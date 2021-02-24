<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'planes'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de planes de estudio -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Planes de Estudio 
              <?= $this->Html->link(__('PDF'), ['action' => 'impresion','allPlans'.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning float-right']) ?>
              </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($planes as $plane): ?>
                        <tr>
                            <td><?= $this->Number->format($plane->id) ?></td>
                            <td><?= h($plane->nombre) ?></td>
                            <td><?= h($plane->descripcion) ?></td>
                            <td class="actions">
                              <?= $this->Html->link(__('Ver'), ['action' => 'view', $plane->id],['class' => 'btn btn-sm btn-primary']) ?>
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $plane->id],['class' => 'btn btn-sm btn-success']) ?>
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


