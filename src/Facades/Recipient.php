<?php
namespace Roddy\Paystack\Facades;

use Roddy\Paystack\Recipient as PaystackRecipient;

/**
 * @method static \Roddy\Paystack\Recipient single(array $data)
 * @method static \Roddy\Paystack\Recipient bulk(array $data)
 * @see \Roddy\Paystack\Recipient;
*/

class Recipient
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackRecipient())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
