<?php

namespace Pyz\Zed\HelloPawel\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;
use Generated\Shared\Transfer\HellopawelTransfer;

/**
 * @method \Pyz\Zed\HelloPawel\Business\HelloPawelBusinessFactory getFactory()
 */
class HelloPawelFacade extends AbstractFacade implements HelloPawelFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\HelloPawelTransfer $helloPawelTransfer
     *
     * @return \Generated\Shared\Transfer\HelloPawelTransfer
     * @api
     *
     */
    public function reverseString(HelloPawelTransfer $helloPawelTransfer): HelloPawelTransfer
    {
        return $this->getFactory()
            ->createStringReverser()
            ->reverseString($helloPawelTransfer);
    }
}
