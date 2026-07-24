@extends('layouts.app')

@section('title', 'Partnership — Fuel4Kids')

@section('content')

    <section class="hero-gradient texture-dots">
        <div class="max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white">The Power of Partnership</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                Consistent support through partnership — building stronger communities and brighter futures, together.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-14 items-center">
        <div class="reveal relative">
            <div class="absolute -inset-3 bg-sun-100 rounded-[2rem] rotate-2"></div>
            <img src="{{ asset('images/partnership.webp') }}" alt="Partnership" class="relative soft w-full object-cover">
        </div>
        <div>
            <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">Working together</span>
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">Consistent support through partnership</h2>
            <p class="reveal mt-5 text-lg text-ink/75 leading-relaxed">
                We work alongside businesses, organizations, and community partners to provide reliable support and essential resources to children and families across Canada and beyond.
            </p>
            <p class="reveal mt-4 text-lg text-ink/75 leading-relaxed">
                Our flexible sponsorship opportunities create meaningful community impact while offering partners customized collaboration and co-branding opportunities.
            </p>
        </div>
    </section>

    <section class="bg-white border-y border-brand-100 py-20">
        <div class="max-w-3xl mx-auto px-4 text-center">
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800">Why partnership matters</h2>
            <div class="mt-6 space-y-5 text-lg text-ink/75 leading-relaxed text-left sm:text-center">
                <p class="reveal">Fuel4Kids Organization believes that lasting change happens through partnership. The challenges facing children and families — food insecurity, limited access to essential resources, and everyday hardships — cannot be addressed by one person, one organization, or one act of kindness alone.</p>
                <p class="reveal">Creating healthier, stronger communities requires collaboration, compassion, and consistent support. That is why we work alongside schools, families, caregivers, community organizations, service providers, donors, volunteers, faith groups, businesses, and advocates who share our commitment to helping children thrive.</p>
                <p class="reveal">Together, we can provide stability during difficult times, create opportunities for growth, and build stronger, more resilient communities where every child has the support they need to succeed.</p>
            </div>

            <div class="mt-14">
                <h3 class="reveal font-display text-2xl font-bold text-brand-800 mb-8">Our Partners</h3>
                <div class="reveal flex flex-wrap items-center justify-center gap-10">
                    <img src="{{ asset('images/partners/heartsandmind.png') }}" alt="Hearts and Mind" class="h-20 w-auto">
                    <img src="{{ asset('images/partners/fosterfamily.png') }}" alt="Foster Family" class="h-20 w-auto">
                    <img src="{{ asset('images/partners/native.png') }}" alt="Native" class="h-20 w-auto">
                </div>
            </div>
        </div>
    </section>

    {{-- Partnership inquiry form (temporarily disabled)
    <section class="max-w-3xl mx-auto px-4 py-20" id="partner-form">
        <div class="reveal bg-white rounded-[2rem] border border-brand-100 shadow-lg p-8 lg:p-12">
            <h2 class="font-display text-3xl font-bold text-brand-800">Become a partner</h2>
            <p class="mt-3 text-ink/70">Tell us about your organization and how you'd like to collaborate. We'll get back to you shortly.</p>

            <form method="POST" action="{{ route('partnership.submit') }}" class="mt-8 grid sm:grid-cols-2 gap-5">
                @csrf
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="p-name">Your name *</label>
                    <input id="p-name" name="name" type="text" required value="{{ old('name') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="p-email">Email *</label>
                    <input id="p-email" name="email" type="email" required value="{{ old('email') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="p-phone">Phone</label>
                    <input id="p-phone" name="phone" type="tel" value="{{ old('phone') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="p-org">Organization</label>
                    <input id="p-org" name="organization" type="text" value="{{ old('organization') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-bold text-sm mb-1.5" for="p-message">How would you like to partner with us? *</label>
                    <textarea id="p-message" name="message" rows="5" required class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">{{ old('message') }}</textarea>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="w-full sm:w-auto bg-brand-700 hover:bg-brand-800 text-white font-extrabold px-10 py-4 rounded-full shadow-lg transition hover:-translate-y-0.5">
                        Send inquiry
                    </button>
                </div>
            </form>
        </div>
    </section>
    --}}

@endsection
