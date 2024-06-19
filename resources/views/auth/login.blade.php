<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div class="bg-welcome-login pt-5">
        <div class="container pt-5">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center text-white">
                    <h1>SELAMAT DATANG KEMBALI</h1>
                    <p>Isi formulir di bawah masuk ke sistem.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-0">
                    <div class="card-body">
                        <form id="loginForm" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="name">Nama Pengguna</label>
                                <input placeholder="Nama Pengguna" id="name" type="text" class="form-control" name="name" required autofocus>
                            </div>
                            <div class="form-group">
                                <label for="email">E-Mail</label>
                                <input placeholder="E-Mail" id="email" type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input placeholder="Password" id="password" type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-crimson btn-block">Masuk</button>
                            </div>
                            <div class="form-group mt-5">
                                <button type="button" onclick="window.location.href='/register';" class="btn btn-outline-blood-orange btn-block">Belum punya akun? Daftar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const loginForm = document.getElementById('loginForm');
        loginForm.addEventListener('submit', function(event) {
            event.preventDefault();
            const formData = new FormData(loginForm);
            fetch('http://127.0.0.1:8000/api/auth', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === '200 OK') {
                    alert('Login successful');
                    localStorage.setItem('authToken', data.token); // Store the token
                    window.location.href = '/dashboard';
                } else {
                    alert('Login failed: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        });
    });
    </script>
</body>
</html>
