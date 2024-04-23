@if (Session::has('alert'))
    @php
        $alert = match (Session::get('alert')['type']) {
            'success' => [
                'bg' => 'bg-success',
                'icon' => 'bx bx-check-circle',
                'message' => Session::get('alert')['message'],
            ],
            'danger' => [
                'bg' => 'bg-danger',
                'icon' => 'bx bx-x',
                'message' => Session::get('alert')['message'],
            ],
            'warning' => [
                'bg' => 'bg-warning',
                'icon' => 'bx bx-info-circle',
                'message' => Session::get('alert')['message'],
            ],
            'primary' => [
                'bg' => 'bg-primary',
                'icon' => 'bx bx-bell',
                'message' => Session::get('alert')['message'],
            ],
            default => [
                'bg' => 'bg-default',
                'icon' => 'bx bx-bell',
                'message' => Session::get('alert')['message'],
            ],
        };
    @endphp
    <div class="bs-toast toast toast-placement-ex m-2 top-0 end-0 {{ $alert['bg'] }}" role="alert" aria-live="assertive"
        aria-atomic="true" data-delay="2000">
        <div class="toast-header">
            <i class="{{ $alert['icon'] }} me-2"></i>
            <div class="me-auto fw-semibold">
                Notifikasi
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ $alert['message'] }}
        </div>
    </div>
@endif
@push('scripts')
    @if (Session::has('alert'))
        <script>
            const toastPlacementExample = document.querySelector('.toast-placement-ex');
            toastPlacement = new bootstrap.Toast(toastPlacementExample);
            toastPlacement.show();
        </script>
    @endif
@endpush
