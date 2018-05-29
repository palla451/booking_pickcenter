<?php


namespace App\Enumerations;

/**
 * Class UserStatus
 *
 * @package App\Enumerations
 * @author Pisyek K
 * @url www.pisyek.com
 * @copyright © 2017 Pisyek Studios
 */
class UserStatus
{
    /**
     * Default user status after register
     * User cannot login in this state
     */
    const INACTIVE = 0;

    /**
     * User status after activation
     * User can login and access the dashboard
     */
    const ACTIVE = 1;
}