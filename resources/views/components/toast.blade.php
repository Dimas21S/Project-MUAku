<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="errorToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-primary text-white">
            <strong class="me-auto">Gagal Memuat Halaman</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
            <div class="mt-2 pt-2 border-top">
                <a href="{{ route('payment') }}" class="btn btn-primary btn-sm">OK</a>
            </div>
        </div>
    </div>
</div>