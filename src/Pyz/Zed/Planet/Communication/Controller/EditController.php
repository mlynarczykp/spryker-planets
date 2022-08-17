<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

/**
 * @method \Pyz\Zed\Planet\Communication\PlanetCommunicationFactory getFactory()
 * @method \Pyz\Zed\Planet\Business\PlanetFacadeInterface getFacade()
 */
class EditController extends AbstractController
{
    /**
     * @param \Symfony\Component\HttpFoundation\Request $request
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    public function indexAction(Request $request)
    {
        $idPlanet = $this->castId($request->query->get('id-planet'));

        if (empty($idPlanet)) {
            $this->addErrorMessage('missing planet id!');

            return $this->redirectResponse('/planet/list');
        }

        $planet = $this->getFacade()->findPlanetById($idPlanet);
        $planetTransfer = (new PlanetTransfer())
            ->setIdPlanet($idPlanet)
            ->setName($planet->getName())
            ->setInterestingFact($planet->getInterestingFact())->setNumberOfMoons($planet->getNumberOfMoons());

        $planetForm = $this->getFactory()
            ->createPlanetForm($planetTransfer)
            ->handleRequest($request);

        if ($planetForm->isSubmitted() && $planetForm->isValid()) {
            $this->getFacade()
                ->savePlanet($planetForm->getData());
            $this->addSuccessMessage('Planet was updated.');
            return $this->redirectResponse('/planet/list');
        }

        return $this->viewResponse([
            'planetForm' => $planetForm->createView()
        ]);
    }
}
