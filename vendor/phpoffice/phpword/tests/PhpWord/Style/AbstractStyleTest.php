<?php
/**
 * This file is part of PHPWord - A pure PHP library for reading and writing
 * word processing documents.
 *
 * PHPWord is free software distributed under the terms of the GNU Lesser
 * General Public License version 3 as published by the Free Software Foundation.
 *
 * For the full copyright and license information, please read the LICENSE
 * file that was distributed with this source code. For the full list of
 * contributors, visit https://github.com/PHPOffice/PHPWord/contributors.
 *
 * @link        https://github.com/PHPOffice/PHPWord
 * @copyright   2010-2016 PHPWord contributors
 * @license     http://www.gnu.org/licenses/lgpl.txt LGPL version 3
 */

namespace PhpOffice\PhpWord\Style;

/**
 * Test class for PhpOffice\PhpWord\Style\AbstractStyle
 *
 * @runTestsInSeparateProcesses
 */
class AbstractStyleTest extends \PHPUnit_Framework_TestCase
{
    /**
     * Test set style by array
     */
    public function testSetStyleByArray()
    {
        $stub = $this->getMockForAbstractClass('\PhpOffice\PhpWord\Style\AbstractStyle');
        $stub->setStyleByArray(['index' => 1]);

        $this->assertEquals(1, $stub->getIndex());
    }

    /**
     * Test setBoolVal, setIntVal, setFloatVal, setEnumVal with normal value
     */
    public function testSetValNormal()
    {
        $stub = $this->getMockForAbstractClass('\PhpOffice\PhpWord\Style\AbstractStyle');

        $this->assertTrue(self::callProtectedMethod($stub, 'setBoolVal', [true, false]));
        $this->assertEquals(12, self::callProtectedMethod($stub, 'setIntVal', [12, 200]));
        $this->assertEquals(871.1, self::callProtectedMethod($stub, 'setFloatVal', [871.1, 2.1]));
        $this->assertEquals(871.1, self::callProtectedMethod($stub, 'setFloatVal', ['871.1', 2.1]));
        $this->assertEquals('a', self::callProtectedMethod($stub, 'setEnumVal', ['a', ['a', 'b'], 'b']));
    }

    /**
     * Test setBoolVal, setIntVal, setFloatVal, setEnumVal with default value
     */
    public function testSetValDefault()
    {
        $stub = $this->getMockForAbstractClass('\PhpOffice\PhpWord\Style\AbstractStyle');

        // todo: change to assertNotTrue when got upgraded to PHPUnit 4.x
        $this->assertFalse(self::callProtectedMethod($stub, 'setBoolVal', ['a', false]));
        $this->assertEquals(200, self::callProtectedMethod($stub, 'setIntVal', ['foo', 200]));
        $this->assertEquals(2.1, self::callProtectedMethod($stub, 'setFloatVal', ['foo', 2.1]));
        $this->assertEquals('b', self::callProtectedMethod($stub, 'setEnumVal', [null, ['a', 'b'], 'b']));
    }

    /**
     * Test setEnumVal exception
     */
    public function testSetValEnumException()
    {
        $this->expectException(\InvalidArgumentException::class);

        $stub = $this->getMockForAbstractClass('\PhpOffice\PhpWord\Style\AbstractStyle');

        $this->assertEquals('b', self::callProtectedMethod($stub, 'setEnumVal', ['z', ['a', 'b'], 'b']));
    }

    /**
     * Helper function to call protected method
     *
     * @param mixed $object
     * @param string $method
     */
    public static function callProtectedMethod($object, $method, array $args = [])
    {
        $class = new \ReflectionClass(get_class($object));
        $method = $class->getMethod($method);
        $method->setAccessible(true);

        return $method->invokeArgs($object, $args);
    }
}
