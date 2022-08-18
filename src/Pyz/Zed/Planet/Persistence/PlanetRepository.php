<?php

namespace Pyz\Zed\Planet\Persistence;

use Generated\Shared\Transfer\PlanetCollectionTransfer;
use Generated\Shared\Transfer\PlanetTransfer;
use Orm\Zed\Planet\Persistence\PyzPlanet;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Spryker\Zed\Kernel\Persistence\AbstractRepository;

class PlanetRepository extends AbstractRepository implements PlanetRepositoryInterface
{
    /**
     * @param int $idPlanet
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer|null
     */
    public function findPlanetById(int $idPlanet): ?PlanetTransfer
    {
        $planetEntity = $this->createPyzPlanetQuery()
            ->findOneByIdPlanet($idPlanet);

        if (!$planetEntity) {
            return null;
        }

        return $this->mapEntityToTransfer($planetEntity);
    }

    /**
     * @return \Generated\Shared\Transfer\PlanetCollectionTransfer|null
     */
    public function findAllPlanets(): PlanetCollectionTransfer
    {
        $planets = $this->createPyzPlanetQuery()
            ->find();
        $transfer = new PlanetCollectionTransfer();
        foreach ($planets as $planet) {
            $temp = new PlanetTransfer();
            $temp->fromArray($planet->toArray());
            $transfer->addPlanet($temp);
        }
        return $transfer;
    }

    /**
     * @return \Orm\Zed\Planet\Persistence\PyzPlanetQuery
     */
    private function createPyzPlanetQuery(): PyzPlanetQuery
    {
        return PyzPlanetQuery::create();
    }

    /**
     * @param \Orm\Zed\Planet\Persistence\PyzPlanet $planetEntity
     *
     * @return \Generated\Shared\Transfer\PlanetTransfer
     */
    private function mapEntityToTransfer(PyzPlanet $planetEntity): PlanetTransfer
    {
        return (new PlanetTransfer())->fromArray($planetEntity->toArray());
    }
}
