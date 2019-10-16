<?php

/**
 * DataCompareTest
 *
 * @package  DataCompare
 * @author   Joris Ros <joris.ros@gmail.com>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace Tests;

use DataCompare\SimpleProvider;

class DataCompareTest extends \PHPUnit\Framework\TestCase
{
    public function testCompareTwo()
    {
        $dataProviderA = new SimpleProvider();
        $dataProviderA->addArray(Dataprovider::getArrayWithDefaultItems());

        $dataProviderB = new SimpleProvider();
        $dataProviderB->addArray(Dataprovider::getArrayWithDefaultItems());

        $dataProviderC = new SimpleProvider();
        $dataProviderC->addArray(Dataprovider::getArrayWithDiffentValue());

        $dataCompare = new \DataCompare\DataCompare($dataProviderA, $dataProviderB);
        $this->assertTrue($dataCompare->isTheSame());

        $dataCompare = new \DataCompare\DataCompare($dataProviderA, $dataProviderC);
        $this->assertFalse($dataCompare->isTheSame());
    }

    public function testWithArray()
    {
        $dataProvider = new SimpleProvider();
        $dataProvider->addArray(Dataprovider::getArrayInArray());

        $dataCompare = new \DataCompare\DataCompare($dataProvider, $dataProvider);
        $this->assertTrue($dataCompare->isTheSame());
    }

    public function testWithDifferentArray()
    {
        $dataProvider = new SimpleProvider();
        $dataProvider->addArray(Dataprovider::getArrayInArray());

        $dataProvider2 = new SimpleProvider();
        $dataProvider2->addArray([
            'array' => [
                'array',
                'array_2'
            ]
        ]);

        $dataCompare = new \DataCompare\DataCompare($dataProvider, $dataProvider2);
        $this->assertFalse($dataCompare->isTheSame());
    }

    public function testIgnoreKeys()
    {
        $dataProviderA = new SimpleProvider();
        $dataProviderA->addArray(Dataprovider::getArrayWithDefaultItems());
        $dataProviderA->ignoreKey('fieldB');

        $dataProviderC = new SimpleProvider();
        $dataProviderC->addArray(Dataprovider::getArrayWithDiffentValue());
        $dataProviderC->ignoreKey('fieldB');

        $dataCompare = new \DataCompare\DataCompare($dataProviderA, $dataProviderC);
        $this->assertTrue($dataCompare->isTheSame());
    }
}
