<?php

namespace Pyz\Zed\HelloPawel\Communication\Controller;

use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

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
        $originalString = "Hello Pawelslakfjalksgklaj!";
        $reversedString = $this->getFacade()->reverseString($originalString);
        return ['string' => $reversedString];
    }
}
