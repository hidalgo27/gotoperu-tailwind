@if ($campaign && $campaignHighlights->isNotEmpty())
    @php
        $campaignIconTypes = [
            'flights' => 'heroicon-o-paper-airplane',
            'international_flights' => 'heroicon-o-paper-airplane',
            'hotels' => 'heroicon-o-office-building',
            'transfers' => 'heroicon-o-switch-horizontal',
            'guided_tours' => 'heroicon-o-map',
            'entrance_tickets' => 'heroicon-o-ticket',
        ];
        $highlightCount = $campaignHighlights->count();
        $highlightColumns = $highlightCount >= 4
            ? ($highlightCount % 3 === 0 ? 'lg:grid-cols-3' : 'lg:grid-cols-4')
            : ($highlightCount === 3 ? 'lg:grid-cols-3' : ($highlightCount === 2 ? 'lg:grid-cols-2' : 'lg:grid-cols-1'));
    @endphp
    <section aria-labelledby="campaign-highlights-title" class="bg-white">
        <div class="container">
            <div class="border-b border-primary/15 py-8 lg:py-10">
                <h2 id="campaign-highlights-title" class="flex items-center gap-3 text-xs font-semibold uppercase tracking-wider text-tertiary">
                    <span aria-hidden="true" class="inline-flex items-center gap-1"><span class="h-2.5 w-1 bg-secondary"></span><span class="h-2.5 w-3 bg-secondary"></span><span class="h-2.5 w-5 bg-secondary"></span></span>
                    Why this offer
                </h2>
                <ul class="mt-6 grid grid-cols-1 gap-x-8 gap-y-6 sm:grid-cols-2 {{ $highlightColumns }}">
                    @foreach ($campaignHighlights as $highlight)
                        @php
                            $type = is_string($highlight['type'] ?? null) ? $highlight['type'] : '';
                            $icon = $campaignIconTypes[$type] ?? 'heroicon-o-check-circle';
                        @endphp
                        <li class="flex min-w-0 items-start gap-4">
                            {{ svg($icon, 'h-7 w-7 flex-shrink-0 text-primary', ['aria-hidden' => 'true']) }}
                            <div class="min-w-0 break-words">
                                <h3 class="text-base font-semibold leading-snug text-tertiary">{{ $highlight['title'] }}</h3>
                                @if (is_string($highlight['text'] ?? null) && trim($highlight['text']) !== '')
                                    <p class="mt-2 text-sm leading-relaxed text-tertiary/70">{{ $highlight['text'] }}</p>
                                @endif
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </section>
@endif
