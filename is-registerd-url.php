<?php
/*
Plugin Name: Is URL already registerd.
Description: 記事中のURLが登録済か判断する
Author: Toshio Abe
Version: 0.1
*/

class Is_URL_Already_Registerd {
    static $instance = null;

    private function __construct(){
        add_filter('wp_insert_post_data', array($this, 'insert_post_data'));
    }

    private function insert_post_data($data, $postarr)
    {
        $data['post_title'] = '投稿更新時をフックした';
        return $data;
    }

    public static function getInstance(){
        if(!self::$instance){
            self::$instance = new self();
        }
        return self::$instance;
    }

}

$is_url_already_registerd = Is_URL_Already_Registerd::getInstance();
