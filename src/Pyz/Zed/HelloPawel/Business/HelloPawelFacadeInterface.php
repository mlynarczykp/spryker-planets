<?php

namespace Pyz\Zed\HelloPawel\Business;

interface HelloPawelFacadeInterface
{
    /**
     * Specification:
     * - Reverses string.
     *
     * @api
     *
     * @param string $stringToReverse
     *
     * @return string
     */
    public function reverseString(string $stringToReverse): string;
}
