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

        // Resolve existing Packages by slug and use the exact approved commercial prices.
        // Only the Timeless Classic package is explicitly authorized for activation.
        $selection = [
            [
                'package_slug' => 'cusco-classic-rainbow-mountain',
                'original_price' => '1665.00',
                'offer_price' => '999.00',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => false,
            ],
            [
                'package_slug' => 'machu-picchu-timeless-classic-tour',
                'original_price' => '1998.33',
                'offer_price' => '1199.00',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => false,
                'activate_package' => true,
            ],
            [
                'package_slug' => 'inca-echoes-lake-titicaca-experience',
                'original_price' => '2165.00',
                'offer_price' => '1299.00',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => false,
            ],
            [
                'package_slug' => 'machu-picchu-and-rainbow-mountain-package',
                'original_price' => '4581.25',
                'offer_price' => '1832.50',
                'headline' => 'Peru Essentials - From Sacred Valley to Lake Titicaca',
                'super_deal' => true,
                'multi_country' => false,
            ],
            [
                'package_slug' => 'best-of-peru',
                'original_price' => '5783.33',
                'offer_price' => '2313.33',
                'headline' => null,
                'super_deal' => true,
                'multi_country' => false,
            ],
            [
                'package_slug' => 'andean-marvels-from-machupicchu-to-uyuni',
                'original_price' => '6872.93',
                'offer_price' => '2749.17',
                'headline' => null,
                'super_deal' => true,
                'multi_country' => true,
            ],
            [
                'package_slug' => '15-day-south-america-tour-machu-picchu-buenos-aires-perito-moreno-torres-del-paine',
                'original_price' => '8539.57',
                'offer_price' => '3415.83',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => true,
            ],
            [
                'package_slug' => 'machu-picchu-uyuni-atacama-adventure',
                'original_price' => '9164.57',
                'offer_price' => '3665.83',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => true,
            ],
            [
                'package_slug' => 'peru-argentina-brazil-epic-south-america-tour',
                'original_price' => '8247.93',
                'offer_price' => '3299.17',
                'headline' => null,
                'super_deal' => false,
                'multi_country' => true,
            ],
        ];

        // DATETIME values follow the application's UTC convention; commercial dates are Lima.
        $startsAt = CarbonImmutable::parse('2026-11-23 00:00:00', 'America/Lima')->setTimezone(config('app.timezone'));
        $endsAt = CarbonImmutable::parse('2026-11-27 23:59:59', 'America/Lima')->setTimezone(config('app.timezone'));

        DB::transaction(function () use ($selection, $startsAt, $endsAt) {
            foreach ($selection as $order => $offer) {
                $slug = $offer['package_slug'];
                $package = TPaquete::where('url', $slug)->lockForUpdate()->first();
                if (!$package) {
                    $this->command?->warn('SKIPPED_NOT_FOUND: ' . $slug);
                    continue;
                }

                if ((int) $package->estado === 0 && ($offer['activate_package'] ?? false)) {
                    $package->estado = 1;
                    $package->save();
                    $this->command?->line('ACTIVATED_PACKAGE: ' . $slug);
                }

                if ((int) $package->estado !== 1) {
                    $this->command?->warn('SKIPPED_INACTIVE: ' . $slug);
                    continue;
                }

                $campaign = PackageCampaign::updateOrCreate(
                    ['package_id' => $package->id, 'slug' => 'black-friday'],
                    [
                        'name' => 'Black Friday 2026',
                        'is_active' => true,
                        'starts_at' => $startsAt,
                        'ends_at' => $endsAt,
                        'headline' => $offer['headline'],
                        'subtitle' => null,
                        'hero_image' => null,
                        'offer_label' => 'BLACK FRIDAY',
                        'original_price' => $offer['original_price'],
                        'offer_price' => $offer['offer_price'],
                        'price_category' => null,
                        'cta_label' => 'Request a Quote',
                        'config' => [
                            'black_friday' => [
                                'collection_order' => $order + 1,
                                'super_deal' => $offer['super_deal'],
                                'multi_country' => $offer['multi_country'],
                            ],
                        ],
                    ]
                );

                $this->command?->line('Package ' . $package->id . ' | Campaign ' . $campaign->id . ' | ' . $slug . ' | US$' . $campaign->offer_price);
            }
        });
    }
}
