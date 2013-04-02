<?php

use Amp\Async\CallResult;

class CallResultTest extends PHPUnit_Framework_TestCase {
    
    function testGetCallId() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = 'test', $error = NULL, $isComplete = FALSE);
        $this->assertEquals($callId, $cr->getCallId());
    }
    
    function testGetResult() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = 'test', $error = NULL, $isComplete = FALSE);
        $this->assertEquals('test', $cr->getResult());
    }
    
    /**
     * @expectedException Exception
     */
    function testGetResultThrowsExceptionOnErrorResult() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = NULL, $error = new Exception);
        $cr->getResult();
    }
    
    function testIsSuccess() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = 'test', $error = NULL, $isComplete = FALSE);
        $this->assertEquals(TRUE, $cr->isSuccess());
    }
    
    function testIsError() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = 'test', $error = NULL, $isComplete = FALSE);
        $this->assertEquals(FALSE, $cr->isError());
    }
    
    function testIsComplete() {
        $callId = pack('N', 55555555);
        $cr = new CallResult($callId, $result = 'test', $error = NULL, $isComplete = FALSE);
        $this->assertEquals(FALSE, $cr->isComplete());
    }
    
}

