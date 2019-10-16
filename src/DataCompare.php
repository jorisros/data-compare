<?php

/**
 * DataCompare
 *
 * @package  DataCompare Component
 * @author   Joris Ros <joris.ros@gmail.com>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;

final class DataCompare
{
    /**
     * @var ProviderInterface
     */
    private $dataSetA;

    /**
     * @var ProviderInterface
     */
    private $dataSetB;

    public function __construct(ProviderInterface $testSetA, ProviderInterface $testSetB)
    {
        $this->dataSetA = $testSetA;
        $this->dataSetB = $testSetB;
    }

    /**
     * @return bool
     */
    public function isTheSame(): bool
    {
        if (!$this->isValid()) {
            return false;
        }

        if ($this->dataSetA->getComparisionValue() === $this->dataSetB->getComparisionValue()) {
            return true;
        }

        return false;
    }

    /**
     * @return bool
     */
    private function isValid(): bool
    {
        if ($this->dataSetA instanceof ProviderInterface && $this->dataSetB instanceof ProviderInterface) {
            return true;
        }

        return false;
    }
}
