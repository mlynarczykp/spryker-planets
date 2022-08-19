<?php

namespace Pyz\Zed\Planet\Business;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetFacadeInterface
{
    /**
     * Specification:
     * - stores Planet to the database based on input transfer
     * - returns enhanced `PlanetTransfer` with ID
     *
     * @param \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer
     * @api
     *
     */
    public function savePlanet(PlanetTransfer $planetTransfer): PlanetTransfer;

    /**
     * Specification:
     * - returns Planet if exists based on its ID
     * - returns null if no such record is found
     *
     * @param int $idPlanet
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer|null
     */
    public function findPlanetById(int $idPlanet): ?PlanetTransfer;

    /**
     * @param \Generated\Shared\Transfer\PlanetCollectionTransfer $planetsRestApiTransfer
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer $planetsRestApiTransfer
     */
    public function getPlanetCollection(PlanetCollectionTransfer $planetsRestApiTransfer): PlanetCollectionTransfer;

    /**
     * Specification:
     * - delete Planet with specific ID
     *
     * @param \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
     *
     * @return void
     * @api
     *
     */
    public function deletePlanet(PlanetTransfer $planetTransfer): void;
}
