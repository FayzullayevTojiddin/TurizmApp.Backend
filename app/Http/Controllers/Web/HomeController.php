<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Enums\Tour\TourPackageStatusEnum;
use App\Models\TourPackage;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $featuredTours = TourPackage::query()
            ->where('status', TourPackageStatusEnum::Active)
            ->where('featured', true)
            ->with('items')
            ->latest()
            ->take(6)
            ->get();

        $latestTours = TourPackage::query()
            ->where('status', TourPackageStatusEnum::Active)
            ->with('items')
            ->latest()
            ->take(8)
            ->get();

        return view('home', compact('featuredTours', 'latestTours'));
    }
}