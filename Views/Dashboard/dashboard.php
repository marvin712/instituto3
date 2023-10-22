<?php headerAdmin($data);?>
<?php require_once('./Views/Template/nav_admin.php');?>
<?php require_once('./Views/Template/dashboard_header.php');?>
    <!--  -->
    <div class="container-fluid container-cards">
      <!-- Tittle -->
      <h1 class="h2 pb-4">Dashboard</h1>
      
      <div class="row mb-5">
        <div class="col-12 col-sm-2 col-md-3">
          <!-- Card -->
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="row">
                <div class="col d-flex justify-content-between">
                  <div>
                    <!-- Title -->
                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                      <span class="circle"></span><span class="legend-circle-sm bg-success"></span>Cursos
                    </h5>
                    <!-- Subtitle -->
                    <h2 class="mb-0">
                    <?= $data['cursos']; ?>
                    </h2>
                    <!-- Comment -->
                    <p class="fs-6 text-muted mb-0">
                      Total de cursos
                    </p>
                  </div>
                  <span class="text-primary d-flex align-items-center">

                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-eye card-icon" viewBox="0 0 16 16">
                      <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z" />
                      <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z" />
                    </svg>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-12 col-sm-2 col-md-3">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="row">
                <div class="col d-flex justify-content-between">
                  <div>
                    <!-- Title -->
                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                      <span class="circle2"></span><span class="legend-circle-sm bg-success"></span>Estudiantes
                    </h5>
                    <!-- Subtitle -->
                    <h2 class="mb-0" id="total">
                      <?= $data['estudiantes']; ?>
                    </h2>
                    <!-- Comment -->
                    <p class="fs-6 text-muted mb-0">
                      Estudiantes inscritos
                    </p>
                  </div>
                  <span class="text-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person card-icon" viewBox="0 0 16 16">
                      <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6Zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0Zm4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4Zm-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10Z"/>
                    </svg>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-12 col-sm-2 col-md-3">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="row">
                <div class="col d-flex justify-content-between">
                  <div>
                    <!-- Title -->
                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                      <span class="circle3"></span><span class="legend-circle-sm bg-success"></span>PROFESORES
                    </h5>
                    <!-- Subtitle -->
                    <h2 class="mb-0">
                    <?= $data['profesores']; ?>
                    </h2>
                    <!-- Comment -->
                    <p class="fs-6 text-muted mb-0">
                      Profesores inscritos
                    </p>
                  </div>
                  <span class="text-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-person-plus card-icon" viewBox="0 0 16 16">
                      <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z" />
                      <path fill-rule="evenodd" d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z" />
                    </svg>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div>
        <!--  -->
        <div class="col-12 col-sm-2 col-md-3">
          <div class="card border-0 shadow">
            <div class="card-body">
              <div class="row">
                <div class="col d-flex justify-content-between">
                  <div>
                    <!-- Title -->
                    <h5 class="d-flex align-items-center text-uppercase text-muted fw-semibold mb-2">
                      <span class="circle4"></span><span class=""></span>USUARIOS
                    </h5>
                    <!-- Subtitle -->
                    <h2 class="mb-0">
                    <?= $data['usuarios']; ?>
                    </h2>
                    <!-- Comment -->
                    <p class="fs-6 text-muted mb-0">
                      Usuarios del sistema
                      <i class="bi bi-3-square-fill"></i>
                    </p>
                  </div>
                  <span class="text-primary d-flex align-items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-people card-icon" viewBox="0 0 16 16">
                      <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8Zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022ZM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816ZM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0Zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4Z" />
                    </svg>
                  </span>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Graficos -->
      <h2>Gráficos</h2>
      <div class="container py-5">
      <div class="row mt-5">
        <div class="col-md-6 col-lg-4">
          <canvas id="myChart" width="150" height="150"></canvas>
        </div>
        <div class="col-md-6 col-lg-4">
          <canvas id="myChart2" width="150" height="150"></canvas>
        </div>
        <div class="col-md-6 col-lg-4">
          <canvas id="myChart3" width="150" height="150"></canvas>
        </div>
      </div>
      </div>

  
  <?php footerAdmin($data);?>