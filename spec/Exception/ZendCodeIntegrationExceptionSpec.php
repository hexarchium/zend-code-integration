<?php

namespace spec\Hexarchium\ZendCodeIntegration\Exception;

use Hexarchium\ZendCodeIntegration\Exception\ZendCodeIntegrationException;
use PhpSpec\ObjectBehavior;

class ZendCodeIntegrationExceptionSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType(ZendCodeIntegrationException::class);
        $this->shouldBeAnInstanceOf(\Exception::class);
    }
}
