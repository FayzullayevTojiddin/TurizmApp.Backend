<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\TourPackage;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function store(Request $request, TourPackage $tourPackage): RedirectResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'adults_count' => 'required|integer|min:1',
            'children_count' => 'nullable|integer|min:0',
            'notes' => 'nullable|string|max:1000',
        ]);

        $adultsCount = $validated['adults_count'];
        $totalPrice = $tourPackage->discountedPrice() * $adultsCount;

        Booking::create([
            'booking_number' => Booking::generateBookingNumber(),
            'user_id' => auth()->id(),
            'tour_package_id' => $tourPackage->id,
            'name' => $validated['name'],
            'phone' => $validated['phone'],
            'adults_count' => $adultsCount,
            'children_count' => $validated['children_count'] ?? 0,
            'notes' => $validated['notes'] ?? null,
            'total_price' => $totalPrice,
            'status' => 'pending',
        ]);

        return redirect()
            ->route('tours.show', $tourPackage)
            ->with('success', 'Buyurtmangiz qabul qilindi! Tez orada siz bilan bog\'lanamiz.');
    }
}