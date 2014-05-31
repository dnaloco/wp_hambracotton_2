<?php
namespace Blog\Controllers;

use Respect\Rest\Routable;

final class LoginController implements Routable
{
	public function __construct ()
	{

	}

	public function get ()
	{
		global $current_user;

		get_currentuserinfo();

		$content = [];

		$content['login'] = [];

		$content['login']['check_user'] = false;

		if ( is_user_logged_in() ) {
		    $content['login']['check_user'] = true;
		    $content['login']['user_login'] = $current_user->user_login;
		    $content['login']['user_email'] = $current_user->user_email;
		    $content['login']['user_firstname'] = $current_user->user_firstname;
		    $content['login']['user_lastname'] = $current_user->user_lastname;
		    $content['login']['display_name'] = $current_user->display_name;
		    $content['login']['ID'] = $current_user->ID;
		}

		echo json_encode($content);

		exit();
	}

	public function post ()
	{
		exit();
	}
}


/**
 * @example Safe usage: $current_user = wp_get_current_user();
 * if ( !($current_user instanceof WP_User) )
 *     return;
 */

/*$current_user = wp_get_current_user();

echo 'Username: ' . $current_user->user_login . '<br />';
echo 'User email: ' . $current_user->user_email . '<br />';
echo 'User first name: ' . $current_user->user_firstname . '<br />';
echo 'User last name: ' . $current_user->user_lastname . '<br />';
echo 'User display name: ' . $current_user->display_name . '<br />';
echo 'User ID: ' . $current_user->ID . '<br />';*/