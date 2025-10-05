<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MUA Service Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <style>
      body {
        background: linear-gradient(#DFDBDC, #E6DBD9, #E4CFCE, #D3CEE5);
        background-attachment: fixed;
        padding-bottom: 50px;
      }
      .container-custom {
        position: relative;
        width: 700px;
        height: 370px;
        margin-bottom: 20px;
      }
      .edit-btn-container {
        position: absolute;
        bottom: 5px;
        right: 20px;
      }
      .add-btn-container {
        display: flex;
        justify-content: end;
        margin: 20px 0;
      }
      .container-wrapper {
        display: flex;
        flex-direction: column;
        align-items: center;
      }
    </style>
  </head>
  <body>
    <div class="container-wrapper">
      <!-- Container utama pertama -->
      <div class="container mt-5 border border-dark rounded p-4 container-custom" style="background: #eeeeee; background-attachment: fixed;">
        <div>
          <p>type: </p>
          <h5 class="">{{ $mua->category }} </h5>
        </div>
        <div>
          <p>price: </p>
          <h3>{{ $mua->packages ? 'Rp ' . number_format($mua->packages->price, 0, ',', '.') : 'Belum diatur' }}</h3>
        </div>
        <p>include: </p>
        <div class="border border-dark rounded p-3" style="background: #DBC7B4; width: 100%; height: 100px; overflow-y:auto; scrollbar-width: none;">
          <ul class="text-white">
            @if(is_array($mua->description) || is_object($mua->description))
                <ul>
                    @foreach ($mua->description as $desc)
                        <li>{{ $desc }}</li>
                    @endforeach
                </ul>
            @else
                <p>{{ $mua->description }}</p>
            @endif
          </ul>
        </div>
        <div class="edit-btn-container">
          <a href="{{ route('setting-price.form', $mua->id) }}" class="btn" style="background: #dbc7b4">Edit</a>
        </div>
      </div>

      <!-- Tombol Add -->
      <div class="d-flex justify-content-end">
        <button id="addButton" class="btn text-white" style="background: rgba(72, 74, 204, 1)">Add</button>
      </div>

      <!-- Container baru yang akan ditambahkan -->
      <div id="newContainers"></div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const addButton = document.getElementById('addButton');
        const newContainers = document.getElementById('newContainers');
        let containerCount = 0;
        
        addButton.addEventListener('click', function() {
          containerCount++;
          
          // Membuat elemen container baru
          const newContainer = document.createElement('div');
          newContainer.className = 'container border border-dark rounded p-4 container-custom';
          newContainer.style.background = '#eeeeee';
          newContainer.style.backgroundAttachment = 'fixed';
          
          // Konten untuk container baru
          newContainer.innerHTML = `
            <div>
              <p>type: </p>
              <h5>New Service ${containerCount}</h5>
            </div>
            <div>
              <p>price: </p>
              <h3>Not set</h3>
            </div>
            <p>include: </p>
            <div class="border border-dark rounded p-3" style="background: #DBC7B4; width: 100%; height: 100px; overflow-y:auto; scrollbar-width: none;">
              <ul class="text-white">
                <li>New Service Item 1</li>
                <li>New Service Item 2</li>
                <li>New Service Item 3</li>
              </ul>
            </div>
            <div class="edit-btn-container">
              <button class="btn" style="background: #dbc7b4">Edit</button>
            </div>
          `;
          
          // Menambahkan container baru ke dalam DOM
          newContainers.appendChild(newContainer);
          
          // Memindahkan tombol Add ke bawah container yang baru ditambahkan
          addButton.parentElement.parentElement.insertBefore(addButton.parentElement, newContainer.nextSibling);
        });
      });
    </script>
  </body>
</html>