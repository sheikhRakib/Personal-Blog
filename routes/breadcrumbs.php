<?php

use App\Models\Category;
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
