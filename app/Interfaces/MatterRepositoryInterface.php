<?php

namespace App\Interfaces;
interface MatterRepositoryInterface 

{
    public function getAllMatters();
    public function getMatterById($matterId);
    public function getMatterByName($name);
    //public function deleteMatter($matterId);
    //public function createMatter(array $matterDetails);
    //public function updateMatter($matterId, array $newDetails);
    //public function getFulfilledOrders(); 

}