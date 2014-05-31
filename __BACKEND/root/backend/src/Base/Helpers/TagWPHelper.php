<?php 
namespace Base\Helpers;

use Base\Helpers\NotInstantiable;

class TagWPHelper extends NotInstantiable {
	public function getSidebar ($sb_name) {
		ob_start();
		dynamic_sidebar($sb_name);
		$sb = ob_get_contents();
		ob_end_clean();

		return $sb;
	}
}