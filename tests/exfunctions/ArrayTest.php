<?php
/**
 * Created by PhpStorm.
 * User: Frost Wong <frostwong@gmail.com>
 * Date: 22/05/2017
 * Time: 22:34
 */

namespace ExtendedFunctions\Tests;
use function ExtendedFunctions\array_values_recursive;
use PHPUnit\Framework\TestCase;

class ArrayTest extends TestCase
{
    public function testPositiveEverySubArrayHasTheSpecifiedKey()
    {
        $array1 = [
            'a' => [
                'b' => 'd',
            ],
            'c' => [
                'b' => 'e',
                'g' => 'h',
            ],
            'd' => [
                'b' => 'f',
                'hh' => 'mn',
            ],
        ];
        $expected = [
            'd', 'e', 'f',
        ];
        $actual = array_values_recursive($array1, 'b');
        $this->assertEquals($expected, $actual);
    }

    public function testPositiveNotEverySubArrayHasTheSpecifiedKey()
    {
        $array1 = [
            'a' => [
                'b' => 'd',
            ],
            'c' => [
                'g' => 'h',
            ],
            'd' => [
                'b' => 'f',
                'hh' => 'mn',
            ],
        ];
        $expected = ['d', 'f'];
        $actual = array_values_recursive($array1, 'b');
        $this->assertEquals($expected, $actual);
    }

    public function testPositiveWithEmptyArray()
    {
        $array1 = [];
        $expected = [];
        $actual = array_values_recursive($array1, 'b');
        $this->assertEquals($expected, $actual);
    }

    public function testPositiveWithNonAssociateArray()
    {
        $array1 = [
            'a' => 'b',
            'c' => 'd',
            'e' => 'g',
        ];
        $expected = ['d'];
        $actual = array_values_recursive($array1, 'c');
        $this->assertEquals($expected, $actual);
    }

    public function testNegativeWithNonExistingKey()
    {
        $array1 = [
            'a' => 'b',
            'c' => 'd',
            'e' => 'g',
        ];
        $expected = 'd';
        $actual = array_values_recursive($array1, 'g');
        $this->assertEquals([], $actual);
        $this->assertNotEquals($expected, $actual);
    }
}
