<?php

namespace App\Http\Traits;

trait ApiUrl
{
    public function getApiUrl()
    {
        return env('API_URL') . 'v1/';
    }
}