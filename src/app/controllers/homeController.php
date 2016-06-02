<?php
namespace App\Controller;

use App\Core\Controller;
use App\Model\HomeModel;

class HomeController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->model = new HomeModel();
    }
    public function index()
    {
        $data = $this->model->getData();
        $this->view->generate('homeView.php', 'templateView.php', $data);
    }

    public function get($id)
    {
        $data = "id:".$id;
        $this->view->generate('homeView.php', 'templateView.php', $data);
    }
}
