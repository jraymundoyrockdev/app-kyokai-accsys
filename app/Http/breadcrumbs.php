<?php

// Services
Breadcrumbs::register('income-services.index', function ($breadcrumbs) {
    $breadcrumbs->push('Income Services', route('income-services.index'));
});

// Income Services > Create
Breadcrumbs::register('income-services.create', function ($breadcrumbs) {
    $breadcrumbs->parent('income-services.index');
    $breadcrumbs->push('Create', route('income-services.create'));
});
// Income Services > Edit
Breadcrumbs::register('income-services.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('income-services.index');
    $breadcrumbs->push('Edit', route('income-services.edit'));
});

Breadcrumbs::register('income-services.month-list', function ($breadcrumbs) {
    $breadcrumbs->parent('income-services.index');
    $breadcrumbs->push('List', route('income-services.month-list'));
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

// Admin Services
Breadcrumbs::register('admin.services.index', function ($breadcrumbs) {
    $breadcrumbs->push('Services', route('admin.services.index'));
});

// Admin Services > Create New Service
Breadcrumbs::register('admin.services.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.services.index');
    $breadcrumbs->push('Create', route('admin.services.create'));
});

// Admin Services > Update Service
Breadcrumbs::register('admin.services.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.services.index');
    $breadcrumbs->push('Update', route('admin.services.edit'));
});

// Admin Members
Breadcrumbs::register('admin.members.index', function ($breadcrumbs) {
    $breadcrumbs->push('Members', route('admin.members.index'));
});

// Admin Members > Create New Member
Breadcrumbs::register('admin.members.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.members.index');
    $breadcrumbs->push('Create', route('admin.members.create'));
});

// Admin Member > Update Member
Breadcrumbs::register('admin.members.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.members.index');
    $breadcrumbs->push('Update', route('admin.members.edit'));
});

// Admin Funds
Breadcrumbs::register('admin.funds.index', function ($breadcrumbs) {
    $breadcrumbs->push('Funds', route('admin.funds.index'));
});

// Admin Funds > Create New Fund
Breadcrumbs::register('admin.funds.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.funds.index');
    $breadcrumbs->push('Create', route('admin.funds.create'));
});

// Admin Funds > Edit Fund
Breadcrumbs::register('admin.funds.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.funds.index');
    $breadcrumbs->push('Edit', route('admin.funds.edit'));
});

// Admin Funds > Items
Breadcrumbs::register('admin-fund-items', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin.funds.index');
    $breadcrumbs->push('Items', route('admin-fund-items', $id));
});

// Admin Funds > Create New Fund Item
Breadcrumbs::register('admin-fund-item-create', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin-fund-items', $id);
    $breadcrumbs->push('Create', route('admin-fund-item-create'));
});

// Admin Funds > Edit New Fund Item
Breadcrumbs::register('admin-fund-item', function ($breadcrumbs, $id) {
    $breadcrumbs->parent('admin-fund-items', $id);
    $breadcrumbs->push('Edit', route('admin-fund-item'));
});

// Admin Users
Breadcrumbs::register('admin.users.index', function ($breadcrumbs) {
    $breadcrumbs->push('Users Account', route('admin.users.index'));
});

// Admin Roles
Breadcrumbs::register('admin.roles.index', function ($breadcrumbs) {
    $breadcrumbs->push('User Roles', route('admin.roles.index'));
});

