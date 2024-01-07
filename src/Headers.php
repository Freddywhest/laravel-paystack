<?php
namespace Roddy\Paystack;

abstract class Headers
{
    protected function headers(): array
    {
        return array(
            "Authorization" => "Bearer ".env('PAYSTACK_SECRET_KEY'),
            "Cache-Control" => "no-cache",
            "Accept" => "application/json"
        );
    }
}
