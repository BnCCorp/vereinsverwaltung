<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16.12.2017
 * Time: 17:17
 */

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Home', action('PageController@index'));
});

// Home > Members
Breadcrumbs::register('members', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Mitglieder', action('MemberController@index'));
});

// Home > Members > [Member]
Breadcrumbs::register('member', function ($breadcrumbs, $member) {
    $breadcrumbs->parent('members');
    $tmp = $member->firstname . ' ' . $member->lastname;
    $breadcrumbs->push($tmp, route('members.edit', $member->id));
});

// Home > Finance
Breadcrumbs::register('finance', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Finanzen', url('#!'));
});

// Home > Finance > Categories
Breadcrumbs::register('categories', function ($breadcrumbs) {
    $breadcrumbs->parent('finance');
    $breadcrumbs->push('Kategorie', action('FinanceCategoryController@index'));
});

// Home > Finance > Categories > [Category]
Breadcrumbs::register('category', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('categories');
    $breadcrumbs->push($category->name, route('finance.categories.edit', $category->id));
});