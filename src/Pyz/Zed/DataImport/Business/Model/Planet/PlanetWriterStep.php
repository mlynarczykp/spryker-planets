<?php

namespace Pyz\Zed\DataImport\Business\Model\Planet;

use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\DataImportStepInterface;
use Spryker\Zed\DataImport\Business\Model\DataImportStep\PublishAwareStep;
use Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface;
use Pyz\Zed\Planet\Dependency\PlanetEvents;

class PlanetWriterStep extends PublishAwareStep implements DataImportStepInterface
{
    public const KEY_NAME = 'name';
    public const KEY_INTERESTING_FACT = 'interesting_fact';
    public const KEY_NUMBER_OF_MOONS = 'number_of_moons';

    /**
     * @param \Spryker\Zed\DataImport\Business\Model\DataSet\DataSetInterface $dataSet
     *
     * @return void
     * @throws \Spryker\Zed\DataImport\Business\Exception\EntityNotFoundException
     * @throws \Propel\Runtime\Exception\PropelException
     * @throws \Spryker\Zed\Propel\Business\Exception\AmbiguousComparisonException
     *
     */
    public function execute(DataSetInterface $dataSet)
    {
        $planetEntity = PyzPlanetQuery::create()
            ->filterByName($dataSet[static::KEY_NAME])
            ->findOneOrCreate();

        $planetEntity->setInterestingFact
        (
            $dataSet[static::KEY_INTERESTING_FACT]
        );

        if ($planetEntity->isNew() || $planetEntity->isModified()) {
            $planetEntity->save();
            $this->addPublishEvents(PlanetEvents::ENTITY_PYZ_PLANET_CREATE, $planetEntity->getIdPlanet());
        }

//        $planetEntity->setNumberOfMoons($dataSet[static::KEY_NUMBER_OF_MOONS]);
//
//        if ($planetEntity->isNew() || $planetEntity->isModified()) {
//            $planetEntity->save();
//            $this->addPublishEvents(PlanetEvents::ENTITY_PYZ_PLANET_CREATE, $planetEntity->getIdPlanet());
//        }

//        $this->addPublishEvents(PlanetEvents::ENTITY_PYZ_PLANET_CREATE, $planetEntity->getIdPlanet());
    }
}
