<?php

/**
 * ProviderInterface
 *
 * @package  DataCompare
 * @author   Joris Ros <joris.ros@gmail.com>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;

interface ProviderInterface
{
    public function addArray(array $array): void;
    public function addString(string $key, string $value): void;
    public function ignoreKey(string $key): void;
    public function getComparisionValue(): string;
}
