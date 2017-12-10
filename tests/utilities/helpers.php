<?php

/**
 * @param       $class
 * @param array $attributes
 *
 * @return mixed
 */
function create($class, array $attributes = [])
{
    return factory($class)->create($attributes);
}

/**
 * @param       $class
 * @param array $attributes
 *
 * @return mixed
 */
function make($class, array $attributes = [])
{
    return factory($class)->make($attributes);
}