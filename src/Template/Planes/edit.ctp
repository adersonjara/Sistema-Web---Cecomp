<?= $this->element('Users/navbar')?>
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
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Editar Plan de Estudio</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($plane,['novalidate']) ?>
                            <div class="form-group">
                              <?= $this->Form->input('nombre', [
                                    'label' => [
                                        'text' => 'Nombre de Plan', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group">
                              <?= $this->Form->control('descripcion',['label' => [
                                        'text' => 'Descripcion de plan', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group">
                              <p><small>Ejemplo: Plan de Estudios PHP</small></p>
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
