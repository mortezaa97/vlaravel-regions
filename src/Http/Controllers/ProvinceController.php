<?php

declare(strict_types=1);

namespace Mortezaa97\Regions\Http\Controllers;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Mortezaa97\Regions\Models\Province;

class ProvinceController extends Controller
{
    protected $model;

    public function index(Request $request)
    {
        $items = new Province;

        if ($request->conditions) {
            $items = $items->where(json_decode($request->conditions, true));
        }

        if ($request->with) {
            $items = $items->with($request->with);
        }

        return $request->noPaginate ? $items->get() : $items->paginate();
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Province::class);
        try {
            DB::beginTransaction();
            $item = new Province;
            $data = $request->all();
            $data['created_by'] = Auth::user()->id;
            $province = $item->create($data);

            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return $province;
    }

    public function show(Province $province)
    {
        return $province;
    }

    public function update(Request $request, Province $province)
    {
        Gate::authorize('update', $province);
        try {
            DB::beginTransaction();
            $data = $request->all();
            //            $data['updated_by'] = Auth::user()->id;
            $province->update($data);

            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return $province;
    }

    public function destroy(Province $province)
    {
        Gate::authorize('delete', $province);
        try {
            DB::beginTransaction();
            $province->delete();
            DB::commit();
        } catch (Exception $exception) {
            return response()->json($exception->getMessage(), 419);
        }

        return response()->json('با موفقیت حذف شد');
    }
}
