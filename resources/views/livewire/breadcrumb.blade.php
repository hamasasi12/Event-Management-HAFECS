<div class="mb-6 flex flex-wrap items-center justify-between gap-3">
    <div class="flex items-center gap-3">
        @if($pageTitle)
        <h2 class="text-xl font-semibold text-gray-800 dark:text-white/90">{{ $pageTitle }}</h2>
        @endif
    </div>

    <nav>
        <ol class="flex items-center gap-1.5">
            <li>
                <a wire:navigate.hover class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="{{ url('/') }}">
                    Dashboard
                    <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            @foreach($breadcrumbs as $breadcrumb)
            @if(!$loop->last)
            <li>
                <a class="inline-flex items-center gap-1.5 text-sm text-gray-500 dark:text-gray-400" href="{{ $breadcrumb['url'] }}" wire:navigate>
                    {{ $breadcrumb['title'] }}
                    <svg class="stroke-current" width="17" height="16" viewBox="0 0 17 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.0765 12.667L10.2432 8.50033L6.0765 4.33366" stroke="" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </li>
            @endif
            @endforeach
            @if($pageTitle)
            <li class="text-sm text-gray-800 dark:text-white/90">{{ $pageTitle }}</li>
            @endif
        </ol>
    </nav>
</div>
