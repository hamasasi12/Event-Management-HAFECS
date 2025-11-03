<x-layouts.admin title="Manage Seminars">
    <!-- Breadcrumb -->
    <livewire:breadcrumb :page-title="'Manage Seminar '" :breadcrumbs="[
        ['title' => 'Dashboard', 'url' => route('admin.dashboard')],
    ]" />

    @livewire('seminar')

    <!-- JavaScript to handle status update events -->
    <script>
    function toggleStatusPopup(seminarId, event) {
        Livewire.dispatch('toggleStatusPopup', [seminarId]);
    }

    document.addEventListener('livewire:init', () => {
        Livewire.on('statusUpdated', ({
            message,
            status,
            seminarId
        }) => {
            Swal.fire("Status Updated", message, "success");
            window.location.reload();
        });
    });
    </script>
</x-layouts.admin>