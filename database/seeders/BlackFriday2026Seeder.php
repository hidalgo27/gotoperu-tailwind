<?php

namespace Database\Seeders;

use App\Models\PackageCampaign;
use App\Models\TPaquete;
use Carbon\CarbonImmutable;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use RuntimeException;

class BlackFriday2026Seeder extends Seeder
{
    public function run()
    {
        if (!Schema::hasTable('package_campaigns')) {
            throw new RuntimeException('BLOCKED_CAMPAIGN_STORAGE: package_campaigns is not installed.');
        }

        // Approved commercial selection from Productos BLACK.xlsx. Resolve Packages by slug;
        // never create or activate products, and never change their regular prices.
        // Columns C (Precio antes) and E (Precio oferta), Hoja 1: use the exact workbook amounts.
        $selection = [
            ['machu-picchu-and-rainbow-mountain-package', '1832.50', 'Peru Essentials - From Sacred Valley to Lake Titicaca', '4581.25'],
            ['best-of-peru', '2313.33', null, '5783.33'],
            ['andean-marvels-from-machupicchu-to-uyuni', '2749.17', null, '6872.93'],
            ['15-day-south-america-tour-machu-picchu-buenos-aires-perito-moreno-torres-del-paine', '3415.83', null, '8539.57'],
            ['machu-picchu-uyuni-atacama-adventure', '3665.83', null, '9164.57'],
            ['peru-argentina-brazil-epic-south-america-tour', '3299.17', null, '8247.93'],
        ];

        // DATETIME values follow the application's UTC convention; commercial dates are Lima.
        $startsAt = CarbonImmutable::parse('2026-11-23 00:00:00', 'America/Lima')->setTimezone(config('app.timezone'));
        $endsAt = CarbonImmutable::parse('2026-11-27 23:59:59', 'America/Lima')->setTimezone(config('app.timezone'));

        DB::transaction(function () use ($selection, $startsAt, $endsAt) {
            foreach ($selection as $order => [$slug, $price, $headline, $originalPrice]) {
                $package = TPaquete::where('url', $slug)->lockForUpdate()->first();
                if (!$package || (int) $package->estado !== 1) {
                    $this->command?->warn(($package ? 'SKIPPED_INACTIVE' : 'SKIPPED_NOT_FOUND') . ': ' . $slug);
                    continue;
                }

                $campaign = PackageCampaign::updateOrCreate(
                    ['package_id' => $package->id, 'slug' => 'black-friday'],
                    [
                        'name' => 'Black Friday 2026',
                        'is_active' => true,
                        'starts_at' => $startsAt,
                        'ends_at' => $endsAt,
                        'headline' => $headline,
                        'subtitle' => null,
                        'hero_image' => null,
                        'offer_label' => 'BLACK FRIDAY',
                        'original_price' => $originalPrice,
                        'offer_price' => $price,
                        'price_category' => null,
                        'cta_label' => 'Request a Quote',
                        'config' => [
                            'black_friday' => [
                                'collection_order' => $order + 1,
                                'super_deal' => $order < 3,
                                'multi_country' => $order >= 2,
                            ],
                        ],
                    ]
                );

                $this->command?->line('Package ' . $package->id . ' | Campaign ' . $campaign->id . ' | ' . $slug . ' | US$' . $campaign->offer_price);
            }
        });
    }
}
