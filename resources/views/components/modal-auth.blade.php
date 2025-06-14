@props(['id', 'title', 'userRoute', 'muaRoute'])

<div class="modal fade" id="{{ $id }}" tabindex="-1" aria-labelledby="{{ $id }}Label" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header border-0">
        <h5 class="modal-title" id="{{ $id }}Label">{{ $title }}</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body text-center py-4">
        <a href="{{ $userRoute }}" class="btn btn-login bg-white me-3 text-decoration-none text-dark">User</a>
        <a href="{{ $muaRoute }}" class="btn btn-register bg-white text-decoration-none text-dark">MakeUp Artist</a>
      </div>
    </div>
  </div>
</div>