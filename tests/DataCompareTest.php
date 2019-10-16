<?php
/**
 * Class name
 *
 * @package  PatInterfaceBundle
 * @author   Joris Ros <j.ros@youwe.nl>
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
}
