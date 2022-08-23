<?php

namespace Pyz\Zed\HelloPawel\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\HelloPawel\Business\HelloPawelBusinessFactory getFactory()
 */
class HelloPawelFacade extends AbstractFacade implements HelloPawelFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param string $stringToReverse
     *
     * @return string
     */
    public function reverseString(string $stringToReverse): string
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverseString($stringToReverse);
    }
}
