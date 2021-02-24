<?= $this->element('Users/navbar')?>
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
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Agregar Tema de Estudio</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($sesione,['novalidate']) ?>
                            <div class="form-group">
                              <?= $this->Form->control('tema', [
                                    'label' => [
                                        'text' => 'Tema', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group">
                              <?= $this->Form->control('descripcion',['label' => [
                                        'text' => 'Descripcion', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                                  <?= $this->Form->control('plane_id', ['options' => $planes, 
                                        'empty' => 'Elija una opción',
                                        'label' => [
                                                'text' => 'PLAN ESTUDIO', 
                                                'class' => 'text-primary'
                                                ],
                                        'class' => 'form-control'
                              ]);?>

                              
                            </div>
                          
                            <div class="form-group col-sm-4 mx-auto">
                             <?= $this->Form->button('Crear',['class' => 'btn btn-primary btn-block']) ?>
                            </div>
                             <?= $this->Form->end() ?>
                        </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

