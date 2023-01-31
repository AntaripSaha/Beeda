<?php

namespace App\Constants;

abstract class LoanStatus
{
    const APPROVED = 'Approved';
    const PROCESSING = 'Processing';
    const REJECTED = 'Rejected';
    const ON_HOLD = 'On Hold';
}