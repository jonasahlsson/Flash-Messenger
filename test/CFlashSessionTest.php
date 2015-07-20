<?php

namespace Joah\Flash;

class CFlashSessionTest extends \PHPUnit_Framework_TestCase
{
    /**
     *  Test
     *  
     *  @return void
     */
    public function testMessageSession() 
    {
        $flasher = new \Joah\Flash\CFlashSession();
        $di    = new \Anax\DI\CDIFactoryDefault();
        $flasher->setDI($di);
        
        $di->setShared('session', function () {
        $session = new \Anax\Session\CSession();
        $session->configure(ANAX_APP_PATH . 'config/session.php');
        $session->name();
        //$session->start();
        return $session;
    });
        
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $flasher->message($msg, $class);
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        
        // test return syntax
        $this->assertEquals($flash, $html, "Flash message not returned or formatted as expected by return syntax"); 
        
        // test output syntax
        $output = $flasher->output();
        $this->assertEquals($flash, $html, "Flash message not returned or formatted as expected by output message"); 
    }

}