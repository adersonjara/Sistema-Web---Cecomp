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


    	<h3 class="titulo"><?= h("Lista de Anuncios") ?></h3>
    	   <table>

			        <tr>
			            <th scope="row"><?= __('Nombre Anuncio') ?></th>
			            <th scope="row"><?= __('Descripción') ?></th>
			            <th scope="row"><?= __('Fecha Creación') ?></th>
			            <th scope="row"><?= __('Fecha Actualización') ?></th>
			        </tr>
					<?php foreach ($anuncios as $valueAnun): ?>
						        <tr>
						            <td style="text-align: justify;"><?= $valueAnun->nombre; ?></td>
						            <td style="text-align: justify;"><?= $valueAnun->descripcion; ?></td>
						            <td style="text-align: justify;"><?= $valueAnun['created']->format('Y-m-d h:i A'); ?></td>
						            <td style="text-align: justify;"><?= $valueAnun['modified']->format('Y-m-d h:i A'); ?></td>
						        </tr>
					<?php endforeach ?>

			</table>

    


