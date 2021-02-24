<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title> CECOMP - ERROR</title>
    <?= $this->Html->css(['bootstrap.min','font-awesome.min','error']) ?>
</head>
<style type="text/css">
    .page-wrap {
        min-height: 100vh;
    }
    body {
        background-color: #d33c44;
    }
    .lead {
        color: #fff;
    }
</style>
<body>

    <div class="page-wrap d-flex flex-row align-items-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 text-center">
                    <span class="display-1 d-block">404</span>
                    <div class="mb-4 lead">La página que estas buscando, no se encuentra disponible!!</div>
                    <?= $this->Html->link('<i class="fa fa-home" aria-hidden="true"></i> Regresar el inicio',['controller' => 'cursos','action' => 'home'],['class' => 'btn btn-warning btn-lg','escape' => false])?> 
                </div>
            </div>
        </div>
    </div>
	
	
	
</body>
</html>

