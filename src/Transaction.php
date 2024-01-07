<?php
namespace Roddy\Paystack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Transaction extends Headers
{
    public function refund(array $data, bool $multiply = false): Response
    {
        if(isset($data['amount']) && $multiply == false){
            $data = [
                ...$data,
                "amount" => (int) $data['amount'] * 100
            ];
        }

        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_REFUND_ENDPOINT, $data);
        return $response->json();
    }

    public function listRefunds(): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_REFUND_ENDPOINT);

        return $response->json();
    }

    public function getRefund(string $reference): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_REFUND_ENDPOINT.'/'.$reference);

        return $response->json();
    }

    public function all(array $filters): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_TRANSACTION_ENDPOINT, $filters);

        return $response->json();
    }

    public function single(int $id): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_TRANSACTION_ENDPOINT.'/'.$id);

        return $response->json();
    }

    public function totals(): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_TRANSACTION_TOTALS_ENDPOINT);

        return $response->json();
    }

    public function verify(string $reference): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_TRANSACTION_VERIFY_ENDPOINT.'/'.$reference);

        return $response->json();
    }
}
