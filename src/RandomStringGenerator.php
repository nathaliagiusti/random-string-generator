<?php

namespace RandomStringGenerator;

class RandomStringGenerator
{
    /** @var array */
    private static $stringPatters = [
        'l' => SupportedCharacter::LOWER_ALPHA_CHARS,
        'L' => SupportedCharacter::UPPER_ALPHA_CHARS,
        'd' => SupportedCharacter::DIGITS,
        'p' => SupportedCharacter::PUNCTUATION,
    ];

    /**
     * @param string $stringPattern
     *
     * @return string
     */
    public function generate(string $stringPattern) : string
    {
        $generatedString    = '';
        $scapeNextCharacter = false;

        foreach (str_split($stringPattern) as $character) {

            $character          = $this->getRandomCharacterByStringPattern($character, $scapeNextCharacter);
            $scapeNextCharacter = $character == '';

            $generatedString .= $character;
        }

        return $generatedString;
    }

    /**
     * @param string $pattern
     * @param bool   $shouldScapeCharacter
     *
     * @return string
     */
    private function getRandomCharacterByStringPattern(string $pattern, bool $shouldScapeCharacter) : string
    {
        if ($shouldScapeCharacter) {
            return $pattern;
        }

        if ($pattern === '\\') {
            return '';
        }

        if (array_key_exists($pattern, self::$stringPatters)) {

            return $this->getRandomCharacterFromArray(self::$stringPatters[$pattern]);
        }

        return $pattern;
    }

    /**
     * @param array $characters
     *
     * @return string
     */
    private function getRandomCharacterFromArray(array $characters) :string
    {
        $randomPos = array_rand($characters, 1);

        return $characters[$randomPos];
    }

}
