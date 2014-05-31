<?php 
namespace Blog\Helpers;

final class TagWP {
	public function getSidebar ($sb_name) {
		ob_start();
		dynamic_sidebar($sb_name);
		$sb = ob_get_contents();
		ob_end_clean();

		return $sb;
	}
}