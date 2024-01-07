<?php
namespace Roddy\Paystack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Customer extends Headers
{
    public function create(array $data): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::CUSTOMER_ENDPOINT, $data);
        return $response;
    }

    public function all(array $filters): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::CUSTOMER_ENDPOINT, $filters);

        return $response->json();
    }

    public function single(string $email_or_code): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::CUSTOMER_ENDPOINT.'/'.$email_or_code);

        return $response->json();
    }

    public function update(string $email_or_code, array $data): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->put(Constants::API_ENDPOINT.'/'.Constants::CUSTOMER_ENDPOINT.'/'.$email_or_code, $data);

        return $response->json();
    }
}
