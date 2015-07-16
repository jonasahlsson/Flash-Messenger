Flash Messenger
==============

A flash message module developed for use with Anax-MVC.

* Install with composer. 

* Open webroot/Flash-quicktest.php in your browser for a basic example.

* Copy webroot/flash-test.php into Anax-MVC/webroot and open in browser to see 
an example usage taking advantage of Anax-MVCs default config and views.

Install
-------
###Using composer###
Add the following dependency to your composer.json and run composer install/update.
>
>    "require": {  
>       "joah/flash-messenger":"1.0"  
>    }  
>

###Files###
The module is made up of classes containing flash message functionality, a stylsheet,
and an usage example file. 

*Classfiles* are located is src directory.
>src/CFlash.php  
>src/CFlashSession.php  

*Stylesheet* in webroot/css
>webroot/css/flash.css

The *usage example file* is located in the webroot directory. Copy file into Anax-MVC/webroot
and open i browser to get started swiftly.
>webroot/flash-test.php

Usage
-----

###Classes###
There are two classes, CFlash and the extended CFlashSession. CFlashSession supports 
sending messages via a session. Use whichever is suitable for your needs.

###Methods###
Send messages with *message()*, *error()*, *success()*, *notice()* or *warning()*. 
The methods take two arguments. Firstly the required message and secondly an optional 
HTML class attribute. 

###Instantiate###
Without session
>$di->setShared('flashMessenger', function (){  
>    $flashMessenger = new \Joah\Flash\CFlash();  
>    return $flashMessenger;  
>});  
>

With session support
> 
> $di->setShared('sessionFlasher', function () use ($di) {  
>     $sessionFlasher = new \Joah\Flash\CFlashSession($di);  
>     $sessionFlasher->setDI($di);  
>     return $sessionFlasher;  
> });  

###Send message###
Send messages using the methods *error()*, *success()*, *notice()*, *warning()* 
or *message()*. All the methods except message() has default HTML class attributes.  

> $app->flashMessenger->success('Hello world!');  
> $app->flashMessenger->notice('Hola mundo!');  
> $app->flashMessenger->warning('Bonjour monde!');  
> $app->flashMessenger->error('Hallo Welt!');  
> $app->flashMessenger->message('Hej världen!', 'xx-large-text');  

###Output message###
Messages can be outputted using the *output()* method or using the return value 
of the sending methods which all return an formatted message. 

Example using output():
> 
> $app->flashMessenger->success('message to send');
> 
> echo $flashMessenger->output();
> 

Example using return value:
> 
> $flashMessage = $flashMessenger->success('message to send');
> 
> echo $flashMessage;
> 

###Style###
There is a stylsheet webroot/css/flash.css with predefined styles. The methods 
error(), success(), notice() and warning() by default add their respective HTML class attributes (listed below). 
The class attributes can be replaced using the optional class argument when sending messages. The CSS 
in flash.css can of course be replaced.

> .flash-error {...}  
> .flash-success {...}  
> .flash-notice {...}  
> .flash-warning {...}  

