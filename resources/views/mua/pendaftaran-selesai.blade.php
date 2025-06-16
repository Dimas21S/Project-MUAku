<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>~ Pendaftaran Selesai ~</title>
    <style>
      body {
        background-image: url('{{ asset('image/background-landing-page.jpg') }}');
        background-attachment: fixed;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        min-height: 100vh;
      }

      .new-coming {
        font-family: 'Red Hat Display', sans-serif;
        font-weight: 400;
        font-style: italic;
        font-size: 38px;
        margin-bottom: 10px;
        margin-top: 50px;
      }

            .collection-heading {
        font-family: 'DM Serif Display', serif;
        font-weight: 400;
        font-size: 77px;
        line-height: 1.2;
        margin-bottom: 40px;
      }

            .success-modal .modal-content {
        border: 3px solid #000000;
        border-radius: 16px;
        box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
      }
      
      .success-icon {
        width: 111px;
        height: 111px;
        margin: 0 auto 20px;
        position: relative;
      }
      
      .icon-background {
        width: 100%;
        height: 100%;
        background: #79B33E;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
      }
      
      .icon-background::after {
        content: "✓";
        color: white;
        font-size: 50px;
        font-weight: bold;
      }
      
      .success-title {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 20px;
        text-align: center;
        color: #000000;
        margin-bottom: 10px;
      }
      
      .success-message {
        font-family: 'Poppins', sans-serif;
        font-weight: 400;
        font-size: 16px;
        text-align: center;
        color: #000000;
        margin-bottom: 20px;
      }
      
      .modal-footer {
        border-top: none;
        justify-content: center;
      }
      </style>
  </head>
  <body>
    @if (session('success'))
      <x-modal-success :message="session('success')" />
    @endif

        <!-- Hero Section -->
    <section class="hero-bg" aria-label="MUAku Collection">
      <div class="overlay-content">
        <h1 class="new-coming">Tunggu Yaa</h1>
        <p class="collection-heading">Selama 24 jam, Hehe</p>
      </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    @if(session('success'))
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        var successModal = new bootstrap.Modal(document.getElementById('successModal'));
        successModal.show();
      });
    </script>
    @endif
  </body>
</html>