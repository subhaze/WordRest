<?php

class WordRest {
	
	public static $WORDPRESS_URL = "";

	public static function getPage($slug){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_page&slug=' . $slug);
	}

	public static function getPosts($category){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_category_posts&slug=' . $category);
	}

	public static function getPost($slug){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_post&slug=' . $slug);
	}

	public static function getCategories(){
		return self::getJSON(self::$WORDPRESS_URL . '?json=get_category_index');
	}

	private static function getJSON($url){
		$ch = curl_init($url);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$jsonData = curl_exec($ch);
		curl_close($ch);
		return json_decode($jsonData);
	}
}