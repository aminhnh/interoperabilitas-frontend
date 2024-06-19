<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blood Collection</title>
    <!-- Import Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Baloo+Chettan&display=swap" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Roboto, sans-serif;
        }
        .container {
            width: 100%;
            height: 100vh;
            position: relative;
            background: white;
        }
        .background {
            width: 100%;
            height: 100%;
            position: absolute;
            background: #ffffff;
        }
        .image {
            width: 455px;
            height: 456px;
            position: absolute;
            right: 20px;
            top: 56px;
        }
        .title {
            position: absolute;
            left: 38px;
            top: 367px;
            color: #DC153C;
            font-size: 70px;
            font-family: 'Baloo Chettan', cursive;
            font-weight: 400;
            text-transform: uppercase;
        }
        .description {
            position: absolute;
            left: 38px;
            top: 661px;
            color: #000000;
            font-size: 20px;
            font-weight: 500;
            /* text-transform: uppercase; */
        }
        .button {
            width: 334px;
            height: 85px;
            position: absolute;
            background: #DC153C;
            box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 50px;
            font-family: 'Baloo Chettan', cursive;
            font-weight: 400;
            text-transform: uppercase;
            cursor: pointer;
        }
        .login-button {
            left: 38px;
            top: 829px;
        }
        .signin-button {
            left: 466px;
            top: 829px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="background"></div>
        <img class="image" src="assets/maskot_darah.png" alt="Placeholder Image" />
        <div class="title">BLOOD <br />COLLECTION</div>
        <div class="description">
            Website kami menyediakan platform terintegrasi untuk penyimpanan darah, <br />
            memudahkan proses donasi dan distribusi darah bagi mereka yang membutuhkan. <br />
            Kami menghubungkan pendonor dengan bank darah lokal secara efisien dan aman, <br />
            memastikan setiap tetes darah dapat menyelamatkan nyawa. Bergabunglah dengan kami <br />
            dan menjadi bagian dari komunitas yang peduli.
        </div>
        <a href="/login" class="button login-button">Masuk</a>
        <a href="/register" class="button signin-button">Daftar</a>
    </div>
</body>
</html>
