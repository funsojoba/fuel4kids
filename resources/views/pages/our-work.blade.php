@extends('layouts.app')

@section('title', 'Our Work — Fuel4Kids')

@section('content')

    <section class="relative overflow-hidden bg-cover bg-center" style="background-image: url('{{ asset('images/our-work.jpg') }}');">
        <div class="absolute inset-0 bg-brand-900/70"></div>
        <div class="relative max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white leading-tight">Together, we're nourishing brighter futures</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                Working with our partners enables us to reach more children, strengthen communities, and create lasting impact.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-14 items-center">
        <div class="reveal relative">
            <div class="absolute -inset-3 bg-brand-100 rounded-[2rem] -rotate-2"></div>
            <img src="{{ asset('images/ourwork-main.png') }}" alt="Our work" class="relative soft w-full object-cover">
        </div>
        <div>
            <span class="reveal text-sun-600 font-extrabold uppercase tracking-widest text-sm">How we are helping</span>
            <h2 class="reveal font-display text-3xl sm:text-4xl font-bold text-brand-800 mt-3">Meeting real needs with compassion, dignity, and practical support</h2>
            <p class="reveal mt-5 text-lg text-ink/75 leading-relaxed">
                Working with our partners ensures we reach out to more regions — bringing food, essentials, and hope to children and families who need it most.
            </p>
        </div>
    </section>

    {{-- Regions --}}
    <section class="bg-white border-y border-brand-100 py-20">
        <div class="max-w-6xl mx-auto px-4 space-y-16">

            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <img src="{{ asset('images/jamaica.png') }}" alt="Our work in Jamaica" class="reveal soft w-full object-cover">
                <div class="reveal">
                    <span class="inline-block bg-sun-100 text-sun-700 font-extrabold text-xs uppercase tracking-widest px-3 py-1.5 rounded-full">Jamaica</span>
                    <h3 class="font-display text-2xl sm:text-3xl font-bold text-brand-800 mt-4">Our work in Jamaica</h3>
                    <p class="mt-4 text-lg text-ink/75 leading-relaxed">
                        With the help of community partners and private donations, we were able to assist families in Jamaica shortly after Hurricane Melissa devastated parts of the island. This support reflected the heart of our mission: showing up when families are facing hardship and helping them feel seen, supported, and not forgotten.
                    </p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <div class="reveal lg:order-2">
                    <img src="{{ asset('images/stkitts.png') }}" alt="Our work in St. Kitts & Nevis" class="soft w-full object-cover">
                </div>
                <div class="reveal lg:order-1">
                    <span class="inline-block bg-brand-100 text-brand-700 font-extrabold text-xs uppercase tracking-widest px-3 py-1.5 rounded-full">St. Kitts &amp; Nevis</span>
                    <h3 class="font-display text-2xl sm:text-3xl font-bold text-brand-800 mt-4">Our work in St. Kitts &amp; Nevis</h3>
                    <p class="mt-4 text-lg text-ink/75 leading-relaxed">
                        We donated much needed glucose monitoring devices to individuals in St. Kitts &amp; Nevis, supporting community members who required access to essential health-related resources.
                    </p>
                </div>
            </div>

            <div class="grid lg:grid-cols-2 gap-10 items-center">
                <img src="{{ asset('images/toronto.png') }}" alt="Our work in Ontario" class="reveal soft w-full object-cover">
                <div class="reveal">
                    <span class="inline-block bg-sun-100 text-sun-700 font-extrabold text-xs uppercase tracking-widest px-3 py-1.5 rounded-full">Ontario, Canada</span>
                    <h3 class="font-display text-2xl sm:text-3xl font-bold text-brand-800 mt-4">Our work in Ontario</h3>
                    <p class="mt-4 text-lg text-ink/75 leading-relaxed">
                        In our local communities in Ontario, Canada, Fuel 4 Kids has supported families by helping them work toward stability through practical programs, guidance, and meaningful care. We have provided tutoring, singing lessons, basic cooking lessons, soap-making activities, and pathways to professional support for children and families. We also help guide families toward developmental assessments and other supportive services when children may need additional care.
                    </p>
                </div>
            </div>

        </div>
    </section>

    {{-- Closing call --}}
    <section class="max-w-3xl mx-auto px-4 py-20 text-center">
        <p class="reveal text-lg text-ink/75 leading-relaxed">
            This is only the beginning. We would love to do more, reach more families, and support more children — but we cannot do it alone. With your help, Fuel 4 Kids Organization can continue providing care packages, essential resources, skill-building opportunities, and pathways to support for children, families, and displaced members of the community.
        </p>
        <p class="reveal mt-6 font-display text-2xl font-bold text-brand-800">
            Help us continue the work. Stand with our children.<br>Nourish the child and strengthen the village.
        </p>
    </section>

@endsection
