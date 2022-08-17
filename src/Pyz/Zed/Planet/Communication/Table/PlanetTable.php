<?php

namespace Pyz\Zed\Planet\Communication\Table;

use Spryker\Zed\Gui\Communication\Table\AbstractTable;
use Spryker\Zed\Gui\Communication\Table\TableConfiguration;
use Orm\Zed\Planet\Persistence\PyzPlanetQuery;
use Orm\Zed\Planet\Persistence\Map\PyzPlanetTableMap;
use Spryker\Service\UtilText\Model\Url\Url;

class PlanetTable extends AbstractTable
{
    const ACTION = 'Action';

    /** @var \Orm\Zed\Planet\Persistence\PyzPlanetQuery */

    private PyzPlanetQuery $planetQuery;

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
            static::ACTION => static::ACTION
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

        $config->addRawColumn(static::ACTION);

        return $config;
    }

    protected function createEditButton(string $planetId): string
    {
        $editPlanetUrl = Url::generate(
            '/planet/edit',
            [
                'id-planet' => $planetId,
            ],
        );

        return $this->generateEditButton($editPlanetUrl, 'Edit');
    }

    protected function createDeleteButton(string $planetId): string
    {
        $deletePlanetUrl = Url::generate(
            '/planet/delete',
            [
                'id-planet' => $planetId,
            ],
        );

        return $this->generateRemoveButton($deletePlanetUrl, 'Delete');
    }

    protected function getActionButtons(string $planetId): string
    {
        $buttons = [];
        $buttons[] = $this->createEditButton($planetId);
        $buttons[] = $this->createDeleteButton($planetId);

        return implode(' ', $buttons);
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
                static::ACTION => $this->getActionButtons($planetDataItem[PyzPlanetTableMap::COL_ID_PLANET])
            ];
        }
        return $planetTableRows;
    }
}
