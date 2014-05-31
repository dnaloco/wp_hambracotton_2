<?php 
namespace Blog\Controllers;

use Respect\Rest\Routable;


final class PostController implements Routable
{
	public function post($postSlug)
	{
		// $posts = [];
		// $posts['post'] = [];

		//$post = get_page_by_path($postSlug, OBJECT, 'post');
		// var_dump($post);
/*		$args = array('category_name' => $catName, 'posts_per_page' => 5);

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
*/
		// echo "Post slug" . $postSlug;
		exit();
	}
}