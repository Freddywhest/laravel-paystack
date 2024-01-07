<?php

use Roddy\Paystack\Verification as PaystackVerification;

/**
 * @method static \Roddy\Paystack\Verification bank(string $account_number, string $bankCode)
 * @method static \Roddy\Paystack\Verification card(string $bin)
 * @see \Roddy\Paystack\Verification;
*/
class Verification
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackVerification())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
