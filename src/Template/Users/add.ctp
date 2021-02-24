<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inicio',['action' => 'index','controller' => 'users'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Agregar Usuario</div>
            <div class="card-body">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <?= $this->Form->create($user,['novalidate']) ?>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <?= $this->Form->input('fullname', [
                                    'label' => [
                                        'text' => 'Nombre Completo', 
                                        'class' => 'text-primary'
                                    ],
                                    'class' => 'form-control'
                                ]); ?>
                            </div>
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('username',['label' => [
                                        'text' => 'Nombre de Usuario', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control']); ?>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('password',['type' => 'password','label' => [
                                          'text' => 'Contraseña', 
                                          'class' => 'text-primary'
                                      ],'class' => 'form-control']); ?>
                            </div>
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('password_match',['type' => 'password','label' => [
                                          'text' => 'Repetir Contraseña', 
                                          'class' => 'text-primary'
                                      ],'class' => 'form-control']); ?>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('role',['label' => [
                                        'text' => 'Rol', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control','options' => ['user'=> 'Usuario','admin' => 'Administrador']]); ?>
                            </div>
                            <div class="form-group col-md-6">
                              <?= $this->Form->control('active',['label' => [
                                        'text' => 'Estado', 
                                        'class' => 'text-primary'
                                    ],'class' => 'form-control','options' => ['1' => 'Activo','0' => 'Inactivo']]); ?>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-4 mx-auto">
                              <?= $this->Form->button('Crear',['class' => 'btn btn-primary btn-block']) ?>
                            </div>
                          </div>
                        <?= $this->Form->end() ?>
                        </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>


