<?php

namespace app\service;
use app\models\Post;

class PostService
{

    public function get(): array
    {
        $post = new Post();
        return $post->get();
    }

    public function create(array $fields): bool
    {
        $post = new Post();
        $post->title = $fields["title"];
        $post->body = $fields["body"];
        $post->user_id = $fields["user_id"];
        $res = $post->create();
        if ($res) {
            return true;
        } else {
            return false;
        }
    }

}