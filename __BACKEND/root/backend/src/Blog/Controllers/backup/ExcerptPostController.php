<?php 
namespace Blog\Controllers;

use Respect\Rest\Routable;

final class ExcerptPostController implements Routable
{
	public function post($catId, $limit = 5, $isFull = false)
	{
		$posts = [];
		$posts['post'] = [];

		$catName = get_the_category_by_ID($catId);
		$args = array('category_name' => $catName, 'posts_per_page' => $limit);

		// A Query
		$cat = new \WP_Query( $args );
		 
		// O Loop
		while ( $cat->have_posts() ) : $cat->the_post();
		   	$posts['post'][] = [
		   		'title' => get_the_title(),
				'excerpt' => get_the_excerpt(),
				'time' => get_the_time('d/m/Y'),
			    'link' => get_post_permalink(),			    
		   	];
		endwhile;

		echo json_encode($posts);

		exit();
	}
}