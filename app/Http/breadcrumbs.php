<?php 

// Home
Breadcrumbs::register('service.index', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('service.index'));
});

// Home > About
Breadcrumbs::register('service.create', function($breadcrumbs)
{
    $breadcrumbs->parent('service.index');
    $breadcrumbs->push('Create Income', route('service.create'));
});
