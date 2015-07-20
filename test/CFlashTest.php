<?php

namespace Joah\Flash;

class CFlashTest extends \PHPUnit_Framework_TestCase
{

    /**
     *  Test
     *  
     *  @return void
     */
    public function testMessage() 
    {
        $flasher = new \Joah\Flash\CFlash();
        
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
    
    
    /**
     *  Test
     *  
     *  @return void
     *  
     */
    public function testMessageTypes()
    {
        $flasher = new \Joah\Flash\CFlash();

        //error
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $flasher->error($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        $this->assertEquals($flash, $html, "Error method did not output correctly formatted flash message");      

        //success
        $msg = "test message";
        $class = "custom-class";
        
        $flash = $flasher->success($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";

        $this->assertEquals($flash, $html, "Success method did not output correctly formatted flash message"); 
     
        //notice
        $msg = "test message";
        $class = null;
        
        $flash = $flasher->notice($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";
        $this->assertEquals($flash, $html, "Notice method did not output correctly formatted flash message");      

        //warning
        $msg = "test message";
        $class = null;
        
        $flash = $flasher->warning($msg, $class); 
        
        $html = "<div class='" . $class . "'>" . $msg . "</div>";

        $this->assertEquals($flash, $html, "Warning method did not output correctly formatted flash message"); 
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