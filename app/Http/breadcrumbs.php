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