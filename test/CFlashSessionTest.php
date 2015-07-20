<?php

namespace Joah\Flash;

class CFlashSessionTest extends \PHPUnit_Framework_TestCase
{
    private $flasher;
    
    /**
     *  Setup
     */
    public function setUp()
    {
        //instantiate a flasher and inject di
        $this->flasher = new \Joah\Flash\CFlashSession();
        $di    = new \Anax\DI\CDIFactoryDefault();
        $this->flasher->setDI($di);
        
        $di->setShared('session', function () {
        $session = new \Anax\Session\CSession();
        $session->configure(ANAX_APP_PATH . 'config/session.php');
        $session->name();
        //$session->start();
        return $session;
        });
    }

    /**
     *  Test
     *  
     *  @return void
     */
    public function testMessageSession() 
    {
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $this->flasher->message($msg, $class);
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        
        // test return syntax
        $this->assertEquals($flash, $html, "Flash message not returned or formatted as expected by return syntax"); 
        
        // test output syntax
        $output = $this->flasher->output();
        $this->assertEquals($flash, $html, "Flash message not returned or formatted as expected by output message"); 
    }
    
    /**
     *  Test
     *  
     *  @return void
     *  
     */
    public function testMessageTypes()
    {

        //error
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $this->flasher->error($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        $this->assertEquals($flash, $html, "Error method did not output correctly formatted flash message");      

        //success
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $this->flasher->success($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";

        $this->assertEquals($flash, $html, "Success method did not output correctly formatted flash message"); 
     
        //notice
        $msg = "test message";
        $class = null;
        
        $flash = $this->flasher->notice($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        $this->assertEquals($flash, $html, "Notice method did not output correctly formatted flash message");      

        //warning
        $msg = "test message";
        $class = null;
        
        $flash = $this->flasher->warning($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";

        $this->assertEquals($flash, $html, "Warning method did not output correctly formatted flash message"); 
    
    }
    
    
    /**
     *  Test flush
     *  
     *  @return void
     */
    public function testFlush()
    {
        $this->flasher->message('This message shall not reach the output');
        
        $this->flasher->flush();
        $output = $this->flasher->output();
        $this->assertEquals($output, null, "Flush didn't do it's job."); 
    }

    /**
     *  Test output
     *  
     *  @return void
     */
    public function testOutput()
    {
        $flasher = new \Joah\Flash\CFlash();
        
        $msg = "test message";
        $class = "custom-class";
        
        $flasher->message($msg, $class);
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        
        $output = $flasher->output();
        $this->assertEquals($output, $html, "Output didn't output the expected output string."); 
    }

}