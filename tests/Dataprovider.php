<?php

/**
 * DataProvider
 *
 * @package  DataCompare
 * @author   Joris Ros <joris.ros@gmail.com>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace Tests;

class Dataprovider
{
    public static function getArrayWithDefaultItems(): array
    {
        return [
            'fieldA' => 'Value A',
            'fieldB' => 'Value B',
            'fieldC' => 'Value C',
            'fieldD' => 'Value D',
        ];
    }

    public static function getArrayWithDiffentValue(): array
    {
        return [
            'fieldA' => 'Value A',
            'fieldB' => 'Value',
            'fieldC' => 'Value C',
            'fieldD' => 'Value D',
        ];
    }

    public static function getArrayInArray(): array
    {
        return [
            'array' => [
                'array'
            ]
        ];
    }
}
