Flash messages
==============

This is a flash message module developed for use with Anax-MVC.

Install
-------

***Using composer***
To your composer.json add
>
>    "require": {
>        "FlashMessenger": ">=5.4"
>    }
>

***Files***
Say something about the different files and where they belong in Anax-MVC.


Usage
-----
* Point your browser to flash-quicktest.php for a first look.

* For proper use. Copy files into and see flash-test.php for usage examples.

***Classes***
There are two classes CFlash and the extended CFlashSession. CFlashSession supports 
sending messages via a session. Use whichever is suitable for your needs.

***Methods***
Use *message()*, *error()*, *success()*, *notice()* or *warning()* to send messages. There are two arguments,
first the required message and second an optinal html-class to accompany the message.


>$di->setShared('flashMessenger', function (){
>    $flashMessenger = new Joah\Flash\CFlash();
>    return $flashMessenger;
>});
>
>$app->flashMessenger->success('Hello world!');
>$app->flashMessenger->notice('Hola mundo!');
>$app->flashMessenger->warning('Bonjour monde!');
>$app->flashMessenger->error('Hallo Welt!');
>$app->flashMessenger->message('Hej världen!');

Messages can be displayed with the *output()* method or using the fact that the methods 
sending messages also return an formatted message. 

Examples:
>
>$flashMessenger->error('message to send');
>
>echo $flashMessenger->output;
>

or

>
>$flashMessage = $flashMessenger->error('message to send');
>
>echo $flashMessage;
>

***Style***
There is an stylsheet with predefined styles flash.css in webroot/css. 
