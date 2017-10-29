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
    public function generate(string $stringPattern)
    {
        $generatedString   = '';
        $isScapedCharacter = false;

        foreach (str_split($stringPattern) as $character) {

            if ($isScapedCharacter) {
                $isScapedCharacter = false;
                $generatedString  .= $character;

                continue;
            }

            if ($character === '\\') {
                $isScapedCharacter = true;

                continue;
            }

            $character = $this->mapToPattern($character);

            $generatedString .= $character;
        }

        return $generatedString;
    }

    /**
     * @param string $character
     *
     * @return string
     */
    private function mapToPattern(string $character) {

        if (array_key_exists($character, self::$stringPatters)) {

            return $this->getRandomCharacterFromArray(self::$stringPatters[$character]);
        }

        return $character;
    }

    /**
     * @param array $characters
     *
     * @return string
     */
    private function getRandomCharacterFromArray(array $characters) {

        $randomPos = array_rand($characters, 1);

        return $characters[$randomPos];
    }

}
