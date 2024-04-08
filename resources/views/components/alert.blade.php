@php
    $class = 'text-gray-800 bg-gray-50';
    switch (Session::get('message')['type']) {
        case 'info':
            $class = 'text-blue-800 bg-blue-50';
            break;
        case 'success':
            $class = 'text-green-800 bg-green-50';
            break;
        case 'error':
            $class = 'text-red-800 bg-red-50';
            break;
        case 'warning':
            $class = 'text-yellow-800 bg-yellow-50';
            break;
        default:
            $class = 'text-gray-800 bg-gray-50';
            break;
    }
@endphp
<div class="p-4 mb-4 text-sm {{ $class }} rounded-lg dark:bg-gray-800 dark:{{ $class }}" role="alert">
    {{ Session::get('message')['message'] }}
</div>
