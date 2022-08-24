<?php

namespace Pyz\Zed\HelloPawel\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Generated\Shared\Transfer\HelloPawelTransfer;

/**
 * @method \Pyz\Zed\HelloPawel\Business\HelloPawelFacadeInterface getFacade()
 */
class IndexController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array
     */
    public function indexAction(Request $request)
    {
        $helloPawelTransfer = new HelloPawelTransfer();
        $helloPawelTransfer->setOriginalString("Hello Pawel!");

        $helloPawelTransfer = $this->getFacade()->reverseString($helloPawelTransfer);

        return ['string' => $helloPawelTransfer->getReversedString()];
                    }
}
