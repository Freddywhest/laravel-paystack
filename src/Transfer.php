<?php
namespace Roddy\Paystack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Transfer extends Headers
{
    /**
     * @example
     * $data = [
     *    "source" => $source,
     *    "reason" => $reason,
     *    "amount" => $amount,
     *    "recipient" => $recipient,
     *    "reference" => $reference, //unique
     *    "currency" => $currency
     * ];
    */

    public function send(array $data, bool $multiply = false): Response
    {
        if(isset($data['amount']) && $multiply == false){
            $data = [
                ...$data,
                "amount" => (int) $data['amount'] * 100
            ];
        }

        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_ENDPOINT, $data);
        return $response->json();
    }

    /**
     * @example
     * $data = [
     *   "transfer_code" => $transferCode,
     *   "otp" => $otp
     * ];
    */
    public function finalize (string $transferCode, string $otp): Response
    {
        $data = [
            "transfer_code" => $transferCode,
            "otp" => $otp
        ];

        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_FINALIZE_ENDPOINT, $data);
        return $response->json();
    }

    /**
     * @example
     * ```php
     * $data = [
     * 'currency' => "NGN",
     * 'source' => "balance",
     * 'transfers' => [[
     *    "amount" => 20000,
     *    "reference" => "588YtfftReF355894J",
     *    "reason" => "Why not?",
     *    "recipient" => "RCP_2tn9clt23s7qr28"
     *  ],
     *  [
     *    "amount" => 30000,
     *    "reference" => "YunoTReF35e0r4J",
     *    "reason" => "Because I can",
     *    "recipient" => "RCP_1a25w1h3n0xctjg"
     *  ],
     *  [
     *    "amount" => 40000,
     *    "reason" => "Coming right up",
     *    "recipient" => "RCP_aps2aibr69caua7"
     *  ]]
     * ];
     * ```
    */
    public function bulk(array $data): Response
    {
        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::TRANSFER_BULK_ENDPOINT, $data);
        return $response->json();
    }
}
