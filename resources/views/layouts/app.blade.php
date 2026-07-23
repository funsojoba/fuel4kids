<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Fuel4Kids — Nourish the child. Strengthen the village.')</title>
    <meta name="description" content="@yield('meta_description', 'Fuel4Kids Organization is a Canadian registered nonprofit dedicated to reducing food insecurity and supporting children, youth, and families.')">
    <link rel="icon" type="image/png" href="{{ asset('images/favicon.png') }}">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,500;9..144,600;9..144,700&family=Nunito+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        brand: {
                            50:  '#f0f9f2',
                            100: '#dcf0e2',
                            200: '#bce0c8',
                            300: '#8fc9a5',
                            400: '#5dab7d',
                            500: '#3b8f5f',
                            600: '#2a734b',
                            700: '#225c3d',
                            800: '#1d4a33',
                            900: '#183d2b',
                        },
                        sun: {
                            50:  '#fff8eb',
                            100: '#ffedc7',
                            200: '#ffd98a',
                            300: '#ffc04d',
                            400: '#ffa424',
                            500: '#f9820b',
                            600: '#dd5f06',
                            700: '#b74009',
                        },
                        cream: '#fdf9f2',
                        ink: '#20342a',
                    },
                    fontFamily: {
                        display: ['Fraunces', 'serif'],
                        sans: ['"Nunito Sans"', 'system-ui', 'sans-serif'],
                    },
                }
            }
        }
    </script>
    <style>
        .reveal { opacity: 0; transform: translateY(24px); transition: opacity .7s ease, transform .7s ease; }
        .reveal.is-visible { opacity: 1; transform: none; }
        .hero-gradient { background: linear-gradient(135deg, #183d2b 0%, #225c3d 55%, #2a734b 100%); }
        .texture-dots {
            background-image: radial-gradient(rgba(255,255,255,.14) 1.5px, transparent 1.5px);
            background-size: 22px 22px;
        }
        .hero-gradient.texture-dots {
            background-image: radial-gradient(rgba(255,255,255,.14) 1.5px, transparent 1.5px), linear-gradient(135deg, #183d2b 0%, #225c3d 55%, #2a734b 100%);
            background-size: 22px 22px, auto;
        }
        .marquee { animation: marquee 30s linear infinite; }
        @keyframes marquee { from { transform: translateX(0); } to { transform: translateX(-50%); } }
        img.soft { border-radius: 1.5rem; box-shadow: 0 20px 40px -20px rgba(24,61,43,.35); }
    </style>
</head>
<body class="font-sans text-ink bg-cream antialiased">

    {{-- Top bar --}}
    <div class="bg-brand-900 text-brand-100 text-xs sm:text-sm">
        <div class="max-w-7xl mx-auto px-4 py-2 flex items-center justify-between gap-4">
            <p class="truncate">A Canadian registered nonprofit serving children &amp; families — GTHA and beyond</p>
            <a href="mailto:{{ config('fuel4kids.email') }}" class="hidden sm:block hover:text-white transition">{{ config('fuel4kids.email') }}</a>
        </div>
    </div>

    {{-- Navbar --}}
    <header class="sticky top-0 z-50 bg-cream/90 backdrop-blur border-b border-brand-100">
        <nav class="max-w-7xl mx-auto px-4 h-20 flex items-center justify-between">
            <a href="{{ route('home') }}" class="flex items-center gap-3">
                <img src="{{ asset('images/logo.webp') }}" alt="Fuel4Kids" class="h-12 w-auto" onerror="this.style.display='none'; document.getElementById('logo-text').classList.remove('hidden');">
                <span id="logo-text" class="hidden font-display text-2xl font-bold text-brand-800">Fuel<span class="text-sun-500">4</span>Kids</span>
            </a>

            <div class="hidden lg:flex items-center gap-8 font-semibold text-[15px]">
                @foreach ([
                    ['route' => 'home', 'label' => 'Home'],
                    ['route' => 'about', 'label' => 'About Us'],
                    ['route' => 'our-work', 'label' => 'Our Work'],
                    ['route' => 'leadership', 'label' => 'Our Team'],
                    ['route' => 'partnership', 'label' => 'Partnership'],
                    ['route' => 'volunteer', 'label' => 'Volunteer'],
                ] as $item)
                    <a href="{{ route($item['route']) }}"
                       class="relative py-1 transition hover:text-brand-600 {{ request()->routeIs($item['route']) ? 'text-brand-700 after:absolute after:left-0 after:right-0 after:-bottom-0.5 after:h-0.5 after:bg-sun-400 after:rounded-full' : 'text-ink/80' }}">
                        {{ $item['label'] }}
                    </a>
                @endforeach
                <a href="{{ route('donate') }}" class="ml-2 inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-brand-900 font-extrabold px-5 py-2.5 rounded-full shadow-lg shadow-sun-400/30 transition hover:-translate-y-0.5">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                    Donate
                </a>
            </div>

            <button id="menu-btn" class="lg:hidden p-2 rounded-lg hover:bg-brand-100 transition" aria-label="Open menu">
                <svg class="w-7 h-7 text-brand-800" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" d="M4 7h16M4 12h16M4 17h16"/></svg>
            </button>
        </nav>

        {{-- Mobile menu --}}
        <div id="mobile-menu" class="hidden lg:hidden border-t border-brand-100 bg-cream px-4 pb-6 pt-2 space-y-1 font-semibold">
            @foreach ([
                ['route' => 'home', 'label' => 'Home'],
                ['route' => 'about', 'label' => 'About Us'],
                ['route' => 'our-work', 'label' => 'Our Work'],
                ['route' => 'leadership', 'label' => 'Our Team'],
                ['route' => 'partnership', 'label' => 'Partnership'],
                ['route' => 'volunteer', 'label' => 'Volunteer'],
            ] as $item)
                <a href="{{ route($item['route']) }}" class="block px-3 py-2.5 rounded-xl hover:bg-brand-100 {{ request()->routeIs($item['route']) ? 'text-brand-700 bg-brand-50' : '' }}">{{ $item['label'] }}</a>
            @endforeach
            <a href="{{ route('donate') }}" class="block text-center bg-sun-400 text-brand-900 font-extrabold px-5 py-3 rounded-full mt-3">Donate Now</a>
        </div>
    </header>

    {{-- Flash messages --}}
    @if (session('success'))
        <div class="max-w-3xl mx-auto px-4 mt-6">
            <div class="flex items-start gap-3 bg-brand-50 border border-brand-200 text-brand-800 rounded-2xl px-5 py-4">
                <svg class="w-6 h-6 shrink-0 text-brand-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                <p class="font-semibold">{{ session('success') }}</p>
            </div>
        </div>
    @endif

    @if ($errors->any())
        <div class="max-w-3xl mx-auto px-4 mt-6">
            <div class="bg-red-50 border border-red-200 text-red-800 rounded-2xl px-5 py-4">
                <p class="font-bold mb-1">Please check the following:</p>
                <ul class="list-disc pl-5 space-y-0.5 text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    @endif

    <main>
        @yield('content')
    </main>

    {{-- Donate CTA band --}}
    @unless (request()->routeIs('donate') || request()->routeIs('donate.*'))
    <section class="hero-gradient texture-dots">
        <div class="max-w-5xl mx-auto px-4 py-16 text-center">
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-white">Fuel the mission. Stand with our children.</h2>
            <p class="reveal mt-4 text-brand-100 text-lg max-w-2xl mx-auto">Every contribution helps us reach more children and strengthen more families — and reminds a child that they are valued, supported, and full of potential.</p>
            <a href="{{ route('donate') }}" class="reveal mt-8 inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-brand-900 font-extrabold text-lg px-8 py-4 rounded-full shadow-xl shadow-black/20 transition hover:-translate-y-0.5">
                Donate Now
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/></svg>
            </a>
        </div>
    </section>
    @endunless

    {{-- Footer --}}
    <footer class="bg-brand-900 text-brand-100">
        <div class="max-w-7xl mx-auto px-4 py-14 grid gap-10 md:grid-cols-4">
            <div class="md:col-span-2">
                <span class="font-display text-3xl font-bold text-white">Fuel<span class="text-sun-400">4</span>Kids</span>
                <p class="mt-4 max-w-md text-sm leading-relaxed">{{ config('fuel4kids.tagline') }} A community-based nonprofit serving students across the Greater Toronto and Hamilton Area — and communities beyond.</p>
                <div class="flex gap-3 mt-6">
                    <a href="{{ config('fuel4kids.facebook') }}" target="_blank" rel="noopener" aria-label="Facebook" class="p-2.5 bg-white/10 rounded-full hover:bg-sun-400 hover:text-brand-900 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M22 12a10 10 0 10-11.56 9.88v-6.99H7.9V12h2.54V9.8c0-2.5 1.5-3.89 3.78-3.89 1.1 0 2.24.2 2.24.2v2.46H15.2c-1.24 0-1.63.77-1.63 1.56V12h2.78l-.44 2.89h-2.34v6.99A10 10 0 0022 12z"/></svg>
                    </a>
                    <a href="{{ config('fuel4kids.instagram') }}" target="_blank" rel="noopener" aria-label="Instagram" class="p-2.5 bg-white/10 rounded-full hover:bg-sun-400 hover:text-brand-900 transition">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.16c3.2 0 3.58.01 4.85.07 3.25.15 4.77 1.69 4.92 4.92.06 1.27.07 1.65.07 4.85s-.01 3.58-.07 4.85c-.15 3.23-1.66 4.77-4.92 4.92-1.27.06-1.64.07-4.85.07s-3.58-.01-4.85-.07c-3.26-.15-4.77-1.7-4.92-4.92C2.17 15.58 2.16 15.2 2.16 12s.01-3.58.07-4.85C2.38 3.92 3.9 2.38 7.15 2.23 8.42 2.17 8.8 2.16 12 2.16zm0 3.68a6.16 6.16 0 100 12.32 6.16 6.16 0 000-12.32zM12 16a4 4 0 110-8 4 4 0 010 8zm6.4-10.85a1.44 1.44 0 100 2.88 1.44 1.44 0 000-2.88z"/></svg>
                    </a>
                </div>
            </div>
            <div>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-4">About Us</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('our-work') }}" class="hover:text-sun-300 transition">Our Work</a></li>
                    <li><a href="{{ route('about') }}" class="hover:text-sun-300 transition">About Us</a></li>
                    <li><a href="{{ route('leadership') }}" class="hover:text-sun-300 transition">Management Team</a></li>
                </ul>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-4 mt-8">Get Involved</h3>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('donate') }}" class="hover:text-sun-300 transition">Donate Now</a></li>
                    <li><a href="{{ route('partnership') }}" class="hover:text-sun-300 transition">Partnership</a></li>
                    <li><a href="{{ route('volunteer') }}" class="hover:text-sun-300 transition">Volunteer</a></li>
                </ul>
            </div>
            <div>
                <h3 class="text-white font-bold uppercase tracking-wider text-sm mb-4">Contact</h3>
                <ul class="space-y-3 text-sm">
                    <li class="flex gap-2.5"><svg class="w-5 h-5 shrink-0 text-sun-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>{{ config('fuel4kids.address') }}</li>
                    <li class="flex gap-2.5"><svg class="w-5 h-5 shrink-0 text-sun-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z"/><path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z"/></svg><a href="mailto:{{ config('fuel4kids.email') }}" class="hover:text-sun-300 transition break-all">{{ config('fuel4kids.email') }}</a></li>
                    <li class="flex gap-2.5"><svg class="w-5 h-5 shrink-0 text-sun-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z"/></svg>{{ implode(' / ', config('fuel4kids.phones')) }}</li>
                </ul>
            </div>
        </div>
        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-6 text-xs text-brand-200/80 text-center leading-relaxed">
                Fuel4Kids Organization is a {{ config('fuel4kids.registration') }}.<br>
                Donations and contributions are tax-deductible as allowed by law. &copy; {{ date('Y') }} Fuel4Kids Organization. All rights reserved.
            </div>
        </div>
    </footer>

    <script>
        // Mobile menu
        document.getElementById('menu-btn').addEventListener('click', () => {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });

        // Scroll reveal
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(e => { if (e.isIntersecting) { e.target.classList.add('is-visible'); observer.unobserve(e.target); } });
        }, { threshold: 0.12 });
        document.querySelectorAll('.reveal').forEach(el => observer.observe(el));
    </script>
    @stack('scripts')
</body>
</html>
