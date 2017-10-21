<?php

namespace RandomStringGenerator;

class RandomStringGenerator
{
    /**
     * @param string $stringPattern
     *
     * @return string
     */
    public function generate(string $stringPattern)
    {
        $generatedString = '';

        foreach (str_split($stringPattern) as $character)
        {
            if ($character === 'l')
            {
                $randomPos        = array_rand(SupportedCharacter::LOWER_ALPHA_CHARS, 1);
                $generatedString .= SupportedCharacter::LOWER_ALPHA_CHARS[$randomPos];
                continue;
            }

            if ($character === 'L')
            {
                $randomPos        = array_rand(SupportedCharacter::UPPER_ALPHA_CHARS, 1);
                $generatedString .= SupportedCharacter::UPPER_ALPHA_CHARS[$randomPos];
                continue;
            }

            if ($character === 'd')
            {
                $randomPos        = array_rand(SupportedCharacter::DIGITS, 1);
                $generatedString .= SupportedCharacter::DIGITS[$randomPos];
                continue;
            }

            if ($character === 'p')
            {
                $randomPos        = array_rand(SupportedCharacter::PUNCTUATION, 1);
                $generatedString .= SupportedCharacter::PUNCTUATION[$randomPos];
                continue;
            }

            $generatedString .= $character;
        }

        return $generatedString;
    }
}
