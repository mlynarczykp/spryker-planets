<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \Pyz\Zed\Planet\Business\PlanetBusinessFactory getFactory()
 */
class PlanetFacade extends AbstractFacade implements PlanetFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer
     * @api
     *
     */
    public function savePlanet(PlanetTransfer $planetTransfer): PlanetTransfer
    {
        return $this->getFactory()
            ->createPlanetSaver()
            ->save($planetTransfer);
    }

    /**
     * {@inheritDoc}
     *
     * @param int $idPlanet
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer|null
     * @api
     *
     */
    public function findPlanetById(int $idPlanet): ?PlanetTransfer
    {
        return $this->getFactory()
            ->createPlanetReader()
            ->findPlanetById($idPlanet);
    }

    /**
     * {@inheritDoc}
     *
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer
     * @api
     *
     */
    public function getPlanetsEntities(): PlanetCollectionTransfer
    {
        return $this->getFactory()
            ->createPlanetReader()
            ->getAllPlanets();
    }
}
