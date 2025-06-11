<div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
    <div id="errorToast" class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header bg-gray text-white">
            <strong class="me-auto">Gagal Memuat Halaman</strong>
            <button type="button" class="btn-close btn-close-white" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
            {{ $message }}
        </div>
    </div>
</div>

{{-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div id="errorToast" class="modal-dialog modal-dialog-centered">
        <div class="modal-content custom-modal">
            <div class="modal-body">
                <div class="modal-text">{{ $message }}</div>
            </div>
        </div>
    </div>
</div> --}}