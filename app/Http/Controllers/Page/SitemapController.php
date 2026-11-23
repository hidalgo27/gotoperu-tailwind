<?php

namespace App\Http\Controllers\Page;

use App\Http\Controllers\Controller;
use App\Models\TCategoria;
use App\Models\TDestino;
use App\Models\THotel;
use App\Models\TPaquete;
use App\Models\TPost;
use Illuminate\Support\Facades\Route;

class SitemapController extends Controller
{
    public function index()
    {
        // Resolve web actions directly: packages.detail also exists in the API.
        $webRoutes = collect(Route::getRoutes()->getRoutes())
            ->filter(function ($route) {
                return in_array('web', $route->middleware(), true)
                    && in_array('GET', $route->methods(), true);
            })
            ->keyBy(function ($route) {
                return $route->getActionName();
            });

        $urls = collect();
        $addUrl = function ($action, array $parameters = []) use ($webRoutes, $urls) {
            $route = $webRoutes->get(HomeController::class . '@' . $action);
            if (!$route) {
                return;
            }

            $path = $route->uri();
            foreach ($parameters as $parameter => $slug) {
                if (!is_string($slug) || trim($slug) === ''
                    || strpbrk($slug, '/?#\\') !== false
                    || preg_match('/[\x00-\x1F\x7F]/', $slug)) {
                    return;
                }

                $path = str_replace('{' . $parameter . '}', rawurlencode($slug), $path);
            }

            if (strpos($path, '{') !== false) {
                return;
            }

            $urls->push('https://gotoperu.com/' . ltrim($path, '/'));
        };

        $packages = TPaquete::where('estado', 1)->orderBy('id')->get(['url', 'is_p_t']);

        // The public blog includes legacy NULL states; keep them visible here too.
        $articles = TPost::where(function ($query) {
            $query->where('estado', 1)->orWhereNull('estado');
        })
            ->whereHas('categoria')
            ->orderBy('id')
            ->get(['url']);

        $categories = TCategoria::where(function ($query) {
            $query->where('estado', 1)->orWhereNull('estado');
        })
            ->whereHas('paquetes', function ($query) {
                $query->where('estado', 1);
            })
            ->orderBy('id')
            ->get(['url']);

        $destinations = TDestino::where('estado', 1)
            ->whereIn('url', ['machu-picchu', 'puno'])
            ->orderBy('id')
            ->get(['url']);

        foreach (['index', 'packages', 'about', 'reviews'] as $action) {
            $addUrl($action);
        }

        if ($destinations->isNotEmpty()) {
            $addUrl('destinations');
        }
        if ($packages->contains('is_p_t', 0)) {
            $addUrl('tours');
        }
        if ($articles->isNotEmpty()) {
            $addUrl('blog');
        }
        if ($categories->isNotEmpty()) {
            $addUrl('category');
        }
        if (THotel::exists()) {
            $addUrl('hotels');
        }

        foreach ($packages as $package) {
            $addUrl('packages_detail', ['paquete' => $package->url]);
        }
        foreach ($articles as $article) {
            $addUrl('blog_show', ['post' => $article->url]);
        }
        foreach ($categories as $category) {
            $addUrl('category_show', ['categories' => $category->url]);
        }
        foreach ($destinations as $destination) {
            $addUrl('destinations_show', ['destinations' => $destination->url]);
        }

        return response()->view('sitemap', ['urls' => $urls->unique()->values()], 200, [
            'Content-Type' => 'application/xml; charset=UTF-8',
        ]);
    }
}
