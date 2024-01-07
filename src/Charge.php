<?php
namespace Roddy\Paystack;

use Illuminate\Support\Facades\Http;
use Roddy\Paystack\enums\Constants;

class Charge extends Headers
{

    public function pay(array $data, bool $multiply = false)
    {
        if(isset($data['amount']) && $multiply == false){
            $data = [
                ...$data,
                "amount" => (int) $data['amount'] * 100
            ];
        }

        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_ENDPOINT, $data);

        return $response->json();
    }

    public function submitOtp(array $data)
    {
        $response = Http::withHeaders($this->headers())
                    ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_SUBMIT_OTP_ENDPOINT, $data);

        return $response->json();
    }

    public function checkStatus(string $reference)
    {
        $response = Http::withHeaders($this->headers())
            ->get(Constants::API_ENDPOINT.'/'.Constants::VERIFY_TRANSACTION.'/'.$reference);

        return $response->json();
    }

    public function submitPin(array $data)
    {
        $response = Http::withHeaders($this->headers())
            ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_SUBMIT_PIN_ENDPOINT, $data);

        return $response->json();
    }

    public function submitPhone(array $data)
    {
        $response = Http::withHeaders($this->headers())
            ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_SUBMIT_PHONE_NUMBER_ENDPOINT, $data);

        return $response->json();
    }

    public function submitBirthday(array $data)
    {
        $response = Http::withHeaders($this->headers())
            ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_SUBMIT_BIRTHDAY_ENDPOINT, $data);

        return $response->json();
    }

    public function submitAddress(array $data)
    {
        $response = Http::withHeaders($this->headers())
            ->post(Constants::API_ENDPOINT.'/'.Constants::CHARGE_SUBMIT_ADDRESS_ENDPOINT, $data);

        return $response->json();
    }
}
