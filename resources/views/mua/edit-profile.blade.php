<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Edit ~ {{ $mua->name ?? 'Profile MUA' }}</title>

    <!-- Bootstrap CSS & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
      body {
        min-height: 100vh;
        background: #fff;
        font-family: 'Segoe UI', sans-serif;
      }

      label.file-upload-label {
        display: block;
        padding: 2rem;
        background-color: #f9f9f9;
        border: 2px dashed #ccc;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease;
      }

      label.file-upload-label:hover {
        background-color: #f1f1f1;
      }

      .file-upload-text {
        margin-top: 0.5rem;
        color: #777;
        font-size: 0.9rem;
      }

      .section-title {
        font-family: 'DM Serif Display', serif;
        font-weight: bold;
        text-align: center;
        margin-bottom: 1rem;
      }

      .form-control,
      .form-select {
        background-color: #EEEEEE;
      }

      @media (max-width: 768px) {
        .form-control,
        .form-select {
          width: 100% !important;
        }
      }

      .jadwal-item {
        margin-bottom: 10px;
        padding: 10px;
        border: 1px solid #ddd;
        border-radius: 5px;
      }
    </style>
  </head>
  <body>

    <div class="container py-4">
      <form action="{{ route('update-mua') }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <div class="row g-4">
          <!-- Foto Profil -->
          <div class="col-md-5 text-center">
            <label for="profile_photo" class="file-upload-label">
              <i class="bi bi-cloud-arrow-up fs-1"></i>
              <p class="file-upload-text">Klik untuk unggah foto profil baru</p>
              <input type="file" class="form-control d-none" id="profile_photo" name="profile_photo">
              <img id="previewProfile" class="img-fluid mt-3 rounded" style="max-height: 200px;" 
                  src="{{ $mua->profile_photo ? Storage::url($mua->profile_photo) : asset('image/Profile-Foto.jpg') }}" alt="Foto Profil">
            </label>
          </div>

          <!-- Form Profile -->
          <div class="col-md-7">
            <div class="mb-3">
              <label for="name" class="form-label">Nama MUA</label>
              <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mua->name) }}" required>
            </div>

            <div class="mb-3">
              <label for="category" class="form-label">Kategori</label>
              <select class="form-select" id="category" name="category" required>
                <option disabled selected value="">Pilih kategori</option>
                @foreach ($categories as $cat)
                  <option value="{{ $cat }}" {{ old('category', $mua->category) == $cat ? 'selected' : '' }}>{{ $cat }}</option>
                @endforeach
              </select>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">No. Telepon</label>
              <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $mua->phone) }}" required>
            </div>

            <div class="mb-3">
              <label for="link_map" class="form-label">Link Lokasi (Google Maps)</label>
              <input type="text" class="form-control" id="link_map" name="link_map" value="{{ old('link_map', $mua->address->link_map ?? '') }}" required>
            </div>

            <!-- BAGIAN JADWAL YANG DIKOREKSI -->
            <div class="mb-3">
              <label for="hari" class="form-label">Available hours</label>

              <div class="border rounded p-3 bg-light">
                <div id="jadwal-container">
                  @php
                    $jadwalData = $mua->jadwal ?? [];
                    // Jika tidak ada jadwal, buat satu form kosong
                    if(empty($jadwalData)) {
                      $jadwalData = [['hari' => '', 'jam_buka' => '', 'jam_tutup' => '']];
                    }
                  @endphp
                  
                  @foreach ($jadwalData as $index => $jadwal)
                    <div class="jadwal-item row align-items-center mb-2">
                      <div class="col-md-4">
                        <select name="jadwal[{{ $index }}][hari]" class="form-select" required>
                          <option value="">Pilih Hari</option>
                          @foreach (['Senin','Selasa','Rabu','Kamis','Jumat','Sabtu','Minggu'] as $hari)
                            <option value="{{ $hari }}" {{ ($jadwal['hari'] ?? '') == $hari ? 'selected' : '' }}>
                              {{ $hari }}
                            </option>
                          @endforeach
                        </select>
                      </div>
                      <div class="col-md-3">
                        <input type="time" name="jadwal[{{ $index }}][jam_buka]" class="form-control"
                              value="{{ $jadwal['jam_buka'] ?? '' }}" required>
                      </div>
                      <div class="col-md-3">
                        <input type="time" name="jadwal[{{ $index }}][jam_tutup]" class="form-control"
                              value="{{ $jadwal['jam_tutup'] ?? '' }}" required>
                      </div>
                      <div class="col-md-2 text-center">
                        @if($index > 0)
                          <button type="button" class="btn btn-danger btn-sm remove-jadwal"><i class="bi bi-trash"></i></button>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>

                <button type="button" id="add-jadwal" class="btn btn-sm btn-outline-primary mt-2">
                  <i class="bi bi-plus"></i> Tambah Hari
                </button>
              </div>
            </div> <!-- Penutup div untuk bagian jadwal -->

            <button type="submit" class="btn mt-3 px-4" style="background-color: #1E2772; color: white;">Save</button>
          </div>
        </div>

        <hr class="my-5" />

        <!-- Deskripsi -->
        <div class="border p-4 rounded">
          <h4 class="section-title">Deskripsi</h4>
          <div class="mb-3">
            <textarea
              id="description"
              name="description"
              class="form-control"
              rows="5"
            >{{ old('description', $mua->description) }}</textarea>
          </div>
        </div>

        <hr class="my-5" />
        
        <!-- Tombol Tambah Foto -->
        <div class="text-end mb-3">
          <label for="gallery" class="btn btn-primary">Add Photo</label>
          <input type="file" id="gallery" name="photos[]" class="d-none" multiple>
          <div id="previewGallery" class="d-flex flex-wrap gap-2 mt-3 justify-content-center"></div>
        </div>

      </form>

      <!-- Galeri Foto Existing -->
      <div class="d-flex flex-wrap gap-3">
        @foreach ($mua->photos ?? [] as $photo)
          <div class="position-relative" style="width: 200px;">
            <img src="{{ Storage::url($photo->image_path) }}" class="img-fluid rounded" style="object-fit: cover; height: 200px; width: 100%;">

            <!-- Tombol Trigger Modal -->
            <button type="button" class="btn btn-danger btn-sm rounded-circle shadow-sm position-absolute top-0 end-0 m-1"
                    data-bs-toggle="modal" data-bs-target="#deletePhotoModal{{ $photo->id }}">
              <i class="bi bi-trash-fill"></i>
            </button>
          </div>

          <!-- Modal Konfirmasi -->
          <div class="modal fade" id="deletePhotoModal{{ $photo->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $photo->id }}" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                  <h5 class="modal-title" id="modalLabel{{ $photo->id }}">Konfirmasi Hapus</h5>
                  <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  Yakin ingin menghapus foto ini?
                </div>
                <div class="modal-footer">
                  <form action="{{ route('delete-photo', $photo->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        @endforeach
      </div>

    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
      // Preview Foto Profil
      document.getElementById('profile_photo').addEventListener('change', function (e) {
        const [file] = e.target.files;
        if (file) {
          const reader = new FileReader();
          reader.onload = e => {
            document.getElementById('previewProfile').src = e.target.result;
          };
          reader.readAsDataURL(file);
        }
      });

      // Preview Galeri Karya
      document.getElementById('gallery').addEventListener('change', function (e) {
        const previewContainer = document.getElementById('previewGallery');
        previewContainer.innerHTML = '';
        Array.from(e.target.files).forEach(file => {
          const reader = new FileReader();
          reader.onload = e => {
            const img = document.createElement('img');
            img.src = e.target.result;
            img.className = 'img-thumbnail';
            img.style.maxHeight = '150px';
            img.style.objectFit = 'cover';
            previewContainer.appendChild(img);
          };
          reader.readAsDataURL(file);
        });
      });

      // FUNGSI JADWAL YANG DITAMBAHKAN
      let jadwalCounter = {{ count($jadwalData) }};

      // Tambah jadwal baru
      document.getElementById('add-jadwal').addEventListener('click', function() {
        const container = document.getElementById('jadwal-container');
        const newIndex = jadwalCounter++;
        
        const newJadwal = document.createElement('div');
        newJadwal.className = 'jadwal-item row align-items-center mb-2';
        newJadwal.innerHTML = `
          <div class="col-md-4">
            <select name="jadwal[${newIndex}][hari]" class="form-select" required>
              <option value="">Pilih Hari</option>
              <option value="Senin">Senin</option>
              <option value="Selasa">Selasa</option>
              <option value="Rabu">Rabu</option>
              <option value="Kamis">Kamis</option>
              <option value="Jumat">Jumat</option>
              <option value="Sabtu">Sabtu</option>
              <option value="Minggu">Minggu</option>
            </select>
          </div>
          <div class="col-md-3">
            <input type="time" name="jadwal[${newIndex}][jam_buka]" class="form-control" required>
          </div>
          <div class="col-md-3">
            <input type="time" name="jadwal[${newIndex}][jam_tutup]" class="form-control" required>
          </div>
          <div class="col-md-2 text-center">
            <button type="button" class="btn btn-danger btn-sm remove-jadwal"><i class="bi bi-trash"></i></button>
          </div>
        `;
        
        container.appendChild(newJadwal);
        
        // Tambah event listener untuk tombol hapus yang baru
        newJadwal.querySelector('.remove-jadwal').addEventListener('click', function() {
          newJadwal.remove();
        });
      });

      // Hapus jadwal
      document.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-jadwal') || e.target.closest('.remove-jadwal')) {
          const jadwalItem = e.target.closest('.jadwal-item');
          if (jadwalItem) {
            jadwalItem.remove();
          }
        }
      });
    </script>

  </body>
</html>