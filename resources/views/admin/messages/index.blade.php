<x-layouts.admin title="Messages">
    <!-- Breadcrumb -->
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Messages'" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    @livewire('admin.message-sender')
</x-layouts.admin>
