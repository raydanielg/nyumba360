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
    <meta http-equiv="Cache-Control" content="no-store, no-cache, must-revalidate, max-age=0">
    <meta http-equiv="Pragma" content="no-cache">
    <meta http-equiv="Expires" content="0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="referrer" content="strict-origin-when-cross-origin">

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
        @keyframes scaleIn { from { transform: scale(0.5); opacity: 0; } to { transform: scale(1); opacity: 1; } }
        @keyframes checkDraw { from { stroke-dasharray: 30; stroke-dashoffset: 30; } to { stroke-dasharray: 30; stroke-dashoffset: 0; } }
        @keyframes toastIn { from { opacity:0; transform:translateX(100%); } to { opacity:1; transform:translateX(0); } }
        @keyframes toastOut { from { opacity:1; transform:translateX(0); } to { opacity:0; transform:translateX(100%); } }
        @keyframes floatDot {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes slowZoom {
            from { transform: scale(1); }
            to { transform: scale(1.08); }
        }
        .toast-in { animation: toastIn 0.4s cubic-bezier(0.16,1,0.3,1) both; }
        .toast-out { animation: toastOut 0.3s ease-in both; }
        .page-transition { animation: simpleFadeIn 0.35s ease-out both; }
        .ajax-loader { position:fixed; top:0; left:0; right:0; height:3px; background: linear-gradient(90deg, #5A0917, #F6891F, #5A0917); background-size: 200% 100%; animation: ajaxProgress 1s linear infinite; z-index:9999; display:none; }
        @keyframes ajaxProgress { 0% { background-position: 100% 0; } 100% { background-position: -100% 0; } }
        .bg-house {
            background-image: url('https://images.unsplash.com/photo-1564013799919-ab600027ffc6?w=1920&q=80');
            background-size: cover;
            background-position: center;
            animation: slowZoom 20s ease-in-out infinite alternate;
        }
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
<body class="font-['Nunito',sans-serif] antialiased text-slate-800 min-h-screen">

    {{-- Auth Background --}}
    <div class="fixed inset-0 z-0 overflow-hidden">
        {{-- House background image --}}
        <div class="absolute inset-0 bg-house"></div>
        {{-- Maroon overlay gradient --}}
        <div class="absolute inset-0 bg-gradient-to-br from-brand-950/95 via-brand-900/90 to-brand-800/85"></div>
        {{-- Subtle dot pattern --}}
        <div class="absolute inset-0 opacity-10" style="background-image: radial-gradient(rgba(255,255,255,0.15) 1px, transparent 1px); background-size: 24px 24px;"></div>
        {{-- Floating decorative circles --}}
        <div class="absolute top-10 left-10 w-72 h-72 bg-brand-500/15 rounded-full blur-3xl" style="animation: floatDot 8s ease-in-out infinite;"></div>
        <div class="absolute bottom-10 right-10 w-96 h-96 bg-gold-400/8 rounded-full blur-3xl" style="animation: floatDot 10s ease-in-out infinite;"></div>
        <div class="absolute top-1/3 right-1/4 w-48 h-48 bg-brand-400/8 rounded-full blur-2xl" style="animation: floatDot 12s ease-in-out infinite;"></div>
    </div>

    {{-- AJAX Progress Bar --}}
    <div id="ajaxLoader" class="ajax-loader"></div>

    {{-- Toast Container (top right) --}}
    <div id="toastContainer" class="fixed top-5 right-5 z-[60] flex flex-col gap-3 w-full max-w-sm pointer-events-none"></div>

    {{-- Logo at top --}}
    <div class="fixed top-6 left-6 z-20">
        <a href="{{ url('/') }}" class="flex items-center gap-3 group">
            <img src="{{ asset('logowhite.png') }}" alt="Nyumba360" class="w-12 h-12 object-contain drop-shadow-lg group-hover:scale-105 transition-transform">
        </a>
    </div>

    <main id="authMain" class="relative z-10 min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    {{-- Toast System --}}
    <script>
    (function() {
        const container = document.getElementById('toastContainer');

        function showToast(type, title, message) {
            const toast = document.createElement('div');
            toast.className = 'toast-in pointer-events-auto flex items-start gap-3 p-4 rounded-xl shadow-lg border backdrop-blur-sm';

            let iconSvg, bgClass, borderClass;
            if (type === 'success') {
                iconSvg = '<svg class="w-5 h-5 flex-shrink-0 mt-0.5" style="color:#1E7A46" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                bgClass = 'bg-green-50/95';
                borderClass = 'border-green-200';
            } else if (type === 'error') {
                iconSvg = '<svg class="w-5 h-5 text-red-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                bgClass = 'bg-red-50/95';
                borderClass = 'border-red-200';
            } else if (type === 'warning') {
                iconSvg = '<svg class="w-5 h-5 text-amber-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>';
                bgClass = 'bg-amber-50/95';
                borderClass = 'border-amber-200';
            } else {
                iconSvg = '<svg class="w-5 h-5 text-blue-500 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>';
                bgClass = 'bg-blue-50/95';
                borderClass = 'border-blue-200';
            }

            toast.classList.add(...bgClass.split(' '), ...borderClass.split(' '));
            toast.innerHTML = iconSvg +
                '<div class="flex-1 min-w-0">' +
                    '<p class="text-sm font-semibold text-gray-800">' + title + '</p>' +
                    (message ? '<p class="text-sm text-gray-500 mt-0.5">' + message + '</p>' : '') +
                '</div>' +
                '<button onclick="this.parentElement.classList.add(\'toast-out\'); setTimeout(()=>this.parentElement.remove(), 300)" class="flex-shrink-0 text-gray-400 hover:text-gray-600 transition-colors">' +
                    '<svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/></svg>' +
                '</button>';

            container.appendChild(toast);

            setTimeout(() => {
                toast.classList.add('toast-out');
                setTimeout(() => toast.remove(), 300);
            }, 5000);
        }

        window.showToast = showToast;

        @if(session('status'))
            showToast('success', 'Success', '{{ session('status') }}');
        @endif
        @if(session('error'))
            showToast('error', 'Error', '{{ session('error') }}');
        @endif
        @if(session('warning'))
            showToast('warning', 'Warning', '{{ session('warning') }}');
        @endif
        @if(session('info'))
            showToast('info', 'Info', '{{ session('info') }}');
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                showToast('error', 'Validation Error', '{{ $error }}');
            @endforeach
        @endif
    })();
    </script>

</body>
</html>
