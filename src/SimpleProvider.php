<?php
/**
 * Class name
 *
 * @package  PatInterfaceBundle
 * @author   Joris Ros <j.ros@youwe.nl>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;


class SimpleProvider implements ProviderInterface
{
    private $storage = [];

    /**
     * @param array $array
     */
    public function addArray(array $array): void
    {
        $this->storage = array_merge($this->storage, $array);
    }

    public function addString(string $key, string $value): void
    {
        $this->storage[$key] = $value;
    }

    public function getComparisionValue(): string
    {
        return $this->convertArrayToString();
    }

    private function convertArrayToString(): string
    {
        $string = '';

        foreach ($this->storage as $key => $value) {
            $string .= $key . $value;
        }

        return $this->convertSpecialCharacters($string);
    }

    private function convertSpecialCharacters(string $string)
    {
        return str_replace(' ', '', $string);
    }
}