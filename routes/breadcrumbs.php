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

// Home > Finance
Breadcrumbs::register('finance', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Finanzen', url('#!'));
});

// Home > Finance > Category
Breadcrumbs::register('category', function ($breadcrumbs) {
    $breadcrumbs->parent('finance');
    $breadcrumbs->push('Kategorie', action('FinanceCategoryController@index'));
});