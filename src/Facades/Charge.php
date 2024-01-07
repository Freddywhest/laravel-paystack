<?php
namespace Roddy\Paystack\Facades;

use Roddy\Paystack\Charge as PaystackCharge;

/**
 * @method static \Roddy\Paystack\Charge pay(array $data, bool $multiply = false)
 * @method static \Roddy\Paystack\Charge submitOtp(array $data)
 * @method static \Roddy\Paystack\Charge checkStatus(string $reference)
 * @method static \Roddy\Paystack\Charge submitPin(array $data)
 * @method static \Roddy\Paystack\Charge submitPhone(array $data)
 * @method static \Roddy\Paystack\Charge submitBirthday(array $data)
 * @method static \Roddy\Paystack\Charge submitAddress(array $data)
 * @see \Roddy\Paystack\Charge;
*/
class Charge
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackCharge())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
