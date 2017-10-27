<?php

namespace Mike\Fizzbuzz;

/*
Functional Helper to build prettier function compositions
*/

trait Functional
{
    private function identity($value)
    {
        return $value;
    }

    public function compose(...$functions)
    {
        return array_reduce(
            $functions,
            function ($chain, $function)
            {
                return function ($input) use ($chain, $function)
                {
                    return $this->$function( $chain($input) );
                };
            },
            [$this, 'identity']
        );
    }
}