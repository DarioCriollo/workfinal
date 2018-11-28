<script src="<?php echo base_url();?>assets/export/js/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/dataTables.bootstrap.min.js"></script>
<!-- DataTables Export -->

<script src="<?php echo base_url();?>assets/export/js/dataTables.buttons.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/buttons.flash.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/jszip.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/pdfmake.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/vfs_fonts.js"></script>
<script src="<?php echo base_url();?>assets/export/js/buttons.html5.min.js"></script>
<script src="<?php echo base_url();?>assets/export/js/buttons.print.min.js"></script>
<link rel="stylesheet" href="<?php echo base_url();?>assets/export/css/buttons.dataTables.min.css">
<!-- FastClick -->
<!-- Content Wrapper. Contains page content -->
<br><br>
<input type="hidden" name="" id="url" value="<?php echo base_url(); ?>">

<div class="content-wrapper" style="margin-left:5px">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Report
        <small>Administrators</small>
        </h1>
    </section><br>
    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">


                </div>
                <hr>
                <div class="row" >
                    <div class="col-md-12" style="text-align:center">
                        <table id="example" class="table table-bordered table-hover" style="text-align:center">
                            <thead style="align:center" class="thead-dark">
                                <tr>
                                    <th>    Id </th>
                                    <th>    Name  </th>
                                    <th>    Lastname  </th>
                                    <!-- <th>    Code  </th>
                                    <th>    Email  </th> -->
                                    <th>    Delete  </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (!empty($datos)): ?>
                                    <?php foreach($datos as $dato):?>
                                        <tr>
                                            <td><?php echo $dato->id;?></td>
                                            <td><?php echo $dato->name;?></td>
                                            <td><?php echo $dato->nickname;?></td>
                                            <!-- <td><?php echo $dato->code;?></td>
                                            <td><?php echo $dato->email;?></td> -->

                                            <td>
                                              <?php $dat=$dato->id; ?>

                                              <button type="button" class="btn btn-danger"  onclick="eliminarAdmin(<?php echo $dato->id;?>);">Delete</button>
                                                <!-- <button type="submit" id="grafica" class="btn btn-info btn-view-venta" value="<?php echo $venta->id;?>" data-toggle="modal" data-target="#modal-default"><?php echo $venta->id;?></button> -->
                                            </td>
                                        </tr>
                                    <?php endforeach;?>
                                <?php endif ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion de la venta</h4>
      </div>
      <div class="modal-body">
        <?php echo $venta->id ?>
        <script>
        var valorBoton = $('#grafica').val();
        </script>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<script>

function eliminarAdmin(id){

  confirmar=confirm("Estas Seguro");
  if (confirmar){
  $.ajax({
    url:$("#url").val()+"administrador/deleteA",
    type:"post",
    data:{xid:id},
    beforeSend:function(){
      $("#resultados").html("espere un momento ......");
    },
    success:function(datos){
      window.location.reload();
      //alert('sisisis');
      //sale();

    },

    error:function(){
      $("#resultados").html("No se ha encontrado nada");
    },

  });

}else{

}

}

$('#example').DataTable( {
      dom: 'Bfrtip',
      autoWidth: true,
      buttons: [
          {
              extend: 'excelHtml5',
              title: "List of Correct Answers",
              exportOptions: {
                  columns: [ 0, 1,2, 3, 4, 5, 6 ]
              }
          },
          {
              extend: 'pdfHtml5',
              title: "Listado de Resultados",
              alignment: 'center',
              exportOptions: {
                  columns: [ 0, 1,2, 3, 4, 5, 6 ],
                  alignment: 'center',
              }


          }
      ],

      language: {
          "lengthMenu": "Mostrar _MENU_ registros por pagina",
          "zeroRecords": "No se encontraron resultados en su busqueda",
          "searchPlaceholder": "Buscar registros",
          "info": "Mostrando registros de _START_ al _END_ de un total de  _TOTAL_ registros",
          "infoEmpty": "No existen registros",
          "infoFiltered": "(filtrado de un total de _MAX_ registros)",
          "search": "Buscar:",
          "paginate": {
              "first": "Primero<br>",
              "last": "Último",
              "next": "   Siguiente ",
              "previous": "Anterior   "
          },
      }
  });
  function sale(){
    $.ajax({
      url:$("#url").val()+"administrador/deleteadmin",
      type:"post",
      beforeSend:function(){
        $("#resultados").html("espere un momento ......");
      },
      success:function(datos){
        alert('bien bien');
      },

      error:function(){
        $("#resultados").html("No se ha encontrado nada");
      },

    });
  }
</script>
