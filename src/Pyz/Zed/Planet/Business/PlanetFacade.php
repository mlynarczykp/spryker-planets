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
     * @param \Generated\Shared\Transfer\PlanetCollectionTransfer $planetsRestApiTransfer
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer $planetsRestApiTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetsRestApiTransfer): PlanetCollectionTransfer
    {
        return $this->getFactory()
            ->createPlanetReader()
            ->getPlanetCollection($planetsRestApiTransfer);
    }


    /**
     * {@inheritDoc}
     *
     * @param \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
     * @return void
     * @api
     *
     */
    public function deletePlanet(PlanetTransfer $planetTransfer): void
    {
        $this->getFactory()
            ->createPlanetDeleter()->delete($planetTransfer);
    }
}
