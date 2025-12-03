<x-layouts.admin title="Manage Trainers">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Manage Trainers'" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    @livewire('admin.trainer-index')

</x-layouts.admin>
