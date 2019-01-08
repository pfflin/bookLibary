<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/6/2018
 * Time: 2:02 PM
 */

namespace App\Data;


class ErrorDTO
{
    private $message;
    public function __construct($message)
    {
        $this->message=$message;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }
}