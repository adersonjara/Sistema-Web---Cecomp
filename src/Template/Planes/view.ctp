<?= $this->element('Users/navbar')?>
<?php $contador = 1; ?>

<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'planes'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Planes de Estudio
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center my-4"><?php echo $plane['nombre']; ?></h1>
                        <div class="table-responsive">
                        <?php if (!empty($plane->sesiones)): ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th scope="col"><?= __('#') ?></th>
                                <th scope="col"><?= __('Tema') ?></th>
                                <th scope="col" class="actions"><?= __('Acciones') ?></th>
                            </tr>
                            <?php foreach ($plane->sesiones as $sesiones): ?>
                            <tr>
                                <td><?php 
                                    echo $contador++;
                                 ?></td>
                                <td><?= h($sesiones->tema) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['controller' => 'sesiones','action' => 'view', $sesiones->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                    <?= $this->Html->link(__('Editar'), ['controller' => 'sesiones','action' => 'edit', $sesiones->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'sesiones','action' => 'delete', $sesiones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $sesiones->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </table>
                        <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>

        </div>
    </div>


