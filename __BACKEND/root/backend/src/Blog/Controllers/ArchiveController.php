<?php 
namespace Blog\Controllers;

use Blog\Helpers\TagWP;
use Respect\Rest\Routable;

final class ArchiveController implements Routable
{
	public function __construct ()
	{

	}

	public function get ($cat_slug, $options)
	{
		global $post;

		$objId = get_category_by_slug( $cat_slug );
		$cat_id = $objId->term_id;
		$cat_name = get_cat_name( $cat_id );

		$content =[];
		$content['posts'] = [];
		$content['page_title'] = ucfirst( $cat_name );

		$args = array( 'posts_per_page' => $options[0], 'offset'=> $options[1], 'category' => $cat_id );

		$myposts = get_posts( $args );
		

		foreach ( $myposts as $post ) : setup_postdata( $post );
			$content['posts'][] = [
				'title' => get_the_title(),
				'excerpt' => get_the_excerpt(),
				'time' => get_the_time('d/m/Y'),
				'link' => '/post/' . $cat_slug . '/' . $post->post_name,
			];
		endforeach; 

		wp_reset_postdata();

		echo json_encode($content);

		exit();
	}

	public function post ()
	{

		exit();
	}
}