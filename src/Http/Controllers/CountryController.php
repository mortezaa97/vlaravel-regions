<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Http\Controllers;

use App\Http\Controllers\Controller;
use Mortezaa97\Regions\Models\Country;
use Illuminate\Http\Request;;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\DB;
use Mortezaa97\Regions\Http\Resources\CountryResource;
class CountryController extends Controller
{
    public function index()
    {
        Gate::authorize('viewAny', Country::class);
        return CountryResource::collection(Country::all());
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Country::class);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),419);
        }
        return new CountryResource($country);
    }

    public function show(Country $country)
    {
        Gate::authorize('view', $country);
        return new CountryResource($country);
    }

    public function update(Request $request, Country $country)
    {
        Gate::authorize('update', $country);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),419);
        }
        return new CountryResource($country);
    }

    public function destroy(Country $country)
    {
        Gate::authorize('delete', $country);
        try {
            DB::beginTransaction();
            DB::commit();
        } catch (\Exception $exception) {
            return response()->json($exception->getMessage(),419);
        }
        return response()->json("با موفقیت حذف شد");
    }
}
