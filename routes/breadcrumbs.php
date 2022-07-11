<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Diglactic\Breadcrumbs\Breadcrumbs;
use Diglactic\Breadcrumbs\Generator as BreadcrumbTrail;


// Dashboard
Breadcrumbs::for('index', function (BreadcrumbTrail $trail) {
    $trail->push('Dashboard', route('dashboard.index'));
});

// Dashboard > Category
Breadcrumbs::for('category.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Category', route('dashboard.category.index'));
});

// Dashboard > Category > New
Breadcrumbs::for('category.create', function (BreadcrumbTrail $trail) {
    $trail->parent('category.index');
    $trail->push('New', route('dashboard.category.create'));
});

// Dashboard > Category > [Category]
Breadcrumbs::for('category.show', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('category.index');
    $trail->push($category->name, route('dashboard.category.show', $category));
});

// Dashboard > Category > Edit
Breadcrumbs::for('category.edit', function (BreadcrumbTrail $trail, Category $category) {
    $trail->parent('category.index');
    $trail->push('Edit', route('dashboard.category.edit', $category));
});

// Dashboard > Tag
Breadcrumbs::for('tag.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Tag', route('dashboard.tag.index'));
});

// Dashboard > Tag > New
Breadcrumbs::for('tag.create', function (BreadcrumbTrail $trail) {
    $trail->parent('tag.index');
    $trail->push('New', route('dashboard.tag.create'));
});

// Dashboard > Tag > [Tag]
Breadcrumbs::for('tag.show', function (BreadcrumbTrail $trail, Tag $tag) {
    $trail->parent('tag.index');
    $trail->push($tag->name, route('dashboard.tag.show', $tag));
});

// Dashboard > Tag > Edit
Breadcrumbs::for('tag.edit', function (BreadcrumbTrail $trail, Tag $tag) {
    $trail->parent('tag.index');
    $trail->push('Edit', route('dashboard.tag.edit', $tag));
});


// Dashboard > Post
Breadcrumbs::for('post.index', function (BreadcrumbTrail $trail) {
    $trail->parent('index');
    $trail->push('Post', route('dashboard.post.index'));
});

// Dashboard > Post > New
Breadcrumbs::for('post.create', function (BreadcrumbTrail $trail) {
    $trail->parent('post.index');
    $trail->push('New', route('dashboard.post.create'));
});

// Dashboard > Post > [Post]
Breadcrumbs::for('post.show', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('post.index');
    $trail->push($post->title, route('dashboard.category.show', $post));
});

// Dashboard > Post > Edit
Breadcrumbs::for('post.edit', function (BreadcrumbTrail $trail, Post $post) {
    $trail->parent('post.index');
    $trail->push('Edit', route('dashboard.post.edit', $post));
});
