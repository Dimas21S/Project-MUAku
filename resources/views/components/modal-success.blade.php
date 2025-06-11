@props(['message'])

<div class="modal fade success-modal" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" data-bs-backdrop="static">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      <div class="modal-body text-center py-5">
        <div class="success-icon">
          <div class="icon-background"></div>
        </div>
        <h3 class="success-title">Success</h3>
        <p class="success-message">{{ $message }}</p>
        <div class="modal-footer">
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Continue</button>
      </div>
      </div>
    </div>
  </div>
</div>