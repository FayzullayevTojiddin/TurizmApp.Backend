<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Enums\Tour\TourStatusEnum;
use App\Models\MyTour;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class MyTourController extends Controller
{
    public function index(): View
    {
        $tours = MyTour::query()
            ->where('user_id', auth()->id())
            ->with('items')
            ->latest()
            ->paginate(10);

        return view('my-tours.index', compact('tours'));
    }

    public function create(): View
    {
        return view('my-tours.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'adults_count' => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'include_flight' => 'boolean',
            'include_transfer' => 'boolean',
            'include_insurance' => 'boolean',
            'special_requests' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*.type' => 'required|string',
            'items.*.title' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.day_number' => 'nullable|integer|min:1',
            'items.*.order' => 'nullable|integer|min:0',
            'items.*.meta_data' => 'nullable|array',
        ]);

        $tour = MyTour::create([
            ...$validated,
            'user_id' => auth()->id(),
            'children_count' => $validated['children_count'] ?? 0,
            'include_flight' => $validated['include_flight'] ?? false,
            'include_transfer' => $validated['include_transfer'] ?? false,
            'include_insurance' => $validated['include_insurance'] ?? false,
            'status' => TourStatusEnum::Draft,
        ]);

        if (!empty($validated['items'])) {
            foreach ($validated['items'] as $item) {
                $tour->items()->create($item);
            }
        }

        return redirect()
            ->route('my-tours.show', $tour)
            ->with('success', 'Tur muvaffaqiyatli yaratildi!');
    }

    public function show(MyTour $myTour): View
    {
        abort_unless($myTour->user_id === auth()->id(), 403);

        $myTour->load(['items' => fn ($q) => $q->orderBy('day_number')->orderBy('order')]);

        return view('my-tours.show', compact('myTour'));
    }

    public function edit(MyTour $myTour): View
    {
        abort_unless($myTour->user_id === auth()->id(), 403);
        abort_unless($myTour->status === TourStatusEnum::Draft, 403);

        $myTour->load('items');

        return view('my-tours.edit', compact('myTour'));
    }

    public function update(Request $request, MyTour $myTour): RedirectResponse
    {
        abort_unless($myTour->user_id === auth()->id(), 403);
        abort_unless($myTour->status === TourStatusEnum::Draft, 403);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'start_date' => 'required|date|after:today',
            'end_date' => 'required|date|after:start_date',
            'duration_days' => 'required|integer|min:1',
            'duration_nights' => 'required|integer|min:0',
            'adults_count' => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'include_flight' => 'boolean',
            'include_transfer' => 'boolean',
            'include_insurance' => 'boolean',
            'special_requests' => 'nullable|string',
            'items' => 'nullable|array',
            'items.*.type' => 'required|string',
            'items.*.title' => 'required|string|max:255',
            'items.*.description' => 'nullable|string',
            'items.*.day_number' => 'nullable|integer|min:1',
            'items.*.order' => 'nullable|integer|min:0',
            'items.*.meta_data' => 'nullable|array',
        ]);

        $myTour->update([
            ...$validated,
            'children_count' => $validated['children_count'] ?? 0,
            'include_flight' => $validated['include_flight'] ?? false,
            'include_transfer' => $validated['include_transfer'] ?? false,
            'include_insurance' => $validated['include_insurance'] ?? false,
        ]);

        if (isset($validated['items'])) {
            $myTour->items()->delete();
            foreach ($validated['items'] as $item) {
                $myTour->items()->create($item);
            }
        }

        return redirect()
            ->route('my-tours.show', $myTour)
            ->with('success', 'Tur muvaffaqiyatli yangilandi!');
    }

    public function destroy(MyTour $myTour): RedirectResponse
    {
        abort_unless($myTour->user_id === auth()->id(), 403);
        abort_unless(in_array($myTour->status, [TourStatusEnum::Draft, TourStatusEnum::Cancelled]), 403);

        $myTour->delete();

        return redirect()
            ->route('my-tours.index')
            ->with('success', 'Tur o\'chirildi!');
    }
}