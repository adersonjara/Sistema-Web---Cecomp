
<style>
	.container{
		background: #fff;
	}
</style>
<section class="login-block">
    <div class="container">
		<div class="row">
			<div class="col-lg-4 login-sec">
				<br>
				<br>
				    <p class="text-muted text-center font-italic d-none d-block d-lg-none">(Sistema Gestión de Cursos - CECOMP)</p>
				    <h2 class="text-center">Ingresar - SGIC</h2>
				    <?= $this->Form->create() ?>
					  <div class="form-group">
					    <label class="text-uppercase">Username</label>
					    <?= $this->Form->input('username',['class' => 'form-control','label' => false]) ?>
					    
					  </div>
					  <div class="form-group">
					    <label class="text-uppercase">Password</label>
					    <?= $this->Form->input('password',['class' => 'form-control','label' => false]) ?>
					  </div>
					  <div class="form-check">
					    <?= $this->Form->button('LOGIN',['class' => 'btn btn-login float-right']); ?>
					  </div>
					  <div class="form-group">
						<?= $this->Flash->render('auth') ?>
					  </div>
					<?= $this->Form->end() ?>

					  
			</div>
			<div class="col-lg-8  banner-sec d-none d-lg-block ">
		        <?= $this->Html->image('backend/login2.jpg', ['alt' => 'Cecomp Login','class' => 'img-fluid']); ?>
			</div>
		</div>
	</div>
</section>
