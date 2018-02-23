<?php
/**
 * Created by PhpStorm.
 * User: Steffen
 * Date: 16.12.2017
 * Time: 17:17
 */

// Home
try {
    Breadcrumbs::register('home', function ($breadcrumbs) {
        $breadcrumbs->push('Home', action('PageController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Members
try {
    Breadcrumbs::register('members', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push('Mitglieder', action('MemberController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Members > [Member]
try {
    Breadcrumbs::register('member', function ($breadcrumbs, $member) {
        $breadcrumbs->parent('members');
        $tmp = $member->firstname . ' ' . $member->lastname;
        $breadcrumbs->push($tmp, route('members.edit', $member->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance
try {
    Breadcrumbs::register('finance', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push('Finanzen', url('#!'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Categories
try {
    Breadcrumbs::register('categories', function ($breadcrumbs) {
        $breadcrumbs->parent('finance');
        $breadcrumbs->push('Kategorie', action('FinanceCategoryController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Categories > [Category]
try {
    Breadcrumbs::register('category', function ($breadcrumbs, $category) {
        $breadcrumbs->parent('categories');
        $breadcrumbs->push($category->name, route('finance.categories.edit', $category->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Bankaccounts
try {
    Breadcrumbs::register('accounts', function ($breadcrumbs) {
        $breadcrumbs->parent('finance');
        $breadcrumbs->push('Konten', action('FinanceAccountController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Bankaccounts > [Bankaccount]
try {
    Breadcrumbs::register('account', function ($breadcrumbs, $account) {
        $breadcrumbs->parent('accounts');
        $breadcrumbs->push($account->name, route('finance.accounts.edit', $account->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Tags
try {
    Breadcrumbs::register('tags', function ($breadcrumbs) {
        $breadcrumbs->parent('finance');
        $breadcrumbs->push('Tags', action('FinanceTagController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Tags > [Tag]
try {
    Breadcrumbs::register('tag', function ($breadcrumbs, $tag) {
        $breadcrumbs->parent('tags');
        $breadcrumbs->push($tag->name, route('finance.tags.edit', $tag->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

//try {
//    Breadcrumbs::register('category', function ($breadcrumbs, $category) {
//        if ($category->parent) {
//            $breadcrumbs->parent('category', $category->parent);
//        } else {
//            $breadcrumbs->parent('category');
//        }
//
//        $breadcrumbs->push($category->name, route('category', $category->slug));
//    });
//} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
//}