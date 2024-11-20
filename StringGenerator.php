<?php

class StringGenerator
{
    private int $maxCount1;
    private int $maxCount2;

    public function __construct(int $maxCount1, int $maxCount2)
    {
        if ($maxCount1 <= 0 || $maxCount2 <= 0) {
            throw new InvalidArgumentException("Max counts must be greater than 0.");
        }
        $this->maxCount1 = $maxCount1;
        $this->maxCount2 = $maxCount2;
    }

    /**
     * Generates two strings with specified total max counts.
     *
     * @return array Array containing the two generated strings.
     */
    public function generateStrings(): array
    {
        $string1 = $this->generateString($this->maxCount1);
        $string2 = $this->generateString($this->maxCount2);

        return [$string1, $string2];
    }

    /**
     * Generates a random string with a total length up to the given max count.
     *
     * @param int $maxCount The total length of the generated string.
     * @return string Generated string.
     */
    private function generateString(int $maxCount): string
    {
        $letters = ['A', 'B', 'C'];
        $string = '';

        for ($i = 0; $i < $maxCount; $i++) {
            $string .= $letters[array_rand($letters)];
        }

        return $string;
    }
}

// // Usage example:
// $maxCount1 = 6; // Total length of the first string
// $maxCount2 = 8; // Total length of the second string
// $generator = new StringGenerator($maxCount1, $maxCount2);

// [$string1, $string2] = $generator->generateStrings();

// echo "String 1: $string1 <br>";
// echo "String 2: $string2";
