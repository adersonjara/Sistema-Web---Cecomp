<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'anuncios'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de Anuncios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Agrear Anuncio</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($anuncio,['type' => 'file','novalidate']) ?>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <?= $this->Form->input('nombre', [
                                    'label' => [
                                        'text' => 'Nombre Anuncio', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group col-md-6">
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
                            <div class="form-group col-md-12">
                              <?= $this->Form->control('descripcion',['label' => [
                                        'text' => 'Descripción', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                          </div>
                          <div class="form-group">
                            <?= $this->Form->control('url',['label' => [
                                        'text' => 'URL', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                          </div>
                            <div class="form-group">
                               <?= $this->Form->control('curso_id', [
                                'label' => [
                                    'text' => 'Curso Asociado',
                                    'class' => 'text-primary'
                                ],
                                'class' => 'custom-select',
                                'type' => 'select',
                                'options' => $cursos,
                                'empty' => 'Elija una opción',
                                'required' => true
                                ]); ?>
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




