<?php

namespace Pyz\Zed\HelloPawel\Business\Reverser;

use Generated\Shared\Transfer\HelloPawelTransfer;

interface StringReverserInterface
{
    /**
     * @param \Generated\Shared\Transfer\HelloPawelTransfer $helloPawelTransfer
     *
     * @return \Generated\Shared\Transfer\HelloPawelTransfer
     */
    public function reverseString(HelloPawelTransfer $helloPawelTransfer): HelloPawelTransfer;
}
