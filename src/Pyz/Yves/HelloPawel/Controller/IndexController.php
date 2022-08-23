<?php

namespace Pyz\Yves\HelloPawel\Controller;

use Spryker\Yves\Kernel\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Client\HelloPawel\HelloPawelClientInterface getClient()
 */
class IndexController extends AbstractController
{
    /**
     * @param Symfony\Component\HttpFoundation\Request $request
     *
     * @return \Spryker\Yves\Kernel\View\View
     */
    public function indexAction(Request $request)
    {
        $data = ['reversedString' => 'Hello Pawel!'];

        return $this->view(
            $data,
            [],
            '@HelloPawel/views/index/index.twig'
        );
    }
}
