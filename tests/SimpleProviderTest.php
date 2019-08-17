<?php
/**
 * Class name
 *
 * @package  PatInterfaceBundle
 * @author   Joris Ros <j.ros@youwe.nl>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;


use PHPUnit\Framework\TestCase;
use Tests\Dataprovider;

class SimpleProviderTest extends TestCase
{

    public function testAddArray()
    {
        $compareProvider = new SimpleProvider();
        $compareProvider->addArray(Dataprovider::getArrayWithDefaultItems());
        $this->assertEquals('fieldAValueAfieldBValueBfieldCValueCfieldDValueD', $compareProvider->getComparisionValue());
    }

    public function testAddString()
    {
        $compareProvider = new SimpleProvider();
        $compareProvider->addString('TEST', 'TEST');
        $this->assertEquals('TESTTEST', $compareProvider->getComparisionValue());
    }

    public function testGetComparisionValue()
    {
        $compareProvider = new SimpleProvider();
        $compareProvider->addArray(Dataprovider::getArrayWithDefaultItems());
        $this->assertEquals('fieldAValueAfieldBValueBfieldCValueCfieldDValueD', $compareProvider->getComparisionValue());

    }
}
