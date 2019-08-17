<?php
/**
 * Class name
 *
 * @package  PatInterfaceBundle
 * @author   Joris Ros <j.ros@youwe.nl>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;


interface ProviderInterface
{
    public function addArray(array $array): void;
    public function addString(string $key, string $value): void;
    public function getComparisionValue(): string;
}
