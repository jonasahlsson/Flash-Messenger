Flash Messenger
==============

A flash message module developed for use with Anax-MVC.

* Point your browser to flash-quicktest.php for a first look.

* For further example uses. Copy webroot/flash-test.php and webroot/css/flash.css into Anax-MVC.


Install
-------

###Using composer###
To your composer.json add
>
>    "require": {
>       "joah/flash-messenger":"dev-master"
>    }
>

###Files###
The module is made up of classfiles containing flash message functionality, a stylsheet with styles,
and usage examples. 

*Classfiles* are located is src directory.
>src/CFlash.php
>src/CFlashSession.php

*Stylesheet* in webroot/css
>webroot/css/flash.css

*Usage examples* to get going quickly is located in webroot directory.
>webroot/flash-test.php
>webroot/flash-quicktest.php

Usage
-----
###Classes###
There are two classes CFlash and the extended CFlashSession. CFlashSession supports 
sending messages via a session. Use whichever is suitable for your needs.

###Methods###
Use *message()*, *error()*, *success()*, *notice()* or *warning()* to send messages. There are two arguments,
firstly the required message and secondly an optional html-class. 

###Instantiate###
Without session
>$di->setShared('flashMessenger', function (){
>    $flashMessenger = new Joah\Flash\CFlash();
>    return $flashMessenger;
>});
>

With session support
>
>$di->setShared('sessionFlasher', function () use ($di) {
>    $sessionFlasher = new Joah\Flash\CFlashSession($di);
>    $sessionFlasher->setDI($di);
>    return $sessionFlasher;
>});

###Send message###
>$app->flashMessenger->success('Hello world!');
>$app->flashMessenger->notice('Hola mundo!');
>$app->flashMessenger->warning('Bonjour monde!');
>$app->flashMessenger->error('Hallo Welt!');
>$app->flashMessenger->message('Hej världen!', 'xx-large-text');

###Output message###
Messages can be outputted using the *output()* method or using the return value 
of the sending methods which all return an formatted message. 

Example using output():
>
>$app->flashMessenger->success('message to send');
>
>echo $flashMessenger->output;
>

Example using return value:
>
>$flashMessage = $flashMessenger->error('message to send');
>
>echo $flashMessage;
>

###Style###
There is a stylsheet webroot/css/flash.css with predefined styles. The methods 
error(), success(), notice() and warning() all have default html class attributes. 
The class attributes can be replaced using the optional class argument.

> .flash-error {...}
> .flash-success {...}
> .flash-notice {...}
> .flash-warning {...}

