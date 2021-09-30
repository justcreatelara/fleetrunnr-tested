<?php

namespace Jit\Fleetrunnr;

class Fleetrunnr
{
    /**
     * The Fleetrunnr API Key.
     *
     * @var string
     */
    protected $apiKey;

    public function __construct($apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function customers()
    {
        return new Customer($this->apiKey);
    }
}
