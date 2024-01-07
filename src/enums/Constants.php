<?php
namespace Roddy\Paystack\enums;

enum Constants
{
    const API_ENDPOINT = 'https://api.paystack.co';
    const CHARGE_ENDPOINT = 'charge';
    const CHARGE_SUBMIT_OTP_ENDPOINT = 'charge/submit_otp';
    const CHARGE_SUBMIT_PIN_ENDPOINT = 'charge/submit_pin';
    const CHARGE_SUBMIT_PHONE_NUMBER_ENDPOINT = 'charge/submit_phone';
    const CHARGE_SUBMIT_BIRTHDAY_ENDPOINT = 'charge/submit_birthday';
    const CHARGE_SUBMIT_ADDRESS_ENDPOINT = 'charge/submit_address';
    const VERIFY_TRANSACTION = 'transaction/verify';
    const TRANSFER_ENDPOINT = 'transfer';
    const TRANSFER_BULK_ENDPOINT = 'transfer/bulk';
    const TRANSFER_FINALIZE_ENDPOINT = 'transfer/finalize_transfer';
    const TRANSFER_RECIPIENT_ENDPOINT = 'transferrecipient';
    const TRANSFER_RECIPIENTS_ENDPOINT = 'transferrecipient/bulk';
    const TRANSFER_REFUND_ENDPOINT = 'refund';
    const TRANSFER_VERIFICATION_ENDPOINT = 'bank/resolve';
    const TRANSFER_VERIFICATION_CARD_ENDPOINT = 'decision/bin';
    const TRANSFER_TRANSACTION_ENDPOINT = 'transaction';
    const TRANSFER_TRANSACTION_TOTALS_ENDPOINT = 'transaction/totals';
    const TRANSFER_TRANSACTION_VERIFY_ENDPOINT = 'transaction/verify';
    const CUSTOMER_ENDPOINT = 'customer';
}
