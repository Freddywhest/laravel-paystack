<?php
namespace Roddy\Paystack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Recipient extends Headers
{

    public function single(array $data): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_RECIPIENT_ENDPOINT, $data);
        return $response;
    }

    public function bulk(array $data): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_RECIPIENTS_ENDPOINT, $data);
        return $response;
    }
}
