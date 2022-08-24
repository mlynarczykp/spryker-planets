<?php

namespace Pyz\Client\HelloPawel\Zed;

use Generated\Shared\Transfer\HelloPawelTransfer;

interface HelloPawelZedStubInterface
{
    /**
     * @param \Generated\Shared\Transfer\HelloPawelTransfer $helloPawelTransfer
     *
     * @return \Generated\Shared\Transfer\HelloPawelTransfer
     */
    public function reverseString(HelloPawelTransfer $helloPawelTransfer): HelloPawelTransfer;
}
