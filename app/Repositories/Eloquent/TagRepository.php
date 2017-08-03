<?php
namespace App\Repositories\Eloquent;
use App\Repositories\Eloquent\Repository;
use App\Tag;

class TagRepository extends Repository{

    function model()
    {
        // TODO: Implement model() method.
        return Tag::class;
    }



}