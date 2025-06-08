@props(['artist', 'blur'])

<div class="col mb-4">
  <div class="card border border-dark px-1 py-1 shadow-sm h-100" style="background: transparent; position: relative;">
    <img src="{{ asset($artist->profile_photo ?? 'image/Profile-Foto.jpg') }}" class="card-img-top" alt="MUA 1" style="height: 200px; object-fit: cover;">
    <div class="card-body p-2" style="background:#F4F4F4; position: relative; z-index: 2;">
      <p class="card-text small fw-normal mb-1 text-truncate {{ $blur ? 'blur-effect' : '' }}">Kategori: {{ $artist->category }}</p>
      <p class="card-text small fw-normal mb-1 text-truncate {{ $blur ? 'blur-effect' : '' }}">Alamat:  {{ $artist->address->kota }}</p>
      <a href="/deskripsi-mua/{{ $artist->id }}" class="btn btn-outline-dark btn-sm w-100" style="position: relative; z-index: 3;">Lihat Profil</a>
    </div>
  </div>
</div>

<style>
    .blur-effect {
        filter: blur(3px);
    }
</style>