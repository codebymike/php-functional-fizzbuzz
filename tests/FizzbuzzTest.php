<?php

namespace Mike\Fizzbuzz;

class FizzbuzzTest extends \PHPUnit\Framework\TestCase
{
    public function setUp()
    {
        $this->fizzbuzz = new Fizzbuzz();
    }

    public function test_that_new_fizzbuzz_is_empty()
    {
        $this->fizzbuzz->set_range([]);
        $this->assertEquals( $this->fizzbuzz->generate(), [] );
    }

    public function test_that_fizzbuzz_returns_1_for_1()
    {
        $range = [1];
        $this->fizzbuzz->set_range( $range );
        $this->assertEquals( $this->fizzbuzz->generate(), ['1'] );
    }

    public function test_that_fizzbuzz_returns_fizz_for_3()
    {
        $range = [3];
        $this->fizzbuzz->set_range( $range );
        $this->assertEquals( $this->fizzbuzz->generate(), ['fizz'] );
    }

    public function test_that_fizzbuzz_returns_fizz_for_numbers_divisible_by_3()
    {
        $range = [1,2,3,4,6];
        $this->fizzbuzz->set_range( $range );
        $this->assertEquals( $this->fizzbuzz->generate(), ['1','2','fizz','4','fizz'] );
    }

    public function test_that_fizzbuzz_returns_buzz_for_numbers_divisible_by_5()
    {
        $range = [1,2,3,4,5,6];
        $this->fizzbuzz->set_range( $range );
        $this->assertEquals( $this->fizzbuzz->generate(), ['1','2','fizz','4','buzz','fizz'] );
    }

    public function test_that_fizzbuzz_returns_fizzbuzz_for_numbers_divisible_by_3_and_5()
    {
        $range = [1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16];
        $this->fizzbuzz->set_range( $range );
        $this->assertEquals( $this->fizzbuzz->generate(), ['1','2','fizz','4','buzz','fizz','7','8','fizz','buzz','11','fizz','13','14','fizzbuzz','16'] );
    }
}