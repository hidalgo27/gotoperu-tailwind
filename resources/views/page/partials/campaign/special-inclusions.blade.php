@if ($campaign && $campaignSpecialInclusions->isNotEmpty())
    @php
        $campaignIconTypes = [
            'flights' => 'heroicon-o-paper-airplane',
            'international_flights' => 'heroicon-o-paper-airplane',
            'hotels' => 'heroicon-o-office-building',
            'transfers' => 'heroicon-o-switch-horizontal',
            'guided_tours' => 'heroicon-o-map',
            'entrance_tickets' => 'heroicon-o-ticket',
        ];
    @endphp
    <section aria-labelledby="campaign-inclusions-title" class="bg-secondary/5">
        <div class="container">
            <div class="grid grid-cols-1 gap-8 py-10 lg:grid-cols-12 lg:gap-10 lg:py-12">
                <header class="border-l-2 border-secondary pl-5 lg:col-span-4">
                    @if (filled($campaign->offer_label))
                        <p class="mb-3 text-xs font-semibold uppercase tracking-wider text-primary">{{ $campaign->offer_label }}</p>
                    @endif
                    <h2 id="campaign-inclusions-title" class="text-2xl font-semibold leading-tight text-tertiary">Special offer includes</h2>
                    <p class="mt-3 text-sm leading-relaxed text-tertiary/70">These extras apply only to this offer. Standard package inclusions and exclusions follow below.</p>
                </header>
                <ul class="grid grid-cols-1 content-start gap-x-8 gap-y-6 lg:col-span-8 {{ $campaignSpecialInclusions->count() > 1 ? 'md:grid-cols-2' : '' }}">
                    @foreach ($campaignSpecialInclusions as $inclusion)
                        @php
                            $type = is_string($inclusion['type'] ?? null) ? $inclusion['type'] : '';
                            $icon = $campaignIconTypes[$type] ?? 'heroicon-o-check-circle';
                        @endphp
                        <li class="flex min-w-0 items-start gap-4">
                            {{ svg($icon, 'h-7 w-7 flex-shrink-0 text-primary', ['aria-hidden' => 'true']) }}
                            <div class="min-w-0 break-words">
                                <h3 class="text-base font-semibold leading-snug text-tertiary">{{ $inclusion['title'] }}</h3>
                                @if (is_string($inclusion['description'] ?? null) && trim($inclusion['description']) !== '')
                                    <p class="mt-2 text-sm leading-relaxed text-tertiary/70">{{ $inclusion['description'] }}</p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
