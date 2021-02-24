<?= $this->element('Users/navbar')?>


<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>
        
          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'users'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Ver usuario - <?php echo $user['fullname']; ?></div>
            <div class="card-body">
                <div class="container">
                    <div class="row text-center">
                        <div class="col-sm-6">
                            <div class="text-center">
                            <?= $this->Html->image('backend/fot.jpg',['class' => 'img-fluid rounded-circle','width' => '300px','heigth' => '300px'])?>
                            </div>
                        </div>
                        <div class="col-sm-6">
                              <p>Nombre: 
                              <?= $user->fullname ?></p>
                              <p>Usuario: 
                              <b><?= $user->username ?></b></p>
                              <p>Rol:  <b><?php if ($user->role == "admin") {
                                        echo "Administrador";
                                    }else{
                                        echo 'Usuario';
                                    } 
                                ?></b></p>
                               
                              <p>Estado: 
                              <?php if ($user->active = 1) {
                                  echo "Activo";
                              }else{
                                  echo "Inactivo";
                              } ?></p>
                              <p>
                              Creado: 
                              <?= $user['created']->format('Y-m-d h:i A'); ?></p>
                              <p>Modificado: 
                              <?= $user['modified']->format('Y-m-d h:i A'); ?></p>
                            
                            <td class="actions">
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class' => 'btn btn-sm btn-success']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class' => 'btn btn-sm btn-danger']) ?>
                            </td>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

