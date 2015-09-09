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
    $breadcrumbs->push('List', route('admin.denominations.index'));
});

// Admin Denominations > Create New Denomination
Breadcrumbs::register('admin.denominations.create', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.denominations.index');
    $breadcrumbs->push('Create New Denomination', route('admin.denominations.create'));
});

// Admin Denominations > Update Denomination
Breadcrumbs::register('admin.denominations.edit', function ($breadcrumbs) {
    $breadcrumbs->parent('admin.denominations.index');
    $breadcrumbs->push('Edit Denomination', route('admin.denominations.edit'));
});