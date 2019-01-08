<?php
/**
 * Created by PhpStorm.
 * User: Pavlin
 * Date: 11/11/2018
 * Time: 11:03 AM
 */

namespace App\Repository;


use App\Data\GenreDTO;

interface GenreRepositoryInterface
{
    /** @return \Generator|GenreDTO[] */
    public function findAll():\Generator;
}