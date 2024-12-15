<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);


// Grupo de rutas protegidas para administradores
$routes->group('type', ['filter' => 'SessionAdmin'], function ($routes) {
    $routes->get('/', 'AdminController::index'); // Ruta principal de administradores
});

// Grupo de rutas protegidas para editores
$routes->group('type', ['filter' => 'SessionEditor'], function ($routes) {
    $routes->get('/', 'EditorController::index'); // Ruta principal de editores
});

// Grupo de rutas protegidas para espectadores
$routes->group('type', ['filter' => 'SessionViewer'], function ($routes) {
    $routes->get('/', 'ViewerController::index'); // Ruta principal de espectadores
});

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('/inicio', 'Home::inicio');
$routes->post('/login', 'Home::login');
$routes->get('/salir', 'Home::salir');


// Rutas de la API de gastos personales
$routes->group('api', function($routes) {
    // Ruta para obtener todos los gastos
    $routes->get('gastos', 'GastoController::index');

    // Ruta para registrar un nuevo gasto
    $routes->post('gastos', 'GastoController::create');

    // Ruta para actualizar un gasto existente
    $routes->put('gastos/(:num)', 'GastoController::update/$1');

    // Ruta para eliminar un gasto por su ID
    $routes->delete('gastos/(:num)', 'GastoController::delete/$1');

    // Ruta para obtener un gasto por ID
    $routes->get('gastos/(:num)', 'GastoController::show/$1');
    
});

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
