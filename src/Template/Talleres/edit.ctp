<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'talleres'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Editar Taller</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($tallere,['type' => 'file','novalidate']) ?>
                          <div class="form-row">
                            <div class="form-group col-md-12">
                            <?= $this->Form->control('nombre_expositor',['label' => [
                                        'text' => 'Nombre de Expositor ', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>

                          </div>
                            <div class="form-group col-md-12">
                              <label class="text-primary">Fecha <span class="text-danger">*</span></label>
                              <?= $this->Form->text('fecha',[
                                    'class' => 'form-control',
                                    'type' => 'date'
                                    ]); ?>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="text-primary">Hora Inicio <span class="text-danger">*</span></label>
                              <?= $this->Form->text('hora_inicio', [
                                    'class' => 'form-control',
                                    'type' => 'time'
                                    ]); ?>
                            </div>
                            <div class="form-group col-md-6">
                              <label class="text-primary">Hora Fin <span class="text-danger">*</span></label>
                              <?= $this->Form->text('hora_fin',[
                                    'class' => 'form-control',
                                    'type' => 'time'
                                    ]); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <?= $this->Form->control('descripcion',['label' => [
                                        'text' => 'Descripción Taller', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                          </div>
                          
                          
                          <div class="form-group">
                            <?= $this->Form->control('photo',['label' => [
                                        'text' => 'Foto ', 
                                        'class' => 'text-primary'
                                    ],
                                    'type' => 'file',
                                    'class'=> 'filestyle',
                                    'data-btnClass' => 'btn-primary',
                                    'data-text' => 'Buscar',
                                    ]); ?>
                                    <p class="font-chiqui">Es necesario para la web, pero puede dejarlo en blanco!</p>
                          </div>
                          <div class="form-group">
                            <?= $this->Form->control('url',['label' => [
                                        'text' => 'Link del Taller', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control',
                                      'type' => 'url'
                                    ]); ?>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('cod_pago',['label' => [
                                        'text' => 'Código de Pago', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control',
                                    'type' => 'select',
                                    'options' => ['615' => 615],
                                    'empty' => 'Seleccione código'
                                    ]); ?>
                            </div>
                            <div class="form-group col-md-4">
                              <?= $this->Form->control('curso_id', ['label' => [
                                        'text' => 'Curso Asociado',
                                        'class' => 'text-primary'
                                        ],
                                        'type' => 'select',
                                        'options' => $cursos,
                                        'empty' => 'Seleccione curso',
                                        'class' => 'form-control'
                                        ]); ?>
                                        
                            </div>
                          </div>
                          <div class="form-group col-sm-4 mx-auto">
                            <?= $this->Form->button('Editar',['class' => 'btn btn-success btn-block']) ?>
                          </div>
                        <?= $this->Form->end() ?>
                        </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

