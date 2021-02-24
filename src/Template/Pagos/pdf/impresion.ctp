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

		.p {
			background-color: #2196f3 
		}

		.u {
			background-color: #ee6e73;
		}

		.t {
			background-color: #ff5722;
		}

		.v {
			background-color: #ffea00;
		}

		.c {
			text-align: center;
		}

</style>

<!-- src/Template/Yop/pdf/view.ctp -->
<div class="footer">
	<em>---------------------------------------Centro de Cómputo UNS - <?php $hoy = getdate(); echo $hoy['year']; ?> - SGIC---------------------------------------</em>
</div>

<?php $i=1; ?>
    	<h3 class="titulo"><?= h("Reporte de Pagos de Cursos") ?></h3>
    	<p class="c">(Códigos de pago)</p>
			 <table>
                        <tr>
                            <th scope="row">N°</th>
                            <th scope="row">Código Pago</th>
                            <th scope="row">Precio</th>
                            <th scope="row">Curso</th>
                            <th scope="row">Categoria</th>
                        </tr>
                        <?php foreach ($pagos as $pago): ?>

                        <tr>
                        	<td><?php 
                        		echo $i;
                        		$i++;
                        	 ?></td>
                            <td><?= $this->Number->format($pago->cod_pago) ?></td>
                            <td><?= "S/. ".$pago->precio.".00" ?></td>
                            <?php if (empty($pago['cursos'])): ?>
                              <td><b>No se asigno curso</b></td>
                            <?php else: ?>
                              <?php foreach ($pago['cursos'] as $value): ?>
	                               <td class="text-uppercase"><b><?= $value->nombre ?></b></td>        
	                          <?php endforeach ?>
                            <?php endif ?>
                            
                            <?php 
                            	switch ($pago->categoria) {

                            		case 'Público en General':
                            			echo "<td class='p'>$pago->categoria</td>";
                            			break;
                            		case 'Trabajadores UNS':
                            			echo "<td class='t'>$pago->categoria</td>";
                            			break;
                            		case 'Alumnos UNS':
                            			echo "<td class='u'>$pago->categoria</td>";
                            			break;
                            		case 'Virtual':
                            			echo "<td class='v'>$pago->categoria</td>";
                            			break;
                            		
                            		default:
                            			// code...
                            			break;
                            	}
                             ?>

                        </tr>
                        <?php endforeach; ?>
                </table>

    


