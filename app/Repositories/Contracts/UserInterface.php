<?php
namespace App\Repositories\Contracts;
interface UserInterface{

    /**
     * 根据ID查找用户
     * @param $id
     * @return mixed
     */
    public function findBy($id);
}