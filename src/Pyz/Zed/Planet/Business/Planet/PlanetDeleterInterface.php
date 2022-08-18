<?php

namespace Pyz\Zed\Planet\Business\Planet;

use Generated\Shared\Transfer\PlanetTransfer;

interface PlanetDeleterInterface
{
    /**
     * @param \Generated\Shared\Transfer\PlanetTransfer $planetTransfer
     *
     * @return void
     */
    public function delete(PlanetTransfer $planetTransfer): void;
}
