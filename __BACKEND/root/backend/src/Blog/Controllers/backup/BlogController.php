<?php 
namespace Blog\Controllers;

use Blog\Models\PostModel;

use Respect\Rest\Routable;

// Not in use yet, but in the future it could be used. Think about the modal login form on root url...
final class BlogController implements Routable
{
	public function post($id)
	{
		lobal $post;
		
		return null;

		$posts = [];
		$posts['post'] = [];

		$catName = get_the_category_by_ID($id);
		$args = array('category_name' => $catName, 'posts_per_page' => 5);

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

/*$my_query = new WP_Query( array(
    'cat'=>1,
    'year'=>date('Y'),
    'monthnum'=>date('m'),
    'day'=>date('d'),
    'posts_per_page'=>-1 ) );*/