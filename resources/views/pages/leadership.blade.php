@extends('layouts.app')

@section('title', 'Leadership & Management Team — Fuel4Kids')

@section('content')

    <section class="hero-gradient texture-dots">
        <div class="max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white">Management Team</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                Our leadership team is actively engaged in Fuel4Kids' work to deepen our impact, leverage our partnerships, grow our voice, explore new ideas, and strengthen organizational capabilities.
            </p>
        </div>
    </section>

    <section class="max-w-6xl mx-auto px-4 py-16 space-y-10">
        @foreach ($team as $member)
            <article class="reveal bg-white rounded-[2rem] border border-brand-100 shadow-sm overflow-hidden grid md:grid-cols-[280px,1fr]">
                <div class="bg-brand-50 flex items-center justify-center p-8">
                    <div class="text-center">
                        <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}"
                             class="w-44 h-44 object-cover rounded-full ring-4 ring-white shadow-lg mx-auto"
                             onerror="this.outerHTML='<div class=&quot;w-44 h-44 rounded-full bg-brand-200 flex items-center justify-center mx-auto font-display text-4xl font-bold text-brand-700&quot;>{{ collect(explode(' ', $member['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}</div>'">
                        <h2 class="font-display text-xl font-bold text-brand-800 mt-5">{{ $member['name'] }}</h2>
                        <p class="text-sun-600 font-bold text-sm mt-1">{{ $member['role'] }}</p>
                    </div>
                </div>
                <div class="p-8 lg:p-10">
                    <p class="text-ink/80 leading-relaxed font-semibold">{{ $member['summary'] }}</p>
                    <h3 class="font-display text-lg font-bold text-brand-800 mt-6 mb-3">Key Responsibilities</h3>
                    <ul class="grid sm:grid-cols-2 gap-x-6 gap-y-2.5">
                        @foreach ($member['responsibilities'] as $item)
                            <li class="flex gap-2.5 text-[15px] text-ink/70 leading-snug">
                                <svg class="w-5 h-5 shrink-0 text-brand-400 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>
                </div>
            </article>
        @endforeach
    </section>

    <section class="bg-white border-t border-brand-100 py-16">
        <div class="max-w-6xl mx-auto px-4">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">Beyond Canada</span>
                <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">International Ambassadors</h2>
            </div>
            <div class="space-y-10">
                @foreach ($ambassadors as $member)
                    <article class="reveal bg-cream rounded-[2rem] border border-brand-100 shadow-sm overflow-hidden grid md:grid-cols-[280px,1fr]">
                        <div class="bg-sun-50 flex items-center justify-center p-8">
                            <div class="text-center">
                                <img src="{{ asset($member['photo']) }}" alt="{{ $member['name'] }}"
                                     class="w-44 h-44 object-cover rounded-full ring-4 ring-white shadow-lg mx-auto"
                                     onerror="this.outerHTML='<div class=&quot;w-44 h-44 rounded-full bg-sun-200 flex items-center justify-center mx-auto font-display text-4xl font-bold text-sun-700&quot;>{{ collect(explode(' ', $member['name']))->map(fn($w) => mb_substr($w, 0, 1))->take(2)->implode('') }}</div>'">
                                <h2 class="font-display text-xl font-bold text-brand-800 mt-5">{{ $member['name'] }}</h2>
                                <p class="text-sun-600 font-bold text-sm mt-1">{{ $member['role'] }}</p>
                            </div>
                        </div>
                        <div class="p-8 lg:p-10">
                            <p class="text-ink/80 leading-relaxed font-semibold">{{ $member['summary'] }}</p>
                            <h3 class="font-display text-lg font-bold text-brand-800 mt-6 mb-3">Key Responsibilities</h3>
                            <ul class="space-y-2.5">
                                @foreach ($member['responsibilities'] as $item)
                                    <li class="flex gap-2.5 text-[15px] text-ink/70 leading-snug">
                                        <svg class="w-5 h-5 shrink-0 text-sun-500 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </section>

@endsection
