@extends('layouts.app')

@section('title', 'Donate — Fuel4Kids')

@section('content')

    <section class="hero-gradient texture-dots">
        <div class="max-w-4xl mx-auto px-4 py-16 lg:py-20 text-center">
            <h1 class="reveal font-display text-4xl sm:text-5xl font-bold text-white">How You Can Help</h1>
            <p class="reveal mt-5 text-lg text-brand-100 max-w-2xl mx-auto leading-relaxed">
                Every child deserves the opportunity to grow, learn, and thrive. You can make a meaningful difference today.
            </p>
        </div>
    </section>

    <section class="max-w-7xl mx-auto px-4 py-16 grid lg:grid-cols-2 gap-12 items-start">

        {{-- Left: copy + photos --}}
        <div>
            <h2 class="reveal font-display text-3xl font-bold text-brand-800">Your support goes further than you think</h2>
            <div class="mt-5 space-y-4 text-lg text-ink/75 leading-relaxed">
                <p class="reveal">We invite individuals, businesses, schools, faith communities, community organizations, and volunteers to partner with Fuel4Kids Organization in supporting children and families through nutritious food, essential resources, and compassionate community programs.</p>
                <p class="reveal">Every contribution — whether it's a donation, volunteer service, partnership, or advocacy — helps us reach more children and strengthen more families. Your support does more than provide resources; it reminds a child that they are valued, supported, and full of potential.</p>
                <p class="reveal font-display text-xl font-semibold text-brand-700">Fuel the mission. Stand with our children.<br>Nourish the child. Strengthen the village.</p>
            </div>
            <div class="grid grid-cols-2 gap-5 mt-8">
                <img src="{{ asset('images/gallery/donate-1.webp') }}" alt="Fuel4Kids in action" class="reveal soft w-full h-64 object-cover">
                <img src="{{ asset('images/gallery/donate-2.webp') }}" alt="Fuel4Kids in action" class="reveal soft w-full h-64 object-cover mt-8">
            </div>
        </div>

        {{-- Right: donation card --}}
        <div class="reveal lg:sticky lg:top-28">
            <div class="bg-white rounded-[2rem] border border-brand-100 shadow-2xl shadow-brand-900/10 p-8 lg:p-10">
                <div class="flex items-center justify-between">
                    <h2 class="font-display text-2xl font-bold text-brand-800">Make a donation</h2>
                    <svg class="w-8 h-8 text-sun-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 17.657l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd"/></svg>
                </div>

                <form method="POST" action="{{ route('donate.checkout') }}" class="mt-6">
                    @csrf

                    {{-- Frequency toggle --}}
                    <div class="grid grid-cols-2 gap-1.5 bg-brand-50 rounded-full p-1.5" role="tablist">
                        <label class="cursor-pointer">
                            <input type="radio" name="frequency" value="once" class="peer sr-only" {{ old('frequency', 'once') === 'once' ? 'checked' : '' }}>
                            <span class="block text-center font-extrabold py-2.5 rounded-full transition peer-checked:bg-brand-700 peer-checked:text-white peer-checked:shadow text-brand-700">One-time</span>
                        </label>
                        <label class="cursor-pointer">
                            <input type="radio" name="frequency" value="monthly" class="peer sr-only" {{ old('frequency') === 'monthly' ? 'checked' : '' }}>
                            <span class="block text-center font-extrabold py-2.5 rounded-full transition peer-checked:bg-brand-700 peer-checked:text-white peer-checked:shadow text-brand-700">Monthly</span>
                        </label>
                    </div>
                    <p id="monthly-note" class="hidden text-sm text-brand-600 font-semibold mt-3 text-center">You can cancel your monthly gift anytime.</p>

                    {{-- Amounts --}}
                    <div class="grid grid-cols-2 gap-3 mt-6">
                        @foreach ($amounts as $amt)
                            <label class="cursor-pointer">
                                <input type="radio" name="preset" value="{{ $amt }}" class="peer sr-only amount-preset" {{ $loop->iteration === 2 ? 'checked' : '' }}>
                                <span class="block text-center font-extrabold text-lg border-2 border-brand-100 rounded-2xl py-3.5 transition hover:border-brand-300 peer-checked:border-sun-400 peer-checked:bg-sun-50 peer-checked:text-sun-700">${{ $amt }}</span>
                            </label>
                        @endforeach
                    </div>

                    <div class="mt-3 relative">
                        <span class="absolute left-4 top-1/2 -translate-y-1/2 font-extrabold text-brand-400">$</span>
                        <input type="number" id="custom-amount" min="1" max="999999" step="0.01" placeholder="Custom amount (CAD)"
                               class="w-full rounded-2xl border-2 border-brand-100 pl-9 pr-4 py-3.5 font-bold focus:outline-none focus:border-sun-400 bg-cream/40">
                    </div>
                    <input type="hidden" name="amount" id="amount-input" value="{{ $amounts[1] ?? 50 }}">

                    {{-- Donor info --}}
                    <div class="grid gap-3 mt-6">
                        <input name="name" type="text" placeholder="Your name (optional)" value="{{ old('name') }}"
                               class="w-full rounded-2xl border-2 border-brand-100 px-4 py-3 focus:outline-none focus:border-brand-400 bg-cream/40">
                        <input name="email" type="email" placeholder="Email for your receipt (optional)" value="{{ old('email') }}"
                               class="w-full rounded-2xl border-2 border-brand-100 px-4 py-3 focus:outline-none focus:border-brand-400 bg-cream/40">
                    </div>

                    <button type="submit" id="donate-btn"
                            class="mt-6 w-full bg-sun-400 hover:bg-sun-500 text-brand-900 font-extrabold text-lg py-4 rounded-full shadow-xl shadow-sun-400/30 transition hover:-translate-y-0.5">
                        Donate $<span id="btn-amount">{{ $amounts[1] ?? 50 }}</span> <span id="btn-freq"></span>
                    </button>

                    <div class="flex items-center justify-center gap-2 mt-5 text-sm text-ink/50">
                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M5 9V7a5 5 0 0110 0v2a2 2 0 012 2v5a2 2 0 01-2 2H5a2 2 0 01-2-2v-5a2 2 0 012-2zm8-2v2H7V7a3 3 0 016 0z" clip-rule="evenodd"/></svg>
                        Secure payment powered by <span class="font-bold text-[#635bff]">Stripe</span>
                    </div>
                    <p class="text-xs text-ink/40 text-center mt-3">Donations are processed in CAD. Tax-deductible as allowed by law.</p>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    const presets = document.querySelectorAll('.amount-preset');
    const custom = document.getElementById('custom-amount');
    const hidden = document.getElementById('amount-input');
    const btnAmount = document.getElementById('btn-amount');
    const btnFreq = document.getElementById('btn-freq');
    const monthlyNote = document.getElementById('monthly-note');

    function fmt(v) { return Number.isInteger(v) ? v : v.toFixed(2); }

    function setAmount(v) {
        hidden.value = v;
        btnAmount.textContent = fmt(v);
    }

    presets.forEach(r => r.addEventListener('change', () => {
        custom.value = '';
        setAmount(parseFloat(r.value));
    }));

    custom.addEventListener('input', () => {
        const v = parseFloat(custom.value);
        if (!isNaN(v) && v >= 1) {
            presets.forEach(r => r.checked = false);
            setAmount(v);
        }
    });

    document.querySelectorAll('input[name="frequency"]').forEach(r => {
        r.addEventListener('change', () => {
            const monthly = document.querySelector('input[name="frequency"]:checked').value === 'monthly';
            btnFreq.textContent = monthly ? '/month' : '';
            monthlyNote.classList.toggle('hidden', !monthly);
        });
    });
</script>
@endpush
