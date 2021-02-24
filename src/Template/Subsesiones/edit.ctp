<?= $this->element('Users/navbar')?>
<div class="content-wrapper">
        <div class="container-fluid">
<?= $this->Flash->render() ?>

          <!-- Nombre de gestor-->
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <?= $this->Html->link('Inico',['action' => 'index','controller' => 'subsesiones'])?>
            </li>
            <li class="breadcrumb-item active">Gestor de Administración!</li>
          </ol>
          <!-- Listado de usuarios -->
          <!-- Example DataTables Card-->
          <div class="card mb-3">
            <div class="card-header">
              <i class="fa fa-table"></i> Editar SubTema</div>
            <div class="card-body">
                <div class="container">


<div class="row">
    <div class="col-md-12">
        <?= $this->Form->create($subsesione,['novalidate','name' => 'f1']) ?>
        <div class="form-row">
        <div class="form-group col-sm-12">
          <?= $this->Form->input('sub_tema', [
                'label' => [
                    'text' => 'Subtema', 
                    'class' => 'text-primary'
                ],
                'class' => 'form-control',
                'type' => 'text'
            ]); ?>
        </div>
        <div class="form-group col-sm-12">
        <label for="miSelect" class="text-primary">Seleccione Plan de Estudio</label>
          <select id="miSelect" onchange="cambia();" name="plane_id" class="form-control">
            <option value="0">Selecciona......</option>
          </select>
           </div>
           <div class="form-group col-sm-12">
            <label for="miSelect2" class="text-primary">Seleccione Tema de Estudio</label>
          <select id="miSelect2" name="sesione_id" class="form-control">
              <option value="0">Selecciona......</option>
          </select>
          <p class="font-chiqui" style="color: red;">(Necesita seleccionar un tema)</p>
          </div>
       
      
        <div class="form-group col-sm-4 mx-auto">
         <?= $this->Form->button('Editar',['class' => 'btn btn-success btn-block']) ?>
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

<script type="text/javascript">
    'use strict';

    var miSelect=document.getElementById("miSelect");
    var miSelect2=document.getElementById("miSelect2");
    var planes=<?php echo json_encode($planes);?>;
    var temas=<?php echo json_encode($sesiones);?>;
    var indice;
    var indiceT;
    var indice2;
    var indiceT2;


    for(indice in planes)
    {
        // Creamos un objeto option
        var miOption=document.createElement("option");
        miOption.setAttribute("value",planes[indice].id);
        miOption.setAttribute("label",planes[indice].nombre);
        miSelect.appendChild(miOption);
        //console.log(planes[indice].nombre);
        //console.log("===================");
        for (indiceT in temas) {
            if (planes[indice].id == temas[indiceT].plane_id) 
            {
                /*console.log(temas[indiceT].nombre_tema);
                // Creamos un objeto option
                var miOption2=document.createElement("option");
                miOption2.setAttribute("value",temas[indiceT].id);
                miOption2.setAttribute("label",temas[indiceT].nombre_tema);
                miSelect2.appendChild(miOption2);*/
            }
        }
    }

     function cambia()
    {
        var tema;
        var planes;
        var plan = new Array();
        console.log(plan);
        var num_planes;
        tema = document.f1.plane_id[document.f1.plane_id.selectedIndex].value
        //console.log(tema);
        if (tema != 0) 
        {
var i=1;
            for (indiceT in temas) {

                if (tema == temas[indiceT].plane_id) 
                {
                 plan[i] =  {
                    id: temas[indiceT].id,
                    nombre: temas[indiceT].tema
                 }; 
                 i++;
                 console.log(temas[indiceT].tema+"*");
                }
            }
            planes = plan;

            //console.log(planes);
            
            num_planes = planes.length;
            document.f1.sesione_id.length = num_planes
            for (var i = 1 ; i < num_planes; i++) 
            {
                document.f1.sesione_id.options[i].value=planes[i].id
                document.f1.sesione_id.options[i].text=planes[i].nombre
            }
        }else{
                document.f1.sesione_id.length = 1
                document.f1.sesione_id.options[0].value = "0"
                document.f1.sesione_id.options[0].text = "Selecciona......"
        }
            document.f1.sesione_id.options[0].selected = true
            




    }
</script>
