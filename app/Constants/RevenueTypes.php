<?php

namespace App\Constants;

abstract class RevenueTypes
{
    const SALE = 'sales_fee';
    const WALLET_TO_WALLET_TRANSFER = 'wallet_to_wallet_transfer_fee';
    const WALLET_TO_MARCHANT = 'wallet_to_marchant_fee';
    const WALLET_TO_BANK = 'wallet_to_bank_fee';
    const WALLET_TO_WALLET_TRANSFER_LIMIT = 'wallet_to_wallet_transfer_limit';
    const WALLET_TO_MARCHANT_TRANSFER_LIMIT = 'wallet_to_marchant_transfer_limit';
}
