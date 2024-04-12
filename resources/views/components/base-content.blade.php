<div
    class="block p-6 bg-white border border-gray-200 rounded-lg shadow  dark:bg-gray-800 dark:border-gray-700 {{ $customClass }}">
    <div class="@if (!$description) mb-0 @else mb-6 @endif">
        <h5
            class="@if (!$description) mb-0 @else mb-2 @endif text-2xl font-bold tracking-tight text-gray-900 dark:text-white">
            {{ $title }}
        </h5>
        <p class="font-normal text-gray-700 dark:text-gray-400">{{ $description }}.</p>
    </div>
    {{ $slot }}
</div>
