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

namespace PhpOffice\PhpWord\Element;

use PhpOffice\PhpWord\PhpWord;
use PhpOffice\PhpWord\Style;

/**
 * @covers \PhpOffice\PhpWord\Element\Section
 * @coversDefaultClass \PhpOffice\PhpWord\Element\Section
 * @runTestsInSeparateProcesses
 */
class SectionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @covers ::setStyle
     */
    public function testSetStyle()
    {
        $expected = 'landscape';
        $object = new Section(0);
        $object->setStyle(['orientation' => $expected, 'foo' => null]);
        $this->assertEquals($expected, $object->getStyle()->getOrientation());
    }

    /**
     * @coversNothing
     */
    public function testAddElements()
    {
        $objectSource = __DIR__ . '/../_files/documents/reader.docx';
        $imageSource = __DIR__ . '/../_files/images/PhpWord.png';

        $section = new Section(0);
        $section->setPhpWord(new PhpWord());
        $section->addText(utf8_decode('ä'));
        $section->addLink(utf8_decode('http://äää.com'), utf8_decode('ä'));
        $section->addTextBreak();
        $section->addPageBreak();
        $section->addTable();
        $section->addListItem(utf8_decode('ä'));
        $section->addObject($objectSource);
        $section->addImage($imageSource);
        $section->addTitle(utf8_decode('ä'), 1);
        $section->addTextRun();
        $section->addFootnote();
        $section->addCheckBox(utf8_decode('chkä'), utf8_decode('Contentä'));
        $section->addTOC();

        $elementCollection = $section->getElements();
        $elementTypes = [
            'Text',
            'Link',
            'TextBreak',
            'PageBreak',
            'Table',
            'ListItem',
            'Object',
            'Image',
            'Title',
            'TextRun',
            'Footnote',
            'CheckBox',
            'TOC',
        ];
        $elmCount = 0;
        foreach ($elementTypes as $elementType) {
            $this->assertInstanceOf("PhpOffice\\PhpWord\\Element\\{$elementType}", $elementCollection[$elmCount]);
            $elmCount++;
        }
    }

    /**
     * @coversNothing
     */
    public function testAddObjectException()
    {
        $this->expectException(\PhpOffice\PhpWord\Exception\InvalidObjectException::class);

        $source = __DIR__ . '/_files/xsl/passthrough.xsl';
        $section = new Section(0);
        $section->addObject($source);
    }

    /**
     * Add title with predefined style
     *
     * @coversNothing
     */
    public function testAddTitleWithStyle()
    {
        Style::addTitleStyle(1, ['size' => 14]);
        $section = new Section(0);
        $section->setPhpWord(new PhpWord());
        $section->addTitle('Test', 1);
        $elementCollection = $section->getElements();

        $this->assertInstanceOf('PhpOffice\\PhpWord\\Element\\Title', $elementCollection[0]);
    }

    /**
     * @covers ::addFooter
     * @covers ::addHeader
     * @covers ::hasDifferentFirstPage
     */
    public function testAddHeaderFooter()
    {
        $object = new Section(0);
        $elements = ['Header', 'Footer'];

        foreach ($elements as $element) {
            $method = "add{$element}";
            $this->assertInstanceOf("PhpOffice\\PhpWord\\Element\\{$element}", $object->$method());
        }
        $this->assertFalse($object->hasDifferentFirstPage());
    }

    /**
     * @covers ::addHeader
     * @covers ::hasDifferentFirstPage
     */
    public function testHasDifferentFirstPage()
    {
        $object = new Section(1);
        $header = $object->addHeader();
        $header->setType(Header::FIRST);
        $this->assertTrue($object->hasDifferentFirstPage());
    }

    /**
     * @covers ::addHeader
     */
    public function testAddHeaderException()
    {
        $this->expectException(\Exception::class);
        $this->expectExceptionMessage('Invalid header/footer type.');

        $object = new Section(1);
        $object->addHeader('ODD');
    }
}