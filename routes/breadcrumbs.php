<?php

// Home
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('top'));
});

// Home > About
// Breadcrumbs::for('about', function ($trail) {
//     $trail->parent('home');
//     $trail->push('About', route('about'));
// });


Breadcrumbs::for('timeline', function ($trail) {
    $trail->parent('home');
    $trail->push('Timeline', route('user_timeline'));
});

Breadcrumbs::for('detail', function ($trail, $post) {
    $trail->parent('timeline');
    $trail->push($post->title, route('user_postdetail', $post->id));
});

// Breadcrumbs::for('postedit', function ($trail, $edit_post) {
//     $trail->parent('detail');
//     $trail->push('Edit', route('post_edit', $edit_post->id));
// });
Breadcrumbs::for('search', function ($trail) {
    $trail->parent('timeline');
    $trail->push('検索', route('search'));
});

Breadcrumbs::for('mypage', function ($trail, $user_info) {
    $trail->parent('timeline');
    $trail->push($user_info->name, route('mypage', $user_info->id));
});

Breadcrumbs::for('followings', function ($trail) {
    $trail->parent('mypage');
    $trail->push('Following', route('followings', $user_info->id));
});

// Home > Blog > [Category] > [Post]
// Breadcrumbs::for('post', function ($trail, $post) {
//     $trail->parent('category', $post->category);
//     $trail->push($post->title, route('post', $post->id));
// });