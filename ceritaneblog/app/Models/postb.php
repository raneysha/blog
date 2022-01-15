<?php

namespace App\Models;




class post
{
    private static $blogpost = [
        [
            "judul" => "Judul Post Pertama",
            "slug" => "judul-post-pertama",
            "author" => "Cahyo Dwi Setiono",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid quisquam quod ipsum, molestiae, 
            asperiores nulla iste autem omnis repudiandae, quos molestias laudantium temporibus sunt sapiente obcaecati neque laborum tempore voluptas."
        ],
        [
            "judul" => "Judul Post Kedua",
            "slug" => "judul-post-kedua",
            "author" => "Cahyo Dwi Setiono",
            "body" => "Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aliquid quisquam quod ipsum, molestiae, 
            asperiores nulla iste autem omnis repudiandae, quos molestias laudantium temporibus sunt sapiente obcaecati neque laborum tempore voluptas."
        ]
    ];

    public static function all()
    {
        return collect(self::$blogpost);
    }
    public static function find($slug)
    {
        $posts = static::all();
        return $posts->firstWhere('slug', $slug);
    }
}
