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
	<em>---------------------------------------Centro de Cómputo UNS - <?php $hoy = getdate(); echo $hoy['year']; ?> SGIC---------------------------------------</em>
</div>

<?php foreach ($planes as $valuePlan): ?>
		<h2 style="text-align: center;"><u><?php echo $valuePlan->nombre ?></u></h2>

		<?php foreach ($sesiones as $valueSesion): ?>
				<?php if ($valuePlan->id == $valueSesion->plane_id): ?>

					<h4><u><?php echo $valueSesion->tema; ?></u></h4>

					<?php foreach ($subsesiones as $valueSub): ?>
						<?php if ($valueSesion->id == $valueSub->sesione_id): ?>
							<ol style="text-align: center;">
							<?php echo $valueSub->sub_tema."<br>"; ?>
							</ol>
						<?php endif ?>
					<?php endforeach ?>

				<?php endif ?>
		<?php endforeach ?>
<div class="page_break"></div>
<?php endforeach ?>
