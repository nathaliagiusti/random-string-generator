<?php

namespace RandomStringGenerator\Test;

use PHPUnit\Framework\TestCase;
use RandomStringGenerator\RandomStringGenerator;

class RandomStringGeneratorTest extends TestCase
{
    /** @var RandomStringGenerator */
    private $generator;

    public function setUp()
    {
        $this->generator = new RandomStringGenerator();
    }

    public function testGenerateShouldGenerateStringWithSameSize()
    {
        $stringPattern = 'lll';

        $this->assertEquals(strlen($stringPattern), strlen($this->generator->generate($stringPattern)));
    }

    public function testGenerateShouldGenerateLowerCaseString()
    {
        $stringPattern = 'l';

        $this->assertRegExp('/[a-z]/', $this->generator->generate($stringPattern));
    }

    public function testGenerateShouldGenerateUpperCaseString()
    {
        $stringPattern = 'L';

        $this->assertRegExp('/[A-Z]/', $this->generator->generate($stringPattern));
    }

    public function testGenerateShouldGenerateDigit()
    {
        $stringPattern = 'd';

        $this->assertRegExp('/[0-9]/', $this->generator->generate($stringPattern));
    }

    public function testGenerateShouldGeneratePunctuation()
    {
        $stringPattern = 'p';

        $this->assertRegExp('/[\p{P}\p{S}]/', $this->generator->generate($stringPattern));
    }

    public function testGenerateShouldAcceptAnyDelimiter()
    {
        $stringPattern = 'd-';

        $this->assertRegExp('/[0-9]-/', $this->generator->generate($stringPattern));
    }

  // test "accept utf8 delimiter" do
  //   assert RandomStringGenerator.generate("ááàã") == "ááàã"
  // end

  // test "accept scape character" do
  //   str = RandomStringGenerator.generate("\\d-")
  //   assert Regex.match?(~r/d-/, str) == true
  // end
}
