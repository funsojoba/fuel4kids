@extends('layouts.app')

@section('title', 'Donation Cancelled — Fuel4Kids')

@section('content')
    <section class="max-w-2xl mx-auto px-4 py-24 text-center">
        <div class="reveal is-visible">
            <div class="w-24 h-24 mx-auto bg-sun-50 rounded-full flex items-center justify-center">
                <svg class="w-12 h-12 text-sun-500" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m0 3.75h.008v.008H12v-.008zM21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            </div>
            <h1 class="font-display text-4xl font-bold text-brand-800 mt-8">No worries — nothing was charged</h1>
            <p class="mt-5 text-lg text-ink/75 leading-relaxed">
                Your donation was cancelled before completing. If something went wrong, or you have a question about giving, we'd love to hear from you at
                <a href="mailto:{{ config('fuel4kids.email') }}" class="text-brand-700 font-bold hover:underline">{{ config('fuel4kids.email') }}</a>.
            </p>
            <div class="mt-10 flex flex-wrap justify-center gap-4">
                <a href="{{ route('donate') }}" class="bg-sun-400 hover:bg-sun-500 text-brand-900 font-extrabold px-8 py-3.5 rounded-full transition">Try again</a>
                <a href="{{ route('home') }}" class="border-2 border-brand-200 hover:border-brand-400 text-brand-700 font-extrabold px-8 py-3.5 rounded-full transition">Back to Home</a>
            </div>
        </div>
    </section>
@endsection
