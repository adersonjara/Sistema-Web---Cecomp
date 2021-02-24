<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'cursos'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Agregar Curso</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($curso, ['type' => 'file','novalidate']) ?>
                            <div class="form-row">
                            <div class="form-group col-sm-6">
                              <?= $this->Form->input('nombre', [
                                    'label' => [
                                        'text' => 'Nombre Curso', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('photo', 
                              [
                                'type' => 'file',
                                'class'=> 'filestyle',
                                'data-btnClass' => 'btn-primary',
                                'data-text' => 'Buscar',
                                'label' => [
                                  'text' => 'Subir Imagen',
                                  'class' => 'text-primary'
                                ]
                                ]); ?>
                                <p class="font-chiqui">Es necesario para la web, pero puede dejarlo en blanco!</p>
                            </div>
                            <div class="form-group col-sm-12">
                              <?= $this->Form->control('descripcion',['label' => [
                                        'text' => 'Descripción', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('duracion',['label' => [
                                        'text' => 'Duración', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control',
                                    ]); ?>
                                    <p class="font-chiqui">Ejm: 6 semanas / 2 meses / 40 horas</p>
                            </div>
                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('plane_id', ['options' => $planes, 
                                        'empty' => 'Elija una opción',
                                        'label' => [
                                                'text' => 'PLAN ESTUDIO', 
                                                'class' => 'text-primary'
                                                ],
                                        'class' => 'form-control'
                              ]);?>
                            </div>
                          </div>
                            <div class="form-group col-md-4 mx-auto">
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



