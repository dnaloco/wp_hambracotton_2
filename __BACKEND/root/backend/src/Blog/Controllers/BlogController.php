<?php
namespace Blog\Controllers;

use Respect\Rest\Routable;

final class BlogController implements Routable
{
	public function __construct ()
	{

	}

	public function get ()
	{
		$configs = [];

		$configs['showSidebarMiddleTop'] = true;

		echo json_encode($configs);

		exit();
	}

	public function post ()
	{

		exit();
	}
}