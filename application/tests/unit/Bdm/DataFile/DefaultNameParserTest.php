<?php

namespace Bdm\DataFile;

class DefaultNameParserTest extends \PHPUnit_Framework_TestCase
{

    const TEST_FILE_NAME = 'ABC12LE_2012_10_15_BIG.txt';

    /**
     * @test
     */
    public function canInstantiate()
    {
        $parser = new DefaultNameParser();
        $this->assertInstanceOf('Bdm\DataFile\DefaultNameParser', $parser, 'not a valid instance of name parser');
    }

    /**
     * @test
     */
    public function canCallParseWithStringAndGetArray()
    {
        $parser = new DefaultNameParser();
        $this->assertTrue(is_array($parser->parse(self::TEST_FILE_NAME)), 'parse does not return array');
    }

    /**
     * @test
     */
    public function returnArrayWithProperValues()
    {
        $parser = new DefaultNameParser();
        $fileData = $parser->parse(self::TEST_FILE_NAME);
        $this->assertValidFileData($fileData);
    }
    private function assertValidFileData($fileData)
    {
        $this->assertEquals('ABC12LE', $fileData['serial'], 'wrong serial or not found');
        $this->assertEquals('2012/10/15', $fileData['date'], 'wrong date or not found');
        $this->assertEquals('BIG', $fileData['type'], 'wrong type or not found');
    }
}
