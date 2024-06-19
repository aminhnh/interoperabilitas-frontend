<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<style>
    #sidebar ul {
        list-style-type: none;
        padding: 0;
    }
    #sidebar ul li a {
        display: block;
        padding: 10px;
        text-decoration: none;
        color: black;
    }
    #sidebar ul li a:hover {
        background-color: #8B0000;
    }
    #sidebar.minimized {
        width: 0; /* Lebar menjadi 0 ketika diminimalkan */
        overflow: hidden;

    }
    #content {
        transition: margin-left 0.5s; /* Animasi perubahan margin */    
    }
    .overlay {
        display: none;
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: rgba(0, 0, 0, 0.5);
        z-index: 1000;
        justify-content: center;
        align-items: center;
        text-align: center;
    }
    .overlay-content {
        background-color: white;
        padding: 20px;
        border-radius: 5px;
    }
</style>
<body>
<!-- Navbar -->
<nav class="navbar navbar-light fixed-top d-flex justify-content-between bg-red" style="background-color: #8B0000;">
    <button class="btn" id="sidebarToggle">
        <img width="20rem" src="{{ asset('assets/Menu.svg') }}">
    </button>
    <div class="dropdown">
        <svg width="30" height="30" fill="none" xmlns="http://www.w3.org/2000/svg">
            <circle cx="15" cy="15" r="15" fill="#D9D9D9"/>
        </svg>
        <button class="btn dropdown-toggle text-white" type="button" id="userDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            User
        </button>
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
            <a class="dropdown-item" href="#">Profil</a>
            <a class="dropdown-item" href="#" id="logoutLink">Logout</a>
        </div>
    </div>
</nav>

<div class="list-group"  id="sidebar" style="width: 200px; height: 100vh; background-color: #8B0000; position: fixed; padding-top: 5rem;">
    <ul>
        <li><a class="text-white" href="/dashboard">Dashboard</a></li>
        <li><a class="text-white" href="/kantongdarah">Kantong Darah</a></li>
        <li><a class="text-white" href="/lembaga">Lembaga</a></li>
        <li><a class="text-white" href="/wilayah">Wilayah</a></li>
    </ul>
</div>

<div id="content" style="margin-left: 200px;">
    <!-- Konten utama aplikasi Anda di sini -->
    @yield('content')
</div>

<!-- Logout Confirmation Overlay -->
<div class="overlay" id="logoutOverlay">
    <div class="overlay-content">
        <p>Apakah Anda yakin ingin logout?</p>
        <button class="btn btn-danger" id="confirmLogout">Ya</button>
        <button class="btn btn-secondary" id="cancelLogout">Batal</button>
    </div>
</div>

<!-- Bagian JavaScript untuk logout -->
<script>
    @yield('script')
    document.addEventListener('DOMContentLoaded', function () {
        const logoutLink = document.getElementById('logoutLink');
        const logoutOverlay = document.getElementById('logoutOverlay');
        const confirmLogout = document.getElementById('confirmLogout');
        const cancelLogout = document.getElementById('cancelLogout');

        logoutLink.addEventListener('click', function(event) {
            event.preventDefault();
            logoutOverlay.style.display = 'flex';
        });

        confirmLogout.addEventListener('click', function() {
            logout();
        });

        cancelLogout.addEventListener('click', function() {
            logoutOverlay.style.display = 'none';
        });

        function logout() {
            const token = localStorage.getItem('authToken'); // Retrieve the stored token
            if (!token) {
                alert('Logout failed: No token found');
                return;
            }

            fetch('http://127.0.0.1:8000/api/logout', {
                method: 'POST',
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Authorization': `Bearer ${token}` // Include the token in the header
                }
            })
            .then(response => response.json())
            .then(data => {
                if (data.status === '200 OK') {
                    alert('Logout successful');
                    localStorage.removeItem('authToken'); // Remove the token
                    window.location.href = '/';
                } else {
                    alert('Logout failed: ' + data.message);
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });

</script>



</body>
</html>
