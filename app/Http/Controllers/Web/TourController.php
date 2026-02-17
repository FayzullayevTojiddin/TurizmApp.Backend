<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Enums\Tour\MealPlanEnum;
use App\Enums\Tour\TourPackageStatusEnum;
use App\Models\TourPackage;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TourController extends Controller
{
    public function index(Request $request): View
    {
        $tours = TourPackage::query()
            ->where('status', TourPackageStatusEnum::Active)
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%' . $request->search . '%'))
            ->when($request->filled('meal_plan'), fn ($q) => $q->where('meal_plan', $request->meal_plan))
            ->when($request->filled('min_price'), fn ($q) => $q->where('base_price', '>=', $request->min_price))
            ->when($request->filled('max_price'), fn ($q) => $q->where('base_price', '<=', $request->max_price))
            ->when($request->filled('duration'), fn ($q) => $q->where('duration_days', $request->duration))
            ->when($request->filled('sort'), function ($q) use ($request) {
                return match ($request->sort) {
                    'price_asc' => $q->orderBy('base_price', 'asc'),
                    'price_desc' => $q->orderBy('base_price', 'desc'),
                    'duration' => $q->orderBy('duration_days', 'asc'),
                    'date' => $q->latest(),
                    default => $q->latest(),
                };
            }, fn ($q) => $q->latest())
            ->with('items')
            ->paginate(12)
            ->withQueryString();

        $mealPlans = MealPlanEnum::options();

        return view('tours.index', compact('tours', 'mealPlans'));
    }

    public function show(TourPackage $tourPackage): View
    {
        $tourPackage->load(['items' => fn ($q) => $q->orderBy('day_number')->orderBy('order')]);

        $relatedTours = TourPackage::query()
            ->where('status', TourPackageStatusEnum::Active)
            ->where('id', '!=', $tourPackage->id)
            ->inRandomOrder()
            ->take(4)
            ->get();

        return view('tours.show', compact('tourPackage', 'relatedTours'));
    }
}