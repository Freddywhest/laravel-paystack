<?php
namespace Roddy\Paystack\Facades;

use Roddy\Paystack\Transaction as PaystackTransaction;

/**
 * @method static \Roddy\Paystack\Transaction refund(array $data, bool $multiply = false)
 * @method static \Roddy\Paystack\Transaction listRefunds()
 * @method static \Roddy\Paystack\Transaction getRefund(string $reference)
 * @method static \Roddy\Paystack\Transaction all(array $filters)
 * @method static \Roddy\Paystack\Transaction single(int $id)
 * @method static \Roddy\Paystack\Transaction totals()
 * @method static \Roddy\Paystack\Transaction verify(string $reference)
 * @see \Roddy\Paystack\Transaction;
*/

class Transaction
{
    public static function __callStatic($name, $arguments)
    {
        try {
            return (new PaystackTransaction())->$name(...$arguments);
        } catch (\Throwable $th) {
            throw new \Exception("Call to undefined method ".static::class."::".$name."().". ' Main Error:- ' .$th->getMessage(), 1);
        }
    }
}
