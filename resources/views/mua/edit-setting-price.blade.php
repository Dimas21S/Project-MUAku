<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit MUA Service</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
      body {
        background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
        background-attachment: fixed;
        padding-bottom: 50px;
      }
      .container-custom {
        width: 700px;
        background: #eeeeee;
        border-radius: 15px;
        padding: 30px;
        margin-top: 50px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.1);
      }
      .btn-back {
        background: #dbc7b4;
        color: black;
      }
      .btn-save {
        background: rgba(72, 74, 204, 1);
        color: white;
      }
    </style>
  </head>
  <body>
    <div class="container d-flex justify-content-center">
      <div class="container-custom border border-dark">
        <h3 class="mb-4 text-center">Edit MUA Service</h3>

        <!-- Form Edit -->
        <form action="{{ route('mua.update', $mua->id) }}" method="POST">
          @csrf
          @method('PUT')

          <!-- Category -->
          <div class="mb-3">
            <label for="category" class="form-label">Type / Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $mua->category) }}" required>
          </div>

          <!-- Price -->
          <div class="mb-3">
            <label for="price" class="form-label">Price (Rp)</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ old('price', $mua->price) }}" required>
          </div>

          <!-- Include List -->
          <div class="mb-3">
            <label for="include" class="form-label">Include Services</label>
            <textarea class="form-control" id="include" name="include" rows="4" placeholder="Pisahkan setiap item dengan koma, contoh: Makeup Application, Hair Styling, Wardrobe Styling">{{ old('include', 'Makeup Application, Hair Styling, Wardrobe Styling') }}</textarea>
          </div>

          <!-- Tombol -->
          <div class="d-flex justify-content-between mt-4">
            <a href="{{ route('mua.index') }}" class="btn btn-back">Back</a>
            <button type="submit" class="btn btn-save">Save Changes</button>
          </div>
        </form>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
