// Script untuk menampilkan toast error
        document.addEventListener('DOMContentLoaded', function () {
            var errorToast = document.getElementById('errorToast');
            if (errorToast) {
                var toast = new bootstrap.Toast(errorToast);
                toast.show();
            }
        });