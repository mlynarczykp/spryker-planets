<?php

namespace Pyz\Zed\Planet\Communication\Table;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\Planet\Persistence\Map\PyzPlanetTableMap;

class PlanetTable extends AbstractTable
{
    /** @var \Orm\Zed\Planet\Persistence\PyzPlanetQuery */

    private PyzPlanetQuery $planetQuery;
    const COL_ACTION = 'Actions';

    /**
     * @param \Orm\Zed\Planet\Persistence\PyzPlanetQuery $planetQuery
     */
    public function __construct(PyzPlanetQuery $planetQuery)
    {
        $this->planetQuery = $planetQuery;
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration $config
     *
     * @return \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     */
    protected function configure(TableConfiguration $config): TableConfiguration
    {
        $config->setHeader([
            PyzPlanetTableMap::COL_ID_PLANET => 'Planet id',
            PyzPlanetTableMap::COL_NAME => 'Planet name',
            PyzPlanetTableMap::COL_INTERESTING_FACT => 'Interesting fact',
            PyzPlanetTableMap::COL_NUMBER_OF_MOONS => 'Number of moons',
            self::COL_ACTION => 'Actions'
        ]);

        $config->setSortable(
            [
                PyzPlanetTableMap::COL_ID_PLANET,
                PyzPlanetTableMap::COL_NAME,
                PyzPlanetTableMap::COL_INTERESTING_FACT,
                PyzPlanetTableMap::COL_NUMBER_OF_MOONS
            ]
        );

        $config->setSearchable([PyzPlanetTableMap::COL_NAME]);

        $config->addRawColumn(self::COL_ACTION);

        return $config;
    }

    /**
     * @param $planetDataItem
     *
     * @return string
     */
    protected function generateItemButtons($planetDataItem): string
    {
        $btnGroup = [];
        $btnGroup[] = $this->createButtonGroupItem(
            "Edit",
            "/planet/edit?id-planet={$planetDataItem[PyzPlanetTableMap::COL_ID_PLANET]}"
        );
        $btnGroup[] = $this->createButtonGroupItem(
            "Delete",
            "/planet/delete?id-planet={$planetDataItem[PyzPlanetTableMap::COL_ID_PLANET]}"
        );
        return $this->generateButtonGroup(
            $btnGroup,
            'Actions'
        );
    }

    /**
     * @param \Spryker\Zed\Gui\Communication\Table\TableConfiguration
     * $config
     *
     * @return array
     */
    protected function prepareData(TableConfiguration $config): array
    {
        $planetDataItems = $this->runQuery(
            $this->planetQuery,
            $config
        );
        $planetTableRows = [];
        foreach ($planetDataItems as $planetDataItem) {
            $planetTableRows[] = [
                PyzPlanetTableMap::COL_ID_PLANET => $planetDataItem[PyzPlanetTableMap::COL_ID_PLANET],
                PyzPlanetTableMap::COL_NAME =>
                    $planetDataItem[PyzPlanetTableMap::COL_NAME],
                PyzPlanetTableMap::COL_INTERESTING_FACT =>
                    $planetDataItem[PyzPlanetTableMap:: COL_INTERESTING_FACT],
                PyzPlanetTableMap::COL_NUMBER_OF_MOONS => $planetDataItem[PyzPlanetTableMap::COL_NUMBER_OF_MOONS],
                self::COL_ACTION => $this->generateItemButtons($planetDataItem)
            ];
        }
        return $planetTableRows;
    }
}
