<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:06 AM
 */

namespace App\Service;


use App\Data\GenreDTO;

interface GenreServiceInterface
{
    /** @return \Generator|GenreDTO[] */
    public function all() : \Generator;
}