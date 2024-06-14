<?php $header = "<!-- partial:partials/_sidebar.html -->
      <nav class=\"sidebar sidebar-offcanvas\" id=\"sidebar\">
        <div class=\"sidebar-brand-wrapper d-none d-lg-flex align-items-center justify-content-center fixed-top\">
          <a class=\"sidebar-brand brand-logo\" href=\"index.php\"><img src=\"assets/images/logo.svg\" alt=\"logo\" /></a>
          <a class=\"sidebar-brand brand-logo-mini\" href=\"index.php\"><img src=\"assets/images/logo-mini.svg\" alt=\"logo\" /></a>
        </div>
        <ul class=\"nav\">
          <li class=\"nav-item profile\">
            <div class=\"profile-desc\">
              <div class=\"profile-pic\">
                <div class=\"count-indicator\">
                  <img class=\"img-xs rounded-circle \" src=\"assets/images/faces/face15.jpg\" alt=\"\">
                  <span class=\"count bg-success\"></span>
                </div>
                <div class=\"profile-name\">
                  <h5 class=\"mb-0 font-weight-normal\">$nome_administrador</h5>
                  <span>Administrador</span>
                </div>
              </div>
              
             
            </div>
          </li>
          <li class=\"nav-item nav-category\">
            <span class=\"nav-link\">Menu de Opções</span>
          </li>



          <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"index.php\">
              <span class=\"menu-icon\">
                <i class=\"mdi mdi-speedometer\"></i>
              </span>
              <span class=\"menu-title\">Dashboard</span>
            </a>
          </li>

         <li class=\"nav-item menu-items\">
                <a class=\"nav-link\" data-bs-toggle=\"collapse\" href=\"#ui-basic\" aria-expanded=\"false\" aria-controls=\"ui-basic\">
                  <span class=\"menu-icon\">
                    <i class=\"mdi mdi-motorbike\"></i>
                  </span>
                  <span class=\"menu-title\">Entregadores</span>
                  <i class=\"menu-arrow\"></i>
                </a>
            <div class=\"collapse\" id=\"ui-basic\">
              <ul class=\"nav flex-column sub-menu\">
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"lista_entregadores.php\">Lista de Entregadores</a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"registrar_entregadores.php\">Registrar Entregadores</a></li>
                
                
              </ul>
            </div>
          </li>

            <li class=\"nav-item menu-items\">
                        <a class=\"nav-link\" data-bs-toggle=\"collapse\" href=\"#ui-basic2\" aria-expanded=\"false\" aria-controls=\"ui-basic2\">
                          <span class=\"menu-icon\">
                            <i class=\"mdi mdi-truck-delivery\"></i>
                          </span>
                          <span class=\"menu-title\">Entregas</span>
                          <i class=\"menu-arrow\"></i>
                        </a>
            <div class=\"collapse\" id=\"ui-basic2\">
              <ul class=\"nav flex-column sub-menu\">
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"lista_entregas_por_data.php\">Entregas por Data</a></li>
                 <li class=\"nav-item\"> <a class=\"nav-link\" href=\"lista_entregas_pendentes.php\">Entregas Pendentes</a></li>
                 <li class=\"nav-item\"> <a class=\"nav-link\" href=\"lista_entregas_feitas.php\">Entregas Feitas</a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"lista_entregas_cancelas.php\">Entregas Canceladas</a></li>
                <li class=\"nav-item\"> <a class=\"nav-link\" href=\"registrar_entregas.php\">Registrar Nova Entrega</a></li>
                
              </ul>
            </div>
          </li>

         <li class=\"nav-item menu-items\">
                                <a class=\"nav-link\" data-bs-toggle=\"collapse\" href=\"#ui-basic3\" aria-expanded=\"false\" aria-controls=\"ui-basic3\">
                                  <span class=\"menu-icon\">
                                    <i class=\"mdi mdi-text\"></i>
                                  </span>
                                  <span class=\"menu-title\">Dados Gerais</span>
                                  <i class=\"menu-arrow\"></i>
                                </a>
                    <div class=\"collapse\" id=\"ui-basic3\">
                      <ul class=\"nav flex-column sub-menu\">
                        <li class=\"nav-item\"> <a class=\"nav-link\" href=\"relatorios_entregas.php\">Relatorio de Entregas</a></li>
                         <li class=\"nav-item\"> <a class=\"nav-link\" href=\"relatorios_entregadores.php\">Relatorio de Entregadores</a></li>                
                      </ul>
                    </div>
                  </li>



      

        <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"perfil.php\">
              <span class=\"menu-icon\">
                <i class=\"mdi mdi-account\"></i>
              </span>
              <span class=\"menu-title\">Meu Perfil</span>
            </a>
          </li>
          </li>
        
           <li class=\"nav-item menu-items\">
            <a class=\"nav-link\" href=\"logout.php\">
              <span class=\"menu-icon\">
                <i class=\"mdi mdi-logout\" style=\"color:red;\"></i>
              </span>
              <span class=\"menu-title\">Log Out</span>
            </a>
          </li>
         
        </ul>
      </nav>
      <!-- partial -->
      <div class=\"container-fluid page-body-wrapper\">
        <!-- partial:partials/_navbar.html -->
        <nav class=\"navbar p-0 fixed-top d-flex flex-row\">
          <div class=\"navbar-brand-wrapper d-flex d-lg-none align-items-center justify-content-center\">
            <a class=\"navbar-brand brand-logo-mini\" href=\"index.php\"><img src=\"assets/images/logo-mini.svg\" alt=\"logo\" /></a>
          </div>
          <div class=\"navbar-menu-wrapper flex-grow d-flex align-items-stretch\">
            <button class=\"navbar-toggler navbar-toggler align-self-center\" type=\"button\" data-toggle=\"minimize\">
              <span class=\"mdi mdi-menu\"></span>
            </button>
          <ul class=\"navbar-nav w-100\" style=\"visibility:hidden;\">
              <li class=\"nav-item w-100\">
                <form class=\"nav-link mt-2 mt-md-0 d-none d-lg-flex search\">
                  <input type=\"text\" class=\"form-control\" placeholder=\"Search products\">
                </form>
              </li>
            </ul>
            <ul class=\"navbar-nav navbar-nav-right\">
           
             
            
              <li class=\"nav-item dropdown border-left\">
                <a class=\"nav-link count-indicator dropdown-toggle\" id=\"notificationDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                  <i class=\"mdi mdi-bell\"></i>
                  <span class=\"count bg-danger\"></span>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"notificationDropdown\">
                  <h6 class=\"p-3 mb-0\">Notificações</h6>
                  
                  
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item preview-item\">
                    <div class=\"preview-thumbnail\">
                      <div class=\"preview-icon bg-dark rounded-circle\">
                        <i class=\"mdi mdi-calendar text-success\"></i>
                      </div>
                    </div>
                    <div class=\"preview-item-content\">
                      <p class=\"preview-subject mb-1\">Nova Entrega</p>
                      <p class=\"text-muted ellipsis  mb-0\"> Uma nova entrega foi atribuida para você! </p>
                    </div>
                  </a>
                  
                  
                  <div class=\"dropdown-divider\"></div>
                  <a class=\"dropdown-item preview-item\">
                    <div class=\"preview-thumbnail\">
                      <div class=\"preview-icon bg-dark rounded-circle\">
                        <i class=\"mdi mdi-settings text-danger\"></i>
                      </div>
                    </div>
                    <div class=\"preview-item-content\">
                      <p class=\"preview-subject mb-1\">Aviso</p>
                      <p class=\"text-muted ellipsis mb-0\"> Você acaba de ingressar em LuanFood Delivery </p>
                    </div>
                  </a>
                  
                </div>
              </li>
              <li class=\"nav-item dropdown\">
                <a class=\"nav-link\" id=\"profileDropdown\" href=\"#\" data-bs-toggle=\"dropdown\">
                  <div class=\"navbar-profile\">
                    <img class=\"img-xs rounded-circle\" src=\"assets/images/faces/face15.jpg\" alt=\"\">
                    <p class=\"mb-0 d-none d-sm-block navbar-profile-name\">$nome_administrador</p>
                    <i class=\"mdi mdi-menu-down d-none d-sm-block\"></i>
                  </div>
                </a>
                <div class=\"dropdown-menu dropdown-menu-right navbar-dropdown preview-list\" aria-labelledby=\"profileDropdown\">
                  <h6 class=\"p-3 mb-0\">Perfil</h6>
                  <div class=\"dropdown-divider\"></div>
                 
                  <div class=\"dropdown-divider\"></div>
                  
                  
                  <a class=\"dropdown-item preview-item\" href=\"perfil.php\">
                    <div class=\"preview-thumbnail\">
                      <div class=\"preview-icon bg-dark rounded-circle\">
                        <i class=\"mdi mdi-account text-info\"></i>
                      </div>
                    </div>
                    <div class=\"preview-item-content\">
                      <p class=\"preview-subject mb-1\">Meu Perfil</p>
                    </div>
                  </a>
                  
                   <a class=\"dropdown-item preview-item\" href=\"logout.php\">
                    <div class=\"preview-thumbnail\">
                      <div class=\"preview-icon bg-dark rounded-circle\">
                        <i class=\"mdi mdi-logout text-danger\"></i>
                      </div>
                    </div>
                    <div class=\"preview-item-content\">
                      <p class=\"preview-subject mb-1\">Sair</p>
                    </div>
                  </a>
                  <div class=\"dropdown-divider\"></div>
                  
                </div>
              </li>
            </ul>
            <button class=\"navbar-toggler navbar-toggler-right d-lg-none align-self-center\" type=\"button\" data-toggle=\"offcanvas\">
              <span class=\"mdi mdi-format-line-spacing\"></span>
            </button>
          </div>
        </nav>
     
    <script>
        function FecharModal(id, reload) {
           
            $(id).modal('hide');
            if(reload == 1) {
                window.location.reload();
            }
        }
        
        function ExibirModal(id) {
             $(id).modal('show');
        }
    </script>";