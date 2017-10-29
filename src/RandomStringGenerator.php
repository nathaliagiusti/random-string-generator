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
        $generatedString  = '';
        $isScapedCharacter = false;

        foreach (str_split($stringPattern) as $character)
        {
            if ($isScapedCharacter)
            {
                $isScapedCharacter = false;
                $generatedString .= $character;

                continue;
            }

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

            if ($character === '\\')
            {
                $isScapedCharacter = true;

                continue;
            }

            $generatedString .= $character;
        }

        return $generatedString;
    }
}
