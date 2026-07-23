@extends('layouts.app')

@section('title', 'About Us — Fuel4Kids')

@section('content')

    {{-- Page hero --}}
    <section class="hero-gradient texture-dots">
        <div class="max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white">About Us</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                Fuel 4 Kids Organization is committed to ensuring that no child goes without the nourishment, care, and support they need to thrive.
            </p>
        </div>
    </section>

    {{-- Who we are --}}
    <section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-14 items-center">
        <div class="reveal relative">
            <div class="absolute -inset-3 bg-sun-100 rounded-[2rem] rotate-2"></div>
            <img src="{{ asset('images/about-hero.jpg') }}" alt="Who we are" class="relative soft w-full object-cover">
        </div>
        <div>
            <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">Who we are</span>
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">Built from lived experience</h2>
            <p class="reveal mt-5 text-lg text-ink/75 leading-relaxed">
                Fuel 4 Kids Organization was created from lived experience, careful observation, and years of hands-on service with children, families, caregivers, and vulnerable members of the community.
            </p>
            <p class="reveal mt-4 text-lg text-ink/75 leading-relaxed">
                Through our roles as parents, caregivers, foster parents, and frontline workers, we have seen the same reality too many times: children trying to learn and grow while facing hunger, hardship, and limited access to basic necessities.
            </p>
        </div>
    </section>

    {{-- Impact gallery --}}
    <section class="bg-white border-y border-brand-100 py-20">
        <div class="max-w-7xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto">
                <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">Real impact</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">The impact of feeding the children</h2>
            </div>
            <div class="grid sm:grid-cols-3 gap-6 mt-12">
                @foreach (['impact-1.jpeg', 'impact-2.jpeg', 'impact-3.jpeg'] as $img)
                    <div class="reveal overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition group">
                        <img src="{{ asset('images/gallery/'.$img) }}" alt="Fuel4Kids impact" class="w-full h-96 object-cover group-hover:scale-105 transition duration-500">
                    </div>
                @endforeach
            </div>
            <div class="max-w-3xl mx-auto mt-12 space-y-5 text-lg text-ink/75 leading-relaxed">
                <p class="reveal">Fuel 4 Kids was not built from theory. It was built from real-life experience. We have seen children arrive at school hungry, families stretched beyond capacity, and caregivers doing their best with very little support. These experiences made one truth clear: when a child's basic needs are not met, every other opportunity becomes harder to reach.</p>
                <p class="reveal">Fuel 4 Kids Organization exists to respond with compassion, dignity, and action. We provide care packages, essential items, and community support to school-aged children and displaced members of the community.</p>
                <p class="reveal font-display text-xl font-semibold text-brand-700 text-center pt-2">We believe every child deserves to feel seen, supported, and prepared to learn.</p>
            </div>
        </div>
    </section>

    {{-- Mission & Purpose --}}
    <section class="max-w-7xl mx-auto px-4 py-20 grid md:grid-cols-2 gap-8">
        <div class="reveal bg-brand-800 text-white rounded-[2rem] p-9 lg:p-12 relative overflow-hidden">
            <div class="absolute top-0 right-0 w-40 h-40 bg-sun-400/10 rounded-full -translate-y-1/2 translate-x-1/2"></div>
            <h2 class="font-display text-3xl font-bold">Our Mission</h2>
            <p class="mt-5 text-brand-100 leading-relaxed">Our mission is to support and protect children by working alongside families, schools, caregivers, and community partners to remove barriers caused by hunger, hardship, and unmet basic needs.</p>
            <p class="mt-4 text-brand-100 leading-relaxed">We provide practical support with dignity, compassion, and consistency. Through nutritious food, essential care items, and meaningful community resources, we help children feel seen, supported, and prepared to learn, grow, and thrive.</p>
            <p class="mt-4 text-brand-100 leading-relaxed">We believe children's well-being must remain at the center of every service, every system, and every community effort created to support them.</p>
        </div>
        <div class="reveal bg-sun-50 border border-sun-200 rounded-[2rem] p-9 lg:p-12 relative overflow-hidden">
            <div class="absolute bottom-0 left-0 w-40 h-40 bg-brand-200/30 rounded-full translate-y-1/2 -translate-x-1/2"></div>
            <h2 class="font-display text-3xl font-bold text-brand-800">Our Purpose</h2>
            <p class="mt-5 text-ink/75 leading-relaxed">Our purpose is simple, but powerful: to help children access the nutritious food, essential care items, and supportive resources they need to show up in school and in life with confidence.</p>
            <p class="mt-4 text-ink/75 leading-relaxed">We understand that nourishment is more than food. It is emotional support, stability, dignity, and the reassurance that someone cares. When children are supported in these ways, they are better able to learn, grow, and believe in what is possible for their future.</p>
        </div>
    </section>

@endsection
