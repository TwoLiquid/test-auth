<?php

/**
 * This is a file with global helper functions
 */

if (!function_exists('generateTwoFactorCode')) {

    /**
     * @return string
     */
    function generateTwoFactorCode() : string
    {
        return sprintf("%06d", mt_rand(1, 999999));
    }
}
