<?php

ob_start(); // Controle de Cash

require __DIR__."/vendor/autoload.php";

/**
 * BOOTSTRAP
 */
use Source\Core\Session;
use CoffeeCode\Router\Router;

$session = new Session();
$route = new Router(url(), ":");

/**
 * WEB ROUTES
 */
$route->namespace("Source\App");
$route->get("/", "Web:home");
$route->get("/home", "Web:home");
$route->get("/sobre", "Web:about");

//agenda
$route->group("/contatos");
$route->get("/", "Web:contact");

//auth
$route->group(null);
$route->get("/entrar", "Web:login");
$route->post("/entrar", "Web:login");
$route->get("/cadastrar", "Web:register");
$route->post("/cadastrar", "Web:register");
$route->get("/recuperar", "Web:forget");
$route->post("/recuperar", "Web:forget");
$route->get("/recuperar/{code}", "Web:reset");
$route->post("/recuperar/resetar", "Web:reset");

//assinatura de email
$route->get("/email", "Web:creatorCard");

//optin
$route->get("/confirma", "Web:confirm");
$route->get("/obrigado/{email}", "Web:success");

/**
 * ADMIN ROUTES
 */
$route->namespace("Source\App\Admin");
$route->group("/admin");

//login
$route->get("/", "Login:root");
$route->get("/login", "Login:login");
$route->post("/login", "Login:login");

//dash
$route->get("/dash", "Dash:dash");
$route->get("/dash/home", "Dash:home");
$route->post("/dash/home", "Dash:home");
$route->get("/logoff", "Dash:logoff");


/**
 * APP
 */
$route->group("/dashboard");
$route->get("/", "Dashboard:homeDash");
$route->get("/sair", "Dashboard:logout");




// Users
$route->get("/cadastrar-usuario", "Dashboard:registerUser");
$route->post("/cadastrar-usuario", "Dashboard:registerUser");
$route->get("/perfil", "Dashboard:userProfile");
$route->post("/perfil", "Dashboard:userProfile");
$route->get("/editar-usuario/{id}", "Dashboard:updatedUser");
$route->post("/editar-usuario", "Dashboard:updatedUser");
$route->get("/excluir-usuario/{id}", "Dashboard:deletedUser");
$route->get("/excluir-definitivo-usuario/{id}", "Dashboard:deleteUser");
$route->get("/reativar-usuario/{id}", "Dashboard:reactivatedUser");
$route->get("/listar-usuarios", "Dashboard:userDash");
$route->get("/lixeira-usuarios", "Dashboard:userTrashDash");

// Contacts
$route->get("/listar-contatos", "Dashboard:contactDash");
$route->get("/lixeira-contatos", "Dashboard:contactTrashDash");
$route->get("/cadastrar-contato", "Dashboard:registerContact");
$route->post("/cadastrar-contato", "Dashboard:registerContact");
$route->get("/editar-contato/{id}", "Dashboard:updatedContact");
$route->post("/editar-contato", "Dashboard:updatedContact");
$route->get("/excluir-contato/{id}", "Dashboard:deletedContact");
$route->get("/excluir-definitivo-contato/{id}", "Dashboard:deleteContact");
$route->get("/reativar-contato/{id}", "Dashboard:reactivatedContact");

// Sectors
$route->get("/listar-setores", "Dashboard:sectorDash");
$route->get("/lixeira-setores", "Dashboard:sectorTrashDash");
$route->get("/cadastrar-setor", "Dashboard:registerSector");
$route->post("/cadastrar-setor", "Dashboard:registerSector");
$route->get("/editar-setor/{id}", "Dashboard:updatedSector");
$route->post("/editar-setor", "Dashboard:updatedSector");
$route->get("/excluir-setor/{id}", "Dashboard:deletedSector");
$route->get("/excluir-definitivo-setor/{id}", "Dashboard:deleteSector");
$route->get("/reativar-setor/{id}", "Dashboard:reactivatedSector");
$route->get("/reativar-setor-contact/{id}", "Dashboard:reactivatedSectorContact");

//blog
$route->group("/blog");
$route->get("/", "Web:blog");
$route->get("/p/{page}", "Web:blog");
$route->get("/{uri}", "Web:blogPost");
$route->post("/buscar", "Web:blogSearch");
$route->get("/buscar/{terms}/{page}", "Web:blogSearch");
$route->get("/em/{category}", "Web:blogCategory");
$route->get("/em/{category}/{page}", "Web:blogCategory");
$route->get("/por/{author}", "Web:blogAuthor");
$route->get("/por/{author}/{page}", "Web:blogAuthor");



/**
 * ERROR ROUTES
 */
$route->namespace("Source\App")->group("/ops"); //Estilize a rota de erros
$route->get("/{errcode}", "Web:error"); //Trate os erros

/**
 * ROUTE
 */
$route->dispatch(); // Execute a rota

/**
 * ERROR REDIRECT
 */
if($route->error()) {
    $route->redirect("/ops/{$route->error()}"); //Apresente na url ops o código de erro
}


ob_end_flush(); // Entrega de Cash

