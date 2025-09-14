<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Regions\Models\County;
use Mortezaa97\Regions\Models\Province;

class CountyController extends Controller
{
    public function index(Request $request, ?Province $province = null)
    {
        $items = new County;

        if ($request->conditions) {
            $items = $items->where(json_decode($request->conditions, true));
        }

        if ($request->with) {
            $items = $items->with($request->with);
        }

        if ($province) {
            $items = $items->where('province_id', $province->id);
        }

        return $request->noPaginate ? $items->get() : $items->paginate();
    }

    public function store(Request $request)
    {
        Gate::authorize('create', County::class);
        try {
            DB::beginTransaction();
            $item = new County;
            $data = $request->all();
            $data['created_by'] = Auth::user()->id;
            $county = $item->create($data);
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return $county;
    }

    public function show(County $county)
    {
        return $county;
    }

    public function update(Request $request, County $county)
    {
        Gate::authorize('update', $county);
        try {
            DB::beginTransaction();
            $data = $request->all();
            $data['updated_by'] = Auth::user()->id;
            $county->update($data);
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return $county;
    }

    public function destroy(County $county)
    {
        Gate::authorize('delete', $county);
        try {
            DB::beginTransaction();
            $county->delete();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return response()->json('با موفقیت حذف شد');
    }
}
