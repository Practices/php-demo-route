<?php
namespace App\Model;

use App\Core\Model;

class HomeModel extends Model
{
    public $name;

    function __construct()
    {
        $this->name = 'Добро пожаловать в мир PHP.';
    }

    public function getData()
    {
        return $this->name;
    }
}
