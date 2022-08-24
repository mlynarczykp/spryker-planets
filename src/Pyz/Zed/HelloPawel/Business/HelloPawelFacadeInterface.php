<?php

namespace Pyz\Zed\HelloPawel\Business;

use Generated\Shared\Transfer\HelloPawelTransfer;

interface HelloPawelFacadeInterface
{
    /**
     * Specification:
     * - Reverses string.
     *
     * @param \Generated\Shared\Transfer\HelloPawelTransfer $helloPawelTransfer
     *
     * @return \Generated\Shared\Transfer\HelloPawelTransfer
     * @api
     *
     */
    public function reverseString(HelloPawelTransfer $helloPawelTransfer): HelloPawelTransfer;
}
