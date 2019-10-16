<?php

/**
 * SimpleProvider
 *
 * @package  DataCompare
 * @author   Joris Ros <joris.ros@gmail.com>
 * @license  GPL <GNU General Public License, version 3>
 */

namespace DataCompare;

class SimpleProvider implements ProviderInterface
{
    private $storage = [];

    private $ignoreList = [];

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

    public function ignoreKey(string $key): void
    {
        $this->ignoreList[] = $key;
    }

    public function getComparisionValue(): string
    {
        return $this->convertArrayToString($this->storage);
    }

    private function convertArrayToString(array $storage): string
    {
        $string = '';

        foreach ($storage as $key => $value) {
            if (in_array($key, $this->ignoreList)) {
                continue;
            }

            if (is_array($value)) {
                $string .= $this->convertArrayToString($value);
            } else {
                $string .= $key . $value;
            }
        }

        return $this->convertSpecialCharacters($string);
    }

    private function convertSpecialCharacters(string $string)
    {
        return str_replace(' ', '', $string);
    }
}
