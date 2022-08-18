<?php

namespace Pyz\Zed\Planet\Communication\Controller;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Spryker\Zed\Kernel\Communication\Controller\AbstractGatewayController;
use Generated\Shared\Transfer\PlanetTransfer;

/**
 * @method \Pyz\Zed\Planet\Business\PlanetFacadeInterface getFacade()
 */
class GatewayController extends AbstractGatewayController
{
    /**
     * @param \Generated\Shared\Transfer\PlanetCollectionTransfer $planetCollectionTransfer
     *
     * @return \ArrayObject|PlanetCollectionTransfer|PlanetTransfer[]
     */
    public function getPlanetCollectionAction(?PlanetCollectionTransfer $planetCollectionTransfer
    ) {
        return $this->getFacade()->getPlanetsEntities();
    }
}
