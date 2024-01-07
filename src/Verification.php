<?php
namespace Roddy\Paystack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Verification extends Headers
{
    public function bank(string $account_number, string $bankCode): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_VERIFICATION_ENDPOINT,[
                        "account_number" => $account_number,
                        "bank_code" => $bankCode
                    ]);

        return $response->json();
    }

    public function card(string $bin): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->get(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_VERIFICATION_CARD_ENDPOINT.'/'.$bin);

        return $response->json();
    }
}
