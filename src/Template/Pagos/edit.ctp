<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'pagos'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Editar Pago Curso</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($pago,['novalidate']) ?>
                            <div class="form-row">
                            <div class="form-group col-sm-6">
                              <?= $this->Form->input('cod_pago', [
                                    'label' => [
                                        'text' => 'Código Pago', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('precio',['label' => [
                                        'text' => 'Precio', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('categoria',['label' => [
                                        'text' => 'Modalidad', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control',
                                    'options' => ['Alumnos UNS' => 'Alumnos UNS','Trabajadores UNS' => 'Trabajadores UNS','Público en General' => 'Público en General','Virtual' => 'Virtual'],
                                    'empty' => 'Elija una opción'
                                    ]); ?>
                            </div>

                            <div class="form-group col-sm-6">
                              <?= $this->Form->control('cursos._ids',['label' => [
                                        'text' => 'Curso Asociado <span class="text-danger">*</span>', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control',
                                    'options' => $cursos,
                                    'escape' => false
                                    ]); ?>
                                    <p class="font-chiqui">Sino encuentra el curso, espere a que se cree el curso (Puede asiganarles varios cursos a la vez)!</p>
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


