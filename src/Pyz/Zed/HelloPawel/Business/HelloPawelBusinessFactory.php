<?php

namespace Pyz\Zed\HelloPawel\Business;

use Pyz\Zed\HelloPawel\Business\Reverser\StringReverser;
use Pyz\Zed\HelloPawel\Business\Reverser\StringReverserInterface;
use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;

class HelloPawelBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \Pyz\Zed\HelloPawel\Business\Reverser\StringReverser
     */
    public function createStringReverser(): StringReverser
    {
        return new StringReverser();
    }
}
