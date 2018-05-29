<?php

namespace App\Enumerations;

/**
 * Class BookingStatus
 *
 * @package App\Enumerations
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
 */
abstract class BookingStatus extends BasicEnum
{
    const INACTIVE = 0;
    const ACTIVE = 1;
    const CANCELLED = 2;
}