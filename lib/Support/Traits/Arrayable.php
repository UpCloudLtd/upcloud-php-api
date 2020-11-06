<?php

declare(strict_types=1);

namespace Upcloud\ApiClient\Support\Traits;

use InvalidArgumentException;

trait Arrayable
{
    public function offsetExists($key)
    {
        $key = $this->toCamelCase($key);

        return property_exists($this, $key);
    }

    public function offsetGet($key)
    {
        return $this->get($key);
    }

    public function offsetSet($key, $value)
    {
        $this->set($key, $value);
    }

    public function offsetUnset($key)
    {
        if ($this->offsetExists($key)) {
            $key = $this->toCamelCase($key);
            unset($this->{$key});
        }
    }

    private function set($key, $value)
    {
        if (!$this->offsetExists($key)) {
            throw new InvalidArgumentException("Undefined index: {$key}");
        }

        $key = $this->toCamelCase($key);

        $this->{$key} = $value;
    }

    private function get($key)
    {
        if (!$this->offsetExists($key)) {
            throw new InvalidArgumentException("Undefined index: {$key}");
        }

        $key = $this->toCamelCase($key);

        return $this->{$key};
    }

    private function toCamelCase($string)
    {
        return lcfirst(str_replace('_', '', ucwords($string, '_')));
    }
}
