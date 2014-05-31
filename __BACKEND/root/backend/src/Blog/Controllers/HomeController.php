<?php 
namespace Blog\Controllers;

use Blog\Helpers\TagWP;
use Respect\Rest\Routable;

final class HomeController implements Routable
{
	private $tag;

	public function __construct ()
	{
		$this->tag = new TagWP();
	}

	public function get ()
	{
		$content = [];

		$content['title'] = "Example Content Page";

		echo json_encode($content);

		exit();
	}

	public function post ()
	{

		exit();
	}
}