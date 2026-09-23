<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\PackageCampaign;
use App\Models\TCategoria;
use App\Models\THotelDestino;
use App\Models\TPaquete;
use App\Models\TTeam;
use App\Models\TTestimonio;

class OfferController extends Controller
{
    public function show($packageSlug, $campaignSlug)
    {
        $paquete = TPaquete::where('url', $packageSlug)->firstOrFail();
        $campaign = PackageCampaign::where('package_id', $paquete->id)
            ->where('slug', $campaignSlug)
            ->firstOrFail();

        $now = now();
        abort_unless($campaign->is_active, 404);
        abort_if($campaign->starts_at && $now->lt($campaign->starts_at), 404);

        if ($campaign->ends_at && $now->gte($campaign->ends_at)) {
            return redirect()->route('packages.detail', ['paquete' => $paquete], 302);
        }

        // Match the data and pricing filter used by the standard package detail.
        $paquete->load([
            'precio_paquetes' => function ($query) {
                $query->where(function ($state) {
                    $state->where('estado', 1)->orWhereNull('estado');
                })->orderBy('estrellas');
            },
        ]);

        $testinomials = TTestimonio::all();
        $testinomials_r = TTestimonio::inRandomOrder()->limit(1)->get();
        $category = TCategoria::all();
        $hoteles_destinos = THotelDestino::all();
        $teams = TTeam::all();

        return view('page.offer', compact(
            'paquete', 'campaign', 'category', 'testinomials',
            'hoteles_destinos', 'testinomials_r', 'teams'
        ));
    }
}
