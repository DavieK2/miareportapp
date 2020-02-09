<?php

Breadcrumbs::for('admin.dashboard', function ($trail) {
    $trail->push(__('strings.backend.dashboard.title'), route('admin.dashboard'));
});

require __DIR__.'/auth.php';
require __DIR__.'/log-viewer.php';


Breadcrumbs::for('class_registers.class_register.index', function ($trail) {
    $trail->push('Enrollments', route('class_registers.class_register.index'));
});

Breadcrumbs::for('class_registers.class_register.show', function ($trail, $id) {
    $trail->parent('class_registers.class_register.index');
    $trail->push(__('View'), route('class_registers.class_register.show', $id));
});

Breadcrumbs::for('class_registers.class_register.edit', function ($trail, $id) {
    $trail->parent('class_registers.class_register.index');
    $trail->push(__('View'), route('class_registers.class_register.edit', $id));
});

Breadcrumbs::for('class_registers.class_register.create', function ($trail) {
    $trail->parent('class_registers.class_register.index');
    $trail->push(__('Create'), route('class_registers.class_register.create'));
});


Breadcrumbs::for('frontend.user.account', function ($trail) {
    $trail->push('Account', route('frontend.user.account'));
});

Breadcrumbs::for('reports.report.index', function ($trail) {
    $trail->push('Reports', route('reports.report.index'));
});

Breadcrumbs::for('reports.report.create', function ($trail) {
    $trail->parent('reports.report.index');
    $trail->push(__('Create'), route('reports.report.create'));
});

Breadcrumbs::for('reports.report.edit', function ($trail, $id) {
    $trail->parent('reports.report.index');
    $trail->push(__('View'), route('reports.report.edit', $id));
});

Breadcrumbs::for('reports.report.show', function ($trail, $id) {
    $trail->parent('reports.report.index');
    $trail->push(__('View'), route('reports.report.show', $id));
});

Breadcrumbs::for('schools.school.index', function ($trail) {
    $trail->push('MIA Centre', route('schools.school.index'));
});

Breadcrumbs::for('schools.school.edit', function ($trail, $id) {
    $trail->parent('schools.school.index');
    $trail->push(__('View'), route('schools.school.edit', $id));
});

Breadcrumbs::for('schools.school.create', function ($trail) {
    $trail->parent('schools.school.index');
    $trail->push(__('Create'), route('schools.school.create'));
});

Breadcrumbs::for('uploads.index', function ($trail) {
    $trail->push('Uploads', route('uploads.index'));
});

Breadcrumbs::for('uploads.create', function ($trail) {
    $trail->parent('uploads.index');
    $trail->push(__('Create'), route('uploads.create'));
});
