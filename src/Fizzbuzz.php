<?php

namespace Mike\Fizzbuzz;

/*
Write a short program that prints each number from 1 to 100 on a new line. 
For each multiple of 3, print "Fizz" instead of the number. 
For each multiple of 5, print "Buzz" instead of the number. 
For numbers which are multiples of both 3 and 5, print "FizzBuzz" instead of the number.
*/

class Fizzbuzz
{
    use Functional;

    private $range = [];

    public function set_range( Array $range ) : void
    {
        $this->range = $range;
    }

    public function generate() : array
    {
        $composition = $this->compose(
            'map_3_and_5_to_fizzbuzz',
            'map_5_to_buzz',
            'map_3_to_fizz'
        );

        return array_map( 
            function( $item ) use ($composition)
            {
                return $composition( $item );
            },
            $this->range
        );

        //native alternative
        /*
        return array_map(
            function( $item )
            {
                return $this->map_3_to_fizz( 
                            $this->map_5_to_buzz(
                                $this->map_3_and_5_to_fizzbuzz(
                                    strval($item)
                                )
                            )
                        );
            },
            $this->range
        );
        */

    }

    private function map_3_to_fizz( String $number ) : string
    {
        return ( is_numeric($number) && intval($number) % 3 == 0 ) ? 'fizz' : strval($number);
    }

    private function map_5_to_buzz( String $number) : string
    {
        return ( is_numeric($number) && intval($number) % 5 == 0 ) ? 'buzz' : strval($number);
    }

    private function map_3_and_5_to_fizzbuzz( String $number ) : string
    {
        return ( is_numeric($number) && ( intval($number) % 3 == 0 && intval($number) % 5 == 0 ) ) ? 'fizzbuzz' : strval($number);
    }
}
