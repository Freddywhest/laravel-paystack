<?php
namespace Roddy\Paystack\Facades;

use Roddy\Paystack\Customer as PaystackCustomer;

/**
 * @method static \Roddy\Paystack\Customer create(array $data)
 * @method static \Roddy\Paystack\Customer all(array $filters)
 * @method static \Roddy\Paystack\Customer single(string $email_or_code)
 * @method static \Roddy\Paystack\Customer update(string $email_or_code, array $data)
 * @see \Roddy\Paystack\Customer;
*/

class Customer
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackCustomer())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
