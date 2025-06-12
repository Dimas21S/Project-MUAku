@props(['message'])

<div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1055;">
  <div class="toast show" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body d-flex align-items-center" style="
        width: 380px;
        height: 80px;
        background: #FFFFFF;
        padding-left: 36px;
        font-family: 'Poppins', sans-serif;
        font-weight: 500;
        font-size: 25px;
        color: #963E3E;
    ">
      {{ $message }}
    </div>
  </div>
</div>