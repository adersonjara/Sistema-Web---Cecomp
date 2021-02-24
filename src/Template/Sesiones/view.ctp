<?= $this->element('Users/navbar')?>
<?php $contador = 1; ?>

<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'sesiones'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Temas de Estudio
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12">
                            <h1 class="text-center my-4"><?php echo $sesione['tema']; ?></h1>
                        <div class="table-responsive">
                        <?php if (!empty($sesione->subsesiones)): ?>
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <tr>
                                <th scope="col"><?= __('#') ?></th>
                                <th scope="col"><?= __('Sub Tema') ?></th>
                                <th scope="col" class="actions"><?= __('Actions') ?></th>
                            </tr>
                            <?php foreach ($sesione->subsesiones as $subsesiones): ?>
                            <tr>
                                <td><?php 
                                    echo $contador++;
                                 ?></td>
                                <td><?= h($subsesiones->sub_tema) ?></td>
                                <td class="actions">
                                    <?= $this->Html->link(__('Ver'), ['controller' => 'subsesiones','action' => 'view', $subsesiones->id],['class' => 'btn btn-sm btn-primary mb-1']) ?>
                                    <?= $this->Html->link(__('Editar'), ['controller' => 'subsesiones','action' => 'edit', $subsesiones->id],['class' => 'btn btn-sm btn-success mb-1']) ?>
                                    <?= $this->Form->postLink(__('Eliminar'), ['controller' => 'subsesiones','action' => 'delete', $subsesiones->id], ['confirm' => __('Are you sure you want to delete # {0}?', $subsesiones->id),'class' => 'btn btn-sm btn-danger mb-1']) ?>
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


