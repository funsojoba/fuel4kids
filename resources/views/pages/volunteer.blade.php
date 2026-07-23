@extends('layouts.app')

@section('title', 'Volunteer — Fuel4Kids')

@section('content')

    <section class="hero-gradient texture-dots">
        <div class="max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white">Volunteer</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                You can make a difference in your community too. Give your time. Share your heart.
            </p>
        </div>
    </section>

    {{-- Gallery --}}
    <section class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @foreach (['volunteer-1.jpg', 'volunteer-2.jpg', 'volunteer-3.jpg', 'volunteer-4.jpg'] as $img)
                <div class="reveal overflow-hidden rounded-3xl shadow-sm hover:shadow-xl transition group {{ $loop->first ? 'sm:col-span-2 lg:col-span-1' : '' }}">
                    <img src="{{ asset('images/gallery/'.$img) }}" alt="Fuel4Kids volunteers" class="w-full h-72 object-cover group-hover:scale-105 transition duration-500">
                </div>
            @endforeach
        </div>
        <p class="reveal mt-8 text-center text-lg text-ink/75 max-w-2xl mx-auto">
            Volunteers pack boxes filled with not just food but other essentials that are delivered to families in need across regions.
        </p>
    </section>

    {{-- Copy --}}
    <section class="bg-white border-y border-brand-100 py-20">
        <div class="max-w-3xl mx-auto px-4">
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 text-center">Be a vital part of the mission</h2>
            <div class="mt-8 space-y-5 text-lg text-ink/75 leading-relaxed">
                <p class="reveal">There are many ways you can serve your community and be a vital part of Fuel 4 Kids' mission. Together, we can bring food, essentials — and hope — to families that need our support.</p>
                <p class="reveal">At Fuel 4 Kids Organization, volunteers are an important part of the village that helps children and families feel seen, supported, and cared for.</p>
                <p class="reveal">Our mission is strengthened by people who are willing to give their time, skills, compassion, and energy to help meet real needs in the community. Whether you are helping to prepare care packages, organize donations, support community events, assist with outreach, or lend your professional skills, your contribution matters.</p>
                <p class="reveal">We welcome individuals, students, families, community groups, faith groups, and businesses who share our belief that every child deserves nourishment, support, and the opportunity to thrive.</p>
                <p class="reveal text-base bg-brand-50 border border-brand-200 rounded-2xl px-6 py-4">To help protect the children, families, and community members we serve, volunteers may be required to complete an application, screening process, orientation, and any necessary background checks before participating in certain programs or activities.</p>
                <p class="reveal font-display text-xl font-semibold text-brand-700 text-center">Give your time. Share your heart.<br>Help us nourish the child and strengthen the village.</p>
            </div>
        </div>
    </section>

    {{-- Volunteer form --}}
    <section class="max-w-3xl mx-auto px-4 py-20" id="volunteer-form">
        <div class="reveal bg-white rounded-[2rem] border border-brand-100 shadow-lg p-8 lg:p-12">
            <h2 class="font-display text-3xl font-bold text-brand-800">Ready to join us?</h2>
            <p class="mt-3 text-ink/70">Fill in the form below, or reach us directly at <a class="text-brand-700 font-bold hover:underline" href="mailto:{{ config('fuel4kids.email') }}">{{ config('fuel4kids.email') }}</a> / {{ config('fuel4kids.phones')[0] }}.</p>

            <form method="POST" action="{{ route('volunteer.submit') }}" class="mt-8 grid sm:grid-cols-2 gap-5">
                @csrf
                <input type="text" name="website" tabindex="-1" autocomplete="off" class="hidden" aria-hidden="true">
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="v-name">Your name *</label>
                    <input id="v-name" name="name" type="text" required value="{{ old('name') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="v-email">Email *</label>
                    <input id="v-email" name="email" type="email" required value="{{ old('email') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="v-phone">Phone</label>
                    <input id="v-phone" name="phone" type="tel" value="{{ old('phone') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div>
                    <label class="block font-bold text-sm mb-1.5" for="v-org">Group / organization (optional)</label>
                    <input id="v-org" name="organization" type="text" value="{{ old('organization') }}" class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">
                </div>
                <div class="sm:col-span-2">
                    <label class="block font-bold text-sm mb-1.5" for="v-message">How would you like to help? *</label>
                    <textarea id="v-message" name="message" rows="5" required class="w-full rounded-xl border-brand-200 border px-4 py-3 focus:outline-none focus:ring-2 focus:ring-brand-400 bg-cream/50">{{ old('message') }}</textarea>
                </div>
                <div class="sm:col-span-2">
                    <button type="submit" class="w-full sm:w-auto bg-brand-700 hover:bg-brand-800 text-white font-extrabold px-10 py-4 rounded-full shadow-lg transition hover:-translate-y-0.5">
                        Submit application
                    </button>
                </div>
            </form>
        </div>
    </section>

@endsection
