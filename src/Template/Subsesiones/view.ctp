<?= $this->element('Users/navbar')?>
<?php $contador = 1; ?>

<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'subsesiones'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> SubTemas de Estudio
            </div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-12 text-center">
                            <h1 class="my-4"><?php echo $subsesione['subtema']; ?></h1>
                            <p><b>TEMA:</b> <?= $subsesione->has('sesione') ? $this->Html->link($subsesione->sesione->tema, ['controller' => 'Sesiones', 'action' => 'view', $subsesione->sesione->id]) : '' ?></p>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>

        </div>
    </div>


