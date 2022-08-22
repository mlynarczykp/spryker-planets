<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Pyz\Zed\Planet\Business\PlanetFacadeInterface;
use Symfony\Component\HttpFoundation\Request;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;

/**
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 * @method PlanetFacadeInterface getFacade()
 */
class DeleteController extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idPlanet = $this->castId($request->query->get('id-planet'));

        if (empty($idPlanet)) {
            $this->addErrorMessage('missing planet id!');

            return $this->redirectResponse('/planet/list');
        }

        if ($idPlanet) {
            $planet = $this->getFacade()->findPlanetById($idPlanet);
            $this->getFacade()->deletePlanet($planet);
            $this->addSuccessMessage("Planet deleted successfully");
        } else {
            $this->addErrorMessage("Couldn't delete planet");
        }
        return $this->redirectResponse('/planet/list');
    }
}
