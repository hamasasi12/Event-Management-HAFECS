<x-layouts.admin title="Manage Seminar Registration">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Manage Seminar Registration'" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    @livewire('register')

</x-layouts.admin>