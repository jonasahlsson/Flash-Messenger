<?php

// load config
require __DIR__.'/config_with_app.php'; 

// load stylesheet
$app->theme->addStylesheet('css/flash.css');

// Set page title
$app->theme->setTitle("Test flash messages");

// instantiate a flash messenger 
$di->setShared('flasher', function (){
    $flasher = new \Joah\Flash\CFlash();
    return $flasher;
});

// instantiate a flash messenger which uses the session
$di->setShared('sessionFlasher', function () use ($di) {
    $sessionFlasher = new \Joah\Flash\CFlashSession($di);
    $sessionFlasher->setDI($di);
    return $sessionFlasher;
});


$app->router->add('', function() use ($app) {

    $title = "Examples of Flash Message use";

    $content = "";
    $content .= $app->flasher->success('Hello world!');
    $content .= $app->flasher->notice('Hola mundo!');
    $content .= $app->flasher->warning('Bonjour monde!');
    $content .= $app->flasher->error('Hallo Welt!');
    
    $content .= "<p>Test different implementations of Flash message services using the links.</p>";
    
    
    $links = [
                [
                    'href' => $app->url->create(''), 'text' => 'Hello world with CFlash!',
                ],
                [
                    'href' => $app->url->create('flash-redirect'), 'text' => 'Use CFlashSession to send a message using the session.',
                ],
            ];
    
    $app->views->add('default/page', [
        'title' => $title,
        'content' => $content,
        'links' => $links
    ]);
});

// test a flash stored in session surviving a redirect
// redirect
$app->router->add('flash-redirect', function() use ($app) {
    
    // use flash with session with same syntax
    $app->sessionFlasher->notice('This text was passed via the session and survived a redirect!');
        
    //create url
    $url = $app->url->create('flash-redirect-target');
    // redirect
    $app->response->redirect($url);
});

// target route of redirect test
$app->router->add('flash-redirect-target', function() use ($app) {

    $title = "Flash Message sent via the session";
    
    $content = "";

    // output message using output
    $content .= $app->sessionFlasher->output();

    // clear message from session
    $app->sessionFlasher->flush();
    
    $links = [
                [
                    'href' => $app->url->create(''), 'text' => 'Hello world with CFlash!',
                ],
                [
                    'href' => $app->url->create('flash-redirect'), 'text' => 'Use CFlashSession to send a message using the session.',
                ],
            ];
    
    $app->views->add('default/page', [
        'title' => $title,
        'content' => $content,
        'links' => $links
    ]);
});


$app->router->handle();
$app->theme->render();
