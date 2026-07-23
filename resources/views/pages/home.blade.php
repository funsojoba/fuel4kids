@extends('layouts.app')

@section('title', 'Fuel4Kids — Nourish the child. Strengthen the village.')

@section('content')

    {{-- Hero --}}
    <section class="relative overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('images/impact-on-kids.webp') }}');">
        <div class="absolute inset-0 bg-gradient-to-r from-brand-900/90 via-brand-900/70 to-brand-900/40"></div>
        <div class="relative max-w-7xl mx-auto px-4 py-24 lg:py-36">
            <div class="max-w-2xl">
                <span class="reveal inline-flex items-center gap-2 bg-white/10 text-sun-200 text-sm font-bold px-4 py-1.5 rounded-full uppercase tracking-wide">
                    <span class="w-2 h-2 bg-sun-400 rounded-full animate-pulse"></span>
                    Canadian Registered Nonprofit
                </span>
                <h1 class="reveal font-display text-4xl sm:text-5xl lg:text-6xl font-bold text-white mt-6 leading-[1.08]">
                    Nourish the child.<br>
                    <span class="text-sun-300">Strengthen the village.</span>
                </h1>
                <p class="reveal mt-6 text-lg sm:text-xl text-brand-100 max-w-xl leading-relaxed">
                    Fuel 4 Kids Organization is committed to meeting real needs with compassion, dignity, and practical support — for children, youth, and families across the Greater Toronto and Hamilton Area, and beyond.
                </p>
                <div class="reveal mt-9 flex flex-wrap gap-4">
                    <a href="{{ route('donate') }}" class="inline-flex items-center gap-2 bg-sun-400 hover:bg-sun-500 text-brand-900 font-extrabold text-lg px-8 py-4 rounded-full shadow-xl shadow-black/25 transition hover:-translate-y-0.5">
                        Donate Now
                    </a>
                    <a href="{{ route('about') }}" class="inline-flex items-center gap-2 border-2 border-white/40 hover:border-white text-white font-bold text-lg px-8 py-4 rounded-full transition hover:bg-white/10">
                        Learn More
                    </a>
                </div>
            </div>
        </div>
        <svg class="relative block w-full text-cream" viewBox="0 0 1440 64" fill="currentColor" preserveAspectRatio="none" aria-hidden="true"><path d="M0 64h1440V32C1200 8 960 0 720 12S240 56 0 32v32z"/></svg>
    </section>

    {{-- Pillars --}}
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-6">
            @foreach ([
                ['title' => 'Nutritious Meals', 'text' => 'School lunch and nutrition programs that fuel learning and growth.', 'icon' => 'M12 8c-2.5 0-4 1.5-4 4s1.5 6 4 6 4-3.5 4-6-1.5-4-4-4zm0-5v3m-3-2l1 2m5-2l-1 2'],
                ['title' => 'Care Packages', 'text' => 'Essential care items delivered with dignity to children and families.', 'icon' => 'M20 7l-8-4-8 4m16 0l-8 4m8-4v10l-8 4m0-10L4 7m8 4v10M4 7v10l8 4'],
                ['title' => 'Educational Support', 'text' => 'Tutoring, skill-building, and pathways to professional support.', 'icon' => 'M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253'],
                ['title' => 'Community Partnerships', 'text' => 'Working with schools, families, and partners to multiply impact.', 'icon' => 'M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z'],
            ] as $pillar)
                <div class="reveal group bg-white rounded-3xl p-7 shadow-sm hover:shadow-xl hover:-translate-y-1 transition border border-brand-100">
                    <div class="w-14 h-14 rounded-2xl bg-brand-50 group-hover:bg-sun-100 flex items-center justify-center transition">
                        <svg class="w-7 h-7 text-brand-600" fill="none" stroke="currentColor" stroke-width="1.8" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="{{ $pillar['icon'] }}"/></svg>
                    </div>
                    <h3 class="font-display text-xl font-bold mt-5 text-brand-800">{{ $pillar['title'] }}</h3>
                    <p class="mt-2 text-ink/70 leading-relaxed text-[15px]">{{ $pillar['text'] }}</p>
                </div>
            @endforeach
        </div>
    </section>

    {{-- About preview --}}
    <section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-14 items-center">
        <div class="reveal relative order-2 lg:order-1">
            <div class="absolute -inset-3 bg-brand-100 rounded-[2rem] -rotate-2"></div>
            <img src="{{ asset('images/about-hero.jpg') }}" alt="About Fuel4Kids" class="relative soft w-full object-cover">
        </div>
        <div class="order-1 lg:order-2">
            <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">About Fuel4Kids</span>
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">When children are nourished, communities thrive.</h2>
            <p class="reveal mt-5 text-lg text-ink/75 leading-relaxed">
                Fuel4Kids Organization is a Canadian registered nonprofit dedicated to reducing food insecurity and supporting children, youth, and families through nutritious meals, essential care items, educational support, and community partnerships.
            </p>
            <p class="reveal mt-4 text-lg text-ink/75 leading-relaxed">
                We believe that when children are nourished, families are strengthened, and communities thrive.
            </p>
            <a href="{{ route('about') }}" class="reveal mt-7 inline-flex items-center gap-2 text-brand-700 font-extrabold hover:gap-3.5 transition-all">
                Learn more about us
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/></svg>
            </a>
        </div>
    </section>

    {{-- Video + Commitment --}}
    <section class="bg-white border-y border-brand-100">
        <div class="max-w-7xl mx-auto px-4 py-20 grid lg:grid-cols-2 gap-14 items-center">
            <div>
                <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">A word from our Executive Director</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">Our Commitment</h2>
                <p class="reveal mt-5 text-lg text-ink/75 leading-relaxed">
                    At Fuel4Kids Organization, we are committed to ensuring that no child goes without the nourishment, care, and support they need to thrive. Through compassionate service, meaningful partnerships, and community-driven initiatives, we provide nutritious food, essential resources, and opportunities that empower children.
                </p>
                <p class="reveal mt-4 font-semibold text-brand-700">— Joan Monzac, Executive Director</p>
                <a href="{{ route('our-work') }}" class="reveal mt-7 inline-flex items-center gap-2 text-brand-700 font-extrabold hover:gap-3.5 transition-all">
                    See our work
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2.5" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M13 7l5 5-5 5M6 12h12"/></svg>
                </a>
            </div>
            <div class="reveal">
                <video controls preload="metadata" class="soft w-full bg-brand-900" poster="{{ asset('images/community.png') }}">
                    <source src="{{ asset('videos/fuel4kids_intro.mp4') }}" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
            </div>
        </div>
    </section>

    {{-- Regions served --}}
    <section class="max-w-7xl mx-auto px-4 py-20">
        <div class="text-center max-w-2xl mx-auto">
            <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">Where we serve</span>
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">Reaching children across regions</h2>
        </div>
        <div class="grid sm:grid-cols-3 gap-6 mt-12">
            @foreach ([
                ['img' => 'images/toronto.png', 'title' => 'Ontario, Canada', 'text' => 'Tutoring, life-skills programs, care packages, and pathways to professional support for local families.'],
                ['img' => 'images/jamaica.png', 'title' => 'Jamaica', 'text' => 'Relief support for families after Hurricane Melissa — showing up when hardship strikes.'],
                ['img' => 'images/stkitts.png', 'title' => 'St. Kitts & Nevis', 'text' => 'Donated glucose monitoring devices supporting access to essential health resources.'],
            ] as $region)
                <div class="reveal bg-white rounded-3xl overflow-hidden shadow-sm hover:shadow-xl transition border border-brand-100 group">
                    <div class="overflow-hidden">
                        <img src="{{ asset($region['img']) }}" alt="{{ $region['title'] }}" class="w-full h-52 object-cover group-hover:scale-105 transition duration-500">
                    </div>
                    <div class="p-6">
                        <h3 class="font-display text-xl font-bold text-brand-800">{{ $region['title'] }}</h3>
                        <p class="mt-2 text-ink/70 text-[15px] leading-relaxed">{{ $region['text'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    {{-- Partners marquee --}}
    <section class="bg-white border-y border-brand-100 py-14 overflow-hidden">
        <h2 class="reveal text-center font-display text-2xl sm:text-3xl font-bold text-brand-800 mb-10">Our Featured Partners</h2>
        <div class="relative">
            <div class="flex marquee w-max items-center gap-16 px-8">
                @for ($i = 0; $i < 2; $i++)
                    <img src="{{ asset('images/partners/native.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                    <img src="{{ asset('images/partners/heartsandmind.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                    <img src="{{ asset('images/partners/fosterfamily.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                    <img src="{{ asset('images/partners/native.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                    <img src="{{ asset('images/partners/heartsandmind.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                    <img src="{{ asset('images/partners/fosterfamily.png') }}" alt="Partner" class="h-16 w-auto grayscale hover:grayscale-0 transition">
                @endfor
            </div>
        </div>
    </section>

@endsection
