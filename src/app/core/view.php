<?php
namespace App\Core;
class View
{
    protected $dirViews;

    public function __construct()
    {
        $this->dirViews = dirname(__DIR__).'\views\\';
    }

    function generate($content_view, $template_view, $data = null)
	{
		include $this->dirViews.$template_view;
	}
}
