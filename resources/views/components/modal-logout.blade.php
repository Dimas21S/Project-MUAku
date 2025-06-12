<div class="modal fade" id="customLogoutModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content text-center p-4 custom-modal">
      <h4 class="fw-bold mb-3">Logout</h4>
      <div class="mb-3">
        <div class="icon-container mx-auto">
          <span class="exclamation-icon">!</span>
        </div>
      </div>
      <p class="mb-4">Are you sure you want to logout?</p>
      <div class="d-flex justify-content-center gap-3">
        <!-- Form Logout -->
        <form method="POST" action="{{ route('logout') }}">
          @csrf
          <button type="submit" class="btn btn-success px-4">Yes</button>
        </form>
        <button class="btn btn-danger px-4" data-bs-dismiss="modal">No</button>
      </div>
    </div>
  </div>
</div>