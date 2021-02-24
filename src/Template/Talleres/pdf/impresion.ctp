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

</style>

<!-- src/Template/Yop/pdf/view.ctp -->
<div class="footer">
	<em>---------------------------------------Centro de Cómputo UNS - <?php $hoy = getdate(); echo $hoy['year']; ?> - SGIC---------------------------------------</em>
</div>


    	<h3 class="titulo"><?= h("Reporte de Talleres") ?></h3>
    	   <table>

			        <tr>
			            <th scope="row"><?= __('Nombre de expositor') ?></th>
			            <th scope="row"><?= __('Fecha') ?></th>
			            <th scope="row"><?= __('Hora de Inicio') ?></th>
			            <th scope="row"><?= __('Hora de Fin') ?></th>
			            <th scope="row"><?= __('Código de Pago') ?></th>
			            <th scope="row"><?= __('Cursos Asociado') ?></th>
			        </tr>
					<?php foreach ($talleres as $valueTall): ?>
						        <tr>
						            <td><?= $valueTall->nombre_expositor; ?></td>
						            <td><?= $valueTall->fecha; ?></td>
						            <td><?= $valueTall->hora_inicio; ?></td>
						            <td><?= $valueTall->hora_fin; ?></td>
						            <td><?= $valueTall->cod_pago; ?></td>
						            <td><?= $valueTall->curso->nombre; ?></td>
						        </tr>
					<?php endforeach ?>

			</table>

    


