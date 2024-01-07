<?php
namespace Roddy\Paystack\Facades;

use Roddy\Paystack\Transfer as PaystackTransfer;

/**
 * @method static \Roddy\Paystack\Transfer send(array $data, bool $multiply = false)
 * @method static \Roddy\Paystack\Transfer finalize (string $transferCode, string $otp)
 * @method static \Roddy\Paystack\Transfer bulk(array $data)
 * @see \Roddy\Paystack\Transfer;
*/

class Transfer
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackTransfer())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
