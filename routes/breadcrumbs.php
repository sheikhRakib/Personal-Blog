<?php

use App\Models\Category;
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
