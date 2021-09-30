<?php

namespace Jit\Fleetrunnr;

use Illuminate\Support\Facades\Http;

class Customer
{
    public function __construct($token)
    {
        $this->token = $token;
    }

    public function list()
    {
        $response = Http::withToken($this->token)->get('https://fleetrunnr.com/api/rest/customers');
        if(($response->status()) >= 200 && ($response->status() <300))
        {
            return $response->successful();
        }
        return $response->failed();
    }

    public function create(Array $data)
    {
        $response = Http::withToken($this->token)->post('https://fleetrunnr.com/api/rest/customers', $data);
        if(($response->status()) >= 200 && ($response->status() <300))
        {
            return $response->successful();
        }
        return $response->failed();
    }

    public function update(Array $data, int $id)
    {
        $response = Http::withToken($this->token)->put('https://fleetrunnr.com/api/rest/customers/'. $id, $data);
        if(($response->status()) >= 200 && ($response->status() <300))
        {
            return $response->successful();
        }
        return $response->failed();
    }

    public function delete(int $id)
    {
        $response = Http::withToken($this->token)->delete('https://fleetrunnr.com/api/rest/customers'. $id);
        if(($response->status()) >= 200 && ($response->status() <300))
        {
            return $response->successful();
        }
        return $response->failed();
    }
}