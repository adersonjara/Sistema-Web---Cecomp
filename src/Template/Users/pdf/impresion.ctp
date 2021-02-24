<style type="text/css">
		table, td, th {    
		    border: 1px solid #ddd;
		    text-align: left;
		}

		table {
		    border-collapse: collapse;
		    width: 100%;
		}

		th, td {
		    padding: 15px;
		}

		h3{
			font-size: 60px;
			font-family: times;
		}

		.titulo{
		    text-align: center;
		    text-transform: uppercase;
		    color: black;
		}

		.center{
			text-align: justify;
			font-size: 38px;
		}
		.page_break {
		    page: teacher;
		    page-break-before: always;
		}
		.header, .footer {
		    margin:0 -100px;
		    padding:0 100px;
		    width: 100%;
		    position: fixed;
		}
		.header {
		    top: -40pt;
		    padding-bottom: 0px;
		}
		.footer {
		    bottom: 10px;
		    padding-top: 5px;
		    text-align: center;
		}

		.c {
			text-align: center;
		}

</style>

<!-- src/Template/Yop/pdf/view.ctp -->
<div class="footer">
	<em>---------------------------------------Centro de Cómputo UNS - <?php $hoy = getdate(); echo $hoy['year']; ?> - SGIC---------------------------------------</em>
</div>


    	<h3 class="titulo"><?= h("Reporte de usuarios") ?></h3>
    	<p class="c">(Sistema de Gestión de Cursos)</p>
    	   <table>

			        <tr>
			            <th scope="row"><?= __('Nombre Completo') ?></th>
			            <th scope="row"><?= __('Usuario') ?></th>
			            <th scope="row"><?= __('Role') ?></th>
			            <th scope="row"><?= __('Estado') ?></th>
			        </tr>
					<?php foreach ($users as $valueUser): ?>
						        <tr>
						            <td"><?= $valueUser->fullname; ?></td>
						            <td"><?= $valueUser->username; ?></td>
						            <td"><?php
						            	if ($valueUser->role == "admin") {
						            		echo 'Administrador';
						            	}else{
						            		echo 'Usuario';
						            	}
						             ?></td>
						            <td"><?php 
						            	if ($valueUser->active == 1) {
						            		echo 'Activo';
						            	}else{
						            		echo 'Inactivo';
						            	}
						             ?></td>
						        </tr>
					<?php endforeach ?>

			</table>

    


