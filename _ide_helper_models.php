<?php

// @formatter:off
// phpcs:ignoreFile
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property int $duration_days
 * @property int $duration_nights
 * @property int $adults_count
 * @property int $children_count
 * @property bool $include_flight
 * @property bool $include_transfer
 * @property bool $include_insurance
 * @property string|null $special_requests
 * @property numeric $estimated_price
 * @property numeric|null $final_price
 * @property \App\Enums\Tour\TourStatusEnum $status
 * @property string|null $manager_notes
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $attractions
 * @property-read int|null $attractions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $destinations
 * @property-read int|null $destinations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $hotels
 * @property-read int|null $hotels_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $restaurants
 * @property-read int|null $restaurants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\MyTourItem> $transports
 * @property-read int|null $transports_count
 * @property-read \App\Models\User $user
 * @method static \Database\Factories\MyTourFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereAdultsCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereChildrenCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereDurationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereDurationNights($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereEstimatedPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereFinalPrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereIncludeFlight($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereIncludeInsurance($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereIncludeTransfer($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereManagerNotes($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereSpecialRequests($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTour whereUserId($value)
 */
	class MyTour extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $my_tour_id
 * @property \App\Enums\Tour\TourItemTypeEnum $type
 * @property string $title
 * @property string|null $description
 * @property int|null $day_number
 * @property int $order
 * @property array<array-key, mixed>|null $meta_data
 * @property string|null $cover_image
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\MyTour $myTour
 * @method static \Database\Factories\MyTourItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereDayNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereMetaData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereMyTourId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|MyTourItem whereUpdatedAt($value)
 */
	class MyTourItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $description
 * @property int $duration_days
 * @property int $duration_nights
 * @property \Illuminate\Support\Carbon $start_date
 * @property \Illuminate\Support\Carbon $end_date
 * @property numeric $base_price
 * @property int $discount_percent
 * @property int $max_people
 * @property int $min_people
 * @property array<array-key, mixed>|null $included_services
 * @property array<array-key, mixed>|null $excluded_services
 * @property \App\Enums\Tour\MealPlanEnum|null $meal_plan
 * @property \App\Enums\Tour\TourPackageStatusEnum $status
 * @property bool $featured
 * @property string|null $cover_image
 * @property array<array-key, mixed>|null $gallery
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $activities
 * @property-read int|null $activities_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $attractions
 * @property-read int|null $attractions_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $destinations
 * @property-read int|null $destinations_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $hotels
 * @property-read int|null $hotels_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $items
 * @property-read int|null $items_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $restaurants
 * @property-read int|null $restaurants_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\TourPackageItem> $transports
 * @property-read int|null $transports_count
 * @method static \Database\Factories\TourPackageFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereBasePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereDiscountPercent($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereDurationDays($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereDurationNights($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereEndDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereExcludedServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereFeatured($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereIncludedServices($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereMaxPeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereMealPlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereMinPeople($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereSlug($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereStartDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackage whereUpdatedAt($value)
 */
	class TourPackage extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property int $tour_package_id
 * @property \App\Enums\Tour\TourItemTypeEnum $type
 * @property string $title
 * @property string|null $description
 * @property int|null $day_number
 * @property int $order
 * @property array<array-key, mixed>|null $meta_data
 * @property string|null $cover_image
 * @property array<array-key, mixed>|null $gallery
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\TourPackage $tourPackage
 * @method static \Database\Factories\TourPackageItemFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereCoverImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereDayNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereGallery($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereMetaData($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereTourPackageId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|TourPackageItem whereUpdatedAt($value)
 */
	class TourPackageItem extends \Eloquent {}
}

namespace App\Models{
/**
 * @property int $id
 * @property bool $is_active
 * @property string|null $avatar
 * @property string $role
 * @property string $name
 * @property string $email
 * @property string $password
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User query()
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereIsActive($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder<static>|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

