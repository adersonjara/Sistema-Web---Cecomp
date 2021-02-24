<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'talleres'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>

          <!-- Listado de talleres -->
          <!-- Example DataTables Card-->

          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Listado de Talleres <?= $this->Html->link('PDF', ['controller' => 'talleres','action' => 'impresion','allTalleres'.'.pdf'],['class' => 'btn btn-sm btn-warning float-right','target' => '_blak']) ?></div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><?= $this->Paginator->sort('id','Id',['escape' => true]) ?></th>
<!--
                            <th><?php // $this->Paginator->sort('nombre_expositor','Expositor') ?></th>
                            <th><?php // $this->Paginator->sort('fecha','Fecha') ?></th>
                            <th><?php // $this->Paginator->sort('hora_inicio','Inicio') ?></th>
                            <th><?php // $this->Paginator->sort('hora_fin','Fin') ?></th>

-->
                            <th><?= $this->Paginator->sort('url','Link') ?></th>
                            <th><?= $this->Paginator->sort('cod_pago','Pago') ?></th>
                            <th><?= $this->Paginator->sort('curso_id','Curso') ?></th>
                            <th class="actions"><?= __('Actions') ?></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($talleres as $tallere): ?>
                        <tr>
                            <td><?= $this->Number->format($tallere->id) ?></td>
<!--
                            <td><?php //$tallere->nombre_expositor ?></td>
                            <td><?php //$tallere['fecha']->format('d-m-Y');?></td>
                            <td><?php //$tallere['hora_inicio']->format('h:i A'); ?></td>
                            <td><?php //$tallere['hora_fin']->format('h:i A'); ?></td>
-->
                            <td><?= $this->Html->link(
                              'FB Taller',
                              $tallere->url,
                              ['class' => 'link','target' => '_blak']

                              ); ?></td>
                            <td><?= $this->Number->format($tallere->cod_pago) ?></td>
                            <td><?= $tallere->has('curso') ? $this->Html->link($tallere->curso->nombre, ['controller' => 'Cursos', 'action' => 'view', $tallere->curso->id]) : '' ?></td>
                            <td class="actions">
                              <?= $this->Html->link(__('Ver'), ['action' => 'view', $tallere->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $tallere->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $tallere->id], ['confirm' => __('Are you sure you want to delete # {0}?', $tallere->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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


