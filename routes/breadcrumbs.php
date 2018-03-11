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

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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

// Home > Members > New Member
try {
    Breadcrumbs::register('new member', function ($breadcrumbs) {
        $breadcrumbs->parent('members');
        $breadcrumbs->push('Neues Mitglied', action('MemberController@create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Home > Finance
try {
    Breadcrumbs::register('finance', function ($breadcrumbs) {
        $breadcrumbs->parent('home');
        $breadcrumbs->push('Finanzen', url('#!'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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
        $breadcrumbs->push($category->name, route('finance.category.edit', $category->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Categories > New Category
try {
    Breadcrumbs::register('new category', function ($breadcrumbs) {
        $breadcrumbs->parent('categories');
        $breadcrumbs->push('Neue Kategorie', action('FinanceCategoryController@create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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

// Home > Finance > Bankaccounts > New Bankaccount
try {
    Breadcrumbs::register('new account', function ($breadcrumbs) {
        $breadcrumbs->parent('accounts');
        $breadcrumbs->push('Neues Konto', action('FinanceAccountController@create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

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
        $breadcrumbs->push($tag->name, route('finance.tag.edit', $tag->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Tags > New Tag
try {
    Breadcrumbs::register('new tag', function ($breadcrumbs) {
        $breadcrumbs->parent('tags');
        $breadcrumbs->push('Neuer Tag', action('FinanceTagController@create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// ++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++++

// Home > Finance > Transactions
try {
    Breadcrumbs::register('transactions', function ($breadcrumbs) {
        $breadcrumbs->parent('finance');
        $breadcrumbs->push('Transaktionen', action('FinanceTransactionController@index'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Transactions > [Transaction]
try {
    Breadcrumbs::register('transaction', function ($breadcrumbs, $transaction) {
        $breadcrumbs->parent('transactions');
        $breadcrumbs->push($transaction->receiptnumber, route('finance.transactions.edit', $transaction->id));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}

// Home > Finance > Transactions > New Transaction
try {
    Breadcrumbs::register('new transaction', function ($breadcrumbs) {
        $breadcrumbs->parent('transactions');
        $breadcrumbs->push('Neue Transaktion', action('FinanceTransactionController@create'));
    });
} catch (\DaveJamesMiller\Breadcrumbs\Facades\DuplicateBreadcrumbException $e) {
}