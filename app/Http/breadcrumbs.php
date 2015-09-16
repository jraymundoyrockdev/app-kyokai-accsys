<?php

// Home
Breadcrumbs::register('service.index', function ($breadcrumbs) {
    $breadcrumbs->push('Home', route('service.index'));
});

// Home > About
Breadcrumbs::register('service.create', function ($breadcrumbs) {
    $breadcrumbs->parent('service.index');
    $breadcrumbs->push('Service', route('service.create'));
});


/**
 * ADMIN
 */
// Admin Denominations
Breadcrumbs::register('admin.denominations.index', function ($breadcrumbs) {
    $breadcrumbs->push('Denominations', route('admin.denominations.index'));
});

// Admin Denominations > Create New Denomination
Breadcrumbs::register('admin.denominations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.denominations.index');
    $breadcrumbs->push('Create', route('admin.denominations.create'));
});

// Admin Denominations > Update Denomination
Breadcrumbs::register('admin.denominations.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.denominations.index');
    $breadcrumbs->push('Update', route('admin.denominations.edit'));
});


// Admin Ministries
Breadcrumbs::register('admin.ministry.index', function ($breadcrumbs) {
    $breadcrumbs->push('Ministries', route('admin.ministry.index'));
});

// Admin Ministries > Create New Ministry
Breadcrumbs::register('admin.ministry.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.ministry.index');
    $breadcrumbs->push('Create', route('admin.ministry.create'));
});

// Admin Ministries > Update Ministry
Breadcrumbs::register('admin.ministry.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.ministry.index');
    $breadcrumbs->push('Update', route('admin.ministry.edit'));
});


// Admin Roles
Breadcrumbs::register('admin.user-roles.index', function ($breadcrumbs) {
    $breadcrumbs->push('User Roles', route('admin.user-roles.index'));
});
