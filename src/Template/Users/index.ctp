<?= $this->element('Users/navbar')?>

    <div class="content-wrapper">
        <div class="container-fluid">
          <!-- Nombre de gestor-->
<?= $this->Flash->render() ?>
          
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
              <i class="fa fa-table"></i> Listado de usuarios
              <?= $this->Html->link(__('PDF'), ['action' => 'impresion','allUsers'.'.pdf'],['target' => '_blank','class' => 'btn btn-sm btn-warning float-right']) ?>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                      <tr>
                          <th scope="col"><?= $this->Paginator->sort('fullname',['Nombre Completo']) ?></th>
                          <th scope="col"><?= $this->Paginator->sort('username',['Usuario'=> 'Nombre de usuario']) ?></th>
                          <th scope="col"><?= $this->Paginator->sort('role',['Rol']) ?></th>
                          <th scope="col"><?= $this->Paginator->sort('active',['Modo'=> 'Estado']) ?></th>
                          <th scope="col" class="actions"><?= __('Acciones') ?></th>
                      </tr>
                  </thead>
                  <tbody>
                      <?php foreach ($users as $user): ?>
                      <tr>
                          <td><?= h($user->fullname) ?></td>
                          <td><?= h($user->username) ?></td>
                          <td><b>
                          <?php if ($user->role == "admin") {
                              echo "Administrador";
                          }else{
                              echo 'Usuario';
                          } ?>
                          </b></td>
                          <td><?php if ($user->active == 1) {
                              echo "Activo";
                          }else{
                              echo 'Inactivo';
                          } ?></td>
                          <td class="actions">
                              <?= $this->Html->link(__('Ver'), ['action' => 'view', $user->id],['class' => 'btn btn-sm btn-primary']) ?>
                              <?= $this->Html->link(__('Editar'), ['action' => 'edit', $user->id],['class' => 'btn btn-sm btn-success']) ?>
                              <?= $this->Form->postLink(__('Eliminar'), ['action' => 'delete', $user->id], ['confirm' => __('Are you sure you want to delete # {0}?', $user->id),'class' => 'btn btn-sm btn-danger']) ?>
                          </td>
                      </tr>
                      <?php endforeach; ?>
                  </tbody>
                </table>
                    <ul class="pagination">
                        <?= $this->Paginator->prev('< ') ?>
                        <?= $this->Paginator->numbers() ?>
                        <?= $this->Paginator->next('>') ?>
                    </ul>
              </div>
            </div>
            <div class="card-footer small text-muted">Centro de cómputo - 2018</div>
          </div>
        </div>
    </div>

