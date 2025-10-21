<div class="relative ">
    @if($showPopup)
    <div id="seminar-status-popup"
        class="absolute z-50 w-40 bg-white dark:bg-gray-800 rounded-md shadow-lg py-2 px-3 
               border border-gray-200 dark:border-gray-700
               transform translate-x-2 md:-translate-x-6 
               top-2 left-0 md:left-auto md:right-0
               "
               >

        <div class="text-xs font-semibold mb-2 dark:text-gray-300">
            Update Status
        </div>

        <div class="text-xs mb-2 dark:text-gray-400">
            Current: <span class="font-bold">{{ $seminar->status }}</span>
        </div>

        <select wire:model="newStatus"
            class="block w-full mb-2 px-2 py-1 text-xs border border-gray-300 rounded-md shadow-sm 
                   focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 
                   dark:bg-gray-700 dark:border-gray-600 dark:text-white">
            <option value="upcoming">Upcoming</option>
            <option value="active">Active</option>
            <option value="completed">Completed</option>
            <option value="cancelled">Cancelled</option>
        </select>

        <div class="flex space-x-1">
            <button wire:click="$set('showPopup', false)"
                class="flex-1 px-2 py-1 text-xs font-medium text-gray-700 bg-gray-200 border border-gray-300 rounded-md shadow-sm 
                       hover:bg-gray-300 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-gray-500 
                       dark:bg-gray-600 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700">
                Cancel
            </button>

            <button wire:click="updateStatus"
                class="flex-1 px-2 py-1 text-xs font-medium text-white bg-indigo-600 border border-transparent rounded-md shadow-sm 
                       hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                Update
            </button>
        </div>
    </div>
    @endif
</div>
