<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inicio',['action' => 'index','controller' => 'anuncios'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de Anuncios -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Anuncios
              <?= $this->Html->link(__('PDF'), ['action' => 'impresion','allAnuncios'.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning float-right']) ?>
          </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('nombre') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('descripcion') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('url') ?></th>
                            <th scope="col"><?= $this->Paginator->sort('curso_id') ?></th>
                            <th scope="col" class="actions"><?= __('Acciones') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($anuncios as $anuncio): ?>
                        <tr>
                            <td><?= $this->Number->format($anuncio->id) ?></td>
                            <td><?= h($anuncio->nombre) ?></td>
                            <td><?= h($anuncio->descripcion) ?></td>
                            <td><?= $this->Html->link('Ver anuncio',$anuncio->url) ?></td>
                            <td><?= $anuncio->has('curso') ? $this->Html->link($anuncio->curso->nombre, ['controller' => 'Cursos', 'action' => 'view', $anuncio->curso->id]) : '' ?></td>
                            <td class="actions">
                                <?= $this->Html->link(__('Ver'), ['action' => 'view', $anuncio->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                <?= $this->Html->link(__('Editar'), ['action' => 'edit', $anuncio->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $anuncio->id], ['confirm' => __('Are you sure you want to delete # {0}?', $anuncio->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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

