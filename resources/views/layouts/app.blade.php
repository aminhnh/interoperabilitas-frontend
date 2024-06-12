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
    <link rel="stylesheet" href="/assets/css/app.css">
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
</style>
<body>
    <nav class="navbar navbar-light fixed-top d-flex space-between bg-red"  style="background-color: #8B0000;" >
    <button class="btn" id="sidebarToggle">
        <img width="60%" src="/assets/Menu.svg" alt="" srcset="">
    </button>
    <a class="navbar-brand" href="#">
        <img src="/docs/4.0/assets/brand/bootstrap-solid.svg" width="30" height="30" class="d-inline-block align-top" alt="">
        User
    </a>
    </nav>
    <div  id="sidebar" style="width: 200px; height: 100vh; background-color: #8B0000; position: fixed; padding-top: 5rem;">
        <ul>
            <li><a class="text-white" href="/dashboard">Dashboard</a></li>
            <li><a class="text-white" href="/settings">Settings</a></li>
            <li><a class="text-white" href="/profile">Profile</a></li>
            <li><a class="text-white" href="/logout">Logout</a></li>
        </ul>
    </div>
    <div id="content" style="margin-left: 200px;">
        <!-- Konten utama aplikasi Anda di sini -->
        @yield('content')
    </div>

</body>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const toggleButton = document.getElementById('sidebarToggle');

        toggleButton.addEventListener('click', function () {
            sidebar.classList.toggle('minimized');
            if (sidebar.classList.contains('minimized')) {
                content.style.transition = 'margin-left 1s'; 
                content.style.marginLeft = '0px'; 
                sidebar.style.width = '0px'
                sidebar.style.overflow = 'hidden'
            } else {
                content.style.marginLeft = '250px';
                content.style.transition = 'margin-left 1s'; 
                sidebar.style.width = '270px'
                sidebar.style.overflow = 'hidden' 
            }
        });
    });

    @yield("script")
</script>
</html>
