<?php headerProfesor($data); ?>
<?php require_once('./Views/Profesores/nav_profesores.php'); ?>
<?php require_once('./Views/Profesores/profesores_header.php'); ?>
<?php require_once('./Controllers/CursosProfesor.php'); ?>
<!--  -->
<div class="container-fluid container-cards">
    <!-- Tittle -->
    <h1 class="h2 pb-4">Cursos | Instituto Alejandro Córdova</h1>
    <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Bimestres</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <!-- <table class="table table-hover table-bordered" id="tableBimestres">
                    <thead>
                      <tr>
                        <th>Id</th>
                        <th>Bimestre</th>
                      
                      
                       
                      </tr>
                    </thead>
                   <tbody>

                   </tbody>
                  </table> -->
                  <div class="d-flex justify-content-center gap-4">
                      <div>
                        <a href="<?= base_url();?>/actividades" class="btn btn-secondary text-white py-4 px-3">Bimestre 1</a> 
                      </div>
                      <div>
                        <a href="<?= base_url();?>/actividades" class="btn btn-secondary text-white py-4 px-3">Bimestre 2</a>
                      </div>
                      <div>
                        <a href="<?= base_url();?>/actividades" class="btn btn-secondary text-white py-4 px-3">Bimestre 3</a>
                      </div>
                      <div>
                        <a href="<?= base_url();?>/actividades" class="btn btn-secondary text-white py-4 px-3">Bimestre 4</a>
                      </div>
                  </div>
      </div>
   
    </div>
  </div>
</div>

    <div class="row mt-5 gap-5">
        <?php
        
        ?>

        <h2></h2>
        <div class="col-md-3">
            <div class="card shadow border-0">
                <img src="https://cdn.sanity.io/images/nosafynr/openlms-production/22f3bda5d4b3877abc9590aeb0880f95face37c5-1348x758.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="text-center fw-bold">Código: <span></span></h5>
                       <!-- <p><?= $_SESSION['userNombreCurso']['NombreCurso'];?> </p> -->
                    <?php 
                    
                    if (isset($_SESSION['NombreCurso'])) {
                     
                     echo("Si hay datos....");
                  
                  }else{
                    echo("No existe :(");
                  }
                    ?>
                    <div class="d-flex justify-content-center">
                    <button type="button" class="btn btn-secondary text-white py-3 px-5 fs-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Entrar
</button>
                    </div>
                </div>
            </div>
        </div>




    </div>



</div>

<?php footerProfesor($data); ?>