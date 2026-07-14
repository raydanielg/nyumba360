<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'Nyumba360'))</title>

    <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito:400,500,600,700,800,900&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        :root {
            --primary: #5A0917;
            --primary-hover: #7C1528;
            --primary-light: #FBEDEF;
            --accent: #F6891F;
            --accent-hover: #D66F0E;
            --accent-text: #7A3D05;
            --bg-page: #F7F4F1;
            --bg-card: #FFFFFF;
            --text-main: #1C1B1B;
            --text-muted: #6B6560;
            --border: #E6E0DA;
            --success: #1E7A46;
            --warning: #B98207;
            --danger: #C22F2F;
            --info: #1D6FA5;
        }
        @keyframes simpleFadeIn { from { opacity:0; transform:translateY(12px); } to { opacity:1; transform:translateY(0); } }
        @keyframes fadeInUp { from { opacity:0; transform:translateY(30px); } to { opacity:1; transform:translateY(0); } }
        @keyframes slowZoom {
            from { transform: scale(1); }
            to { transform: scale(1.1); }
        }
        .page-transition { animation: simpleFadeIn 0.35s ease-out both; }
        .fade-up { animation: fadeInUp 0.6s ease-out both; }
        .bg-hero {
            background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1920&q=80');
            background-size: cover;
            background-position: center;
            animation: slowZoom 25s ease-in-out infinite alternate;
        }
        .scrollbar-hide::-webkit-scrollbar { display: none; }
        .scrollbar-hide { -ms-overflow-style: none; scrollbar-width: none; }
        .card-hover { transition: all 0.3s cubic-bezier(0.16,1,0.3,1); }
        .card-hover:hover { transform: translateY(-6px); }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50: '#FBEDEF', 100: '#F5D5DA', 200: '#E8AAB5', 300: '#C55B6E',
                            400: '#8E2035', 500: '#7C1528', 600: '#5A0917', 700: '#4A0712',
                            800: '#3A050E', 900: '#2A040A', 950: '#1A0306'
                        },
                        gold: {
                            50: '#FEF5EB', 100: '#FDE6CC', 200: '#FBC499', 300: '#F9A54E',
                            400: '#F6891F', 500: '#D66F0E', 600: '#B05A0A', 700: '#8A4708',
                            800: '#7A3D05', 900: '#5C2E04', 950: '#3D1E02'
                        },
                        cream: '#F7F4F1'
                    }
                }
            }
        }
    </script>
</head>
<body class="font-['Nunito',sans-serif] antialiased text-slate-800 bg-cream min-h-screen">

    @yield('content')

    @yield('scripts')
</body>
</html>
