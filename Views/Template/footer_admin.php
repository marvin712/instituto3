</main>
<script>
    let ctx = document.getElementById("myChart").getContext("2d");
    let ctx2 = document.getElementById("myChart2").getContext("2d");
    let ctx3 = document.getElementById("myChart3").getContext("2d");

    var myChart = new Chart(ctx, {
      type: "doughnut",
      data: {
        labels: ['col1', 'col2', 'col3'],
        datasets: [{
          label: 'Estudiantes',
          data: [2, 2, 6],
          backgroundColor: [
            'rgb(255, 99, 132)',
            
            'rgb(54, 162, 235)',
            
            'rgb(255, 205, 86)'
            
           
          ],
        }]
      }
    });

    var myChart2 = new Chart(ctx2, {
      type: "bar",
      data: {
        labels: ['col1', 'col2', 'col3'],
        datasets: [{
          label: 'Profesores',
          data: [9, 7, 11],

          //backgroundColor: '#FF9F40',
          backgroundColor:'#02D787',
        }]
      }
    });

    var myChart3 = new Chart(ctx3, {
      type: "line",
      data: {
        labels: ['col1', 'col2', 'col3'],
        datasets: [{
          label: 'Administradores',
          data: [4, 9, 4],
          backgroundColor: '#36A2EB',
        }]
      }
    });
  </script>

</script>
<!-- -->
<script>
  const base_url ="<?= base_url();?>"; 
  </script>
 <!-- Script Bootstrap 5 -->
 <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Librerias -->
  <script src="<?= media();?>/js/jquery-3.3.1.min.js"></script>
  <script src="<?= media();?>/js/popper.min.js"></script>
  <script src="<?= media();?>/main.js"></script>
  <script src="<?= media();?>/functions_admin.js"></script>
<!-- Plugins -->
<script src="<?= media(); ?>/js/plugins/pace.min.js"></script>
<!-- Data table plugin -->
<script type="text/javascript" src="<?= media();?>/js/plugins/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="<?= media();?>/js/plugins/dataTables.bootstrap.min.js"></script>

<script type="text/javascript" src="<?= media();?>/js/plugins/bootstap-select.min.js"></script>

<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>

    <script type="text/javascript" src="<?= media();?>/js/functions_admin.js"></script>

    <script src="<?= media();?>/js/<?= $data['page_functions_js'];?>"></script>
<!-- Sweet alert -->
<!-- <script type="text/javascript" src="<?= media();?>/js/plugins/sweetalert.min.js"></script> -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


<!-- Functions admin -->
<script src="<?= media();?>/js/functions_dashboard.js"></script> 
<script src="<?= media();?>/js/functions_roles.js"></script> 
<script src="<?= media();?>/js/functions_estudiantes.js"></script> 
<script src="<?= media();?>/js/functions_cursos.js"></script> 
<script src="<?= media();?>/js/functions_profesores.js"></script> 
<script src="<?= media();?>/js/functions_carreras.js"></script> 
<script src="<?= media();?>/js/functions_grados.js"></script> 
<script src="<?= media();?>/js/functions_secciones.js"></script> 
<script src="<?= media();?>/js/functions_administradores.js"></script> 
<script src="<?= media();?>/js/functions_asignaturas.js"></script> 



<!--  -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</body>

</html>