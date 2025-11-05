<div class="relative ">
    @if($showModal)
    <div id="seminar-status-popup" class="absolute z-50 w-40 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 px-3 
               border border-gray-200 dark:border-gray-700
               transform translate-x-2 md:-translate-x-6 
               top-2 left-0 md:left-auto md:right-0
               ">

        <div class="text-xs font-semibold mb-2 dark:text-gray-300">
            Update Status
        </div>


        <div class="bg-white dark:bg-gray-800 p-6 rounded-lg w-80">
            <h2 class="text-lg font-semibold mb-4 text-gray-900 dark:text-white">Update Status</h2>
            <div class="block w-full mb-2 px-2 py-1 text-xs border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                <button wire:click="updateStatus('upcoming')"
                    class="w-full py-2 bg-blue-500 text-white rounded hover:bg-blue-600">Upcoming</button>
                <button wire:click="updateStatus('active')"
                    class="w-full py-2 bg-green-500 text-white rounded hover:bg-green-600">Active</button>
                <button wire:click="updateStatus('completed')"
                    class="w-full py-2 bg-gray-500 text-white rounded hover:bg-gray-600">Completed</button>
                <button wire:click="updateStatus('cancelled')"
                    class="w-full py-2 bg-red-500 text-white rounded hover:bg-red-600">Cancelled</button>
            </div>
        </div>

        <div class="flex space-x-1">
            <button wire:click="$set('showPopup', false)" class="flex-1 px-2 py-1 text-xs font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-md shadow-sm 
                       hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 
                       dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                Cancel
            </button>
        </div>
    </div>
    @endif
</div>