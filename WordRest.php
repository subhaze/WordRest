<?php

class WordRest {

	public static $WORDPRESS_URL = "";

	public static function getPage($slug){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_page&slug=' . $slug);
	}

	public static function getPosts($category, $page = 1, $limit = 10){
		return self::getJSON(self::$WORDPRESS_URL.'?json=get_category_posts&slug='.$category.'&count='.$limit.'&page='.$page);
	}

	public static function getRecentPosts($page = 1, $limit = 10){
		return self::getJSON(self::$WORDPRESS_URL.'?json=get_recent_posts&count='.$limit.'&page='.$page);
	}

	public static function getPost($slug){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_post&slug=' . $slug);
	}

	public static function getCategories(){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_category_index');
	}

	public static function getTagged($tag, $page = 1, $limit = 9){
		return self::getJSON(self::$WORDPRESS_URL.'?json=get_tag_posts&tag_slug='. $tag .'&count='.$limit.'&page='.$page);
	}

	private static function getJSON($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$jsonData = curl_exec($ch);
		curl_close($ch);
		return json_decode($jsonData);
	}
}
