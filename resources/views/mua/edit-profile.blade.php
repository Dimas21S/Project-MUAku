<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <form action="{{ route('update-mua') }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PATCH')
      <div class="container mt-5">
        <h1>Edit Profil MUA</h1>
        <div class="mb-3">
          <label for="name" class="form-label">Nama MUA</label>
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $mua->name) }}" required>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $mua->email) }}" required>
        </div>
        <div class="mb-3">
          <label for="phone" class="form-label">Nomor Telepon</label>
          <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $mua->phone) }}" required>
        </div>
        <div class="mb-3">
          <label for="category" class="form-label">Kategori</label>
          <select class="form-select" id="category" name="category" required>
            <option value="" disabled selected>Pilih Kategori MUA Anda</option>
            <option value="Pesta dan Acara" {{ old('category', $mua->category) == 'Pesta dan Acara' ? 'selected' : '' }}>Pesta dan Acara</option>
            <option value="Pengantin" {{ old('category', $mua->category) == 'Pengantin' ? 'selected' : '' }}>Pengantin</option>
            <option value="Editorial" {{ old('category', $mua->category) == 'Editorial' ? 'selected' : '' }}>Editorial</option>
            <option value="Artistik" {{ old('category', $mua->category) == 'Artistik' ? 'selected' : '' }}>Artistik</option>
          </select>
        </div>
        <div class="mb-3">
          <label for="profile_picture" class="form-label">Foto Profil</label>
          <input type="file" class="form-control" id="profile_picture" name="profile_picture">
        </div>
        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>