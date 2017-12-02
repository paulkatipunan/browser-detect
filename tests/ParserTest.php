<?php

namespace hisorange\BrowserDetect\Test;

use hisorange\BrowserDetect\ParserInterface;
use hisorange\BrowserDetect\ResultInterface;

/**
 * Class ParserTest
 * @package hisorange\BrowserDetect\Test
 * @coversDefaultClass hisorange\BrowserDetect\Parser
 */
class ParserTest extends TestCase
{
    /**
     * @covers ::detect()
     * @throws \PHPUnit_Framework_Exception
     */
    public function testDetect()
    {
        $parser   = $this->getParser();
        $actual   = $parser->detect();
        $expected = ResultInterface::class;

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * @dataProvider provideAgents
     * @covers ::parse()
     * @throws \PHPUnit_Framework_Exception
     */
    public function testParse($agent)
    {
        $parser   = $this->getParser();
        $actual   = $parser->parse($agent);
        $expected = ResultInterface::class;

        $this->assertInstanceOf($expected, $actual);
    }

    /**
     * @return ParserInterface
     */
    protected function getParser()
    {
        return $this->app->make('browser-detect.parser');
    }

    /**
     * @return array
     */
    public function provideAgents()
    {
        return [
            ['UnknownBrowser'],
            ['Mozilla/5.0 (Windows NT 6.1; WOW64; rv:40.0) Gecko/20100101 Firefox/40.1'],
            ['Mozilla/5.0 (Windows NT 6.3; rv:36.0) Gecko/20100101 Firefox/36.0'],
            ['Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/41.0.2228.0 Safari/537.36'],
            ['Mozilla/5.0 (Windows NT 6.1; WOW64; Trident/7.0; AS; rv:11.0) like Gecko'],
        ];
    }
}