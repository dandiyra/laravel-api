<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Carbon\Carbon;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Laravel\Passport\Token;

class MovieController extends Controller
{
    public $successStatus = 200;

    public function show(Request $request)
    {
        $filters = $request->all();
        return Movie::when(isset($filters['movieId']), function ($query) use ($filters) {
            return $query->where('id', $filters['movieId']);
        })->orderBy('id', 'ASC')->get();
    }

    public function store(Request $request)
    {
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'rating' => $request->rating,
            'image' => $request->image,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ];
        try {
            DB::beginTransaction();
            $response = Movie::create($data);

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function update(Request $request)
    {
        try {
            $data = [
                'title' => $request->title,
                'description' => $request->description,
                'rating' => $request->rating,
                'image' => $request->image,
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ];
            DB::beginTransaction();
            Movie::where('id', $request->id)->update($data);
            $response = Movie::where('id', $request->id)->first();

            DB::commit();
            return response([
                'status' => 'success',
                'message' => $response
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }

    public function getById(Request $request)
    {
        $filters = $request->all();
        return Movie::when(isset($filters['id']), function ($query) use ($filters) {
            return $query->where('id', $filters['id'])->orWhere('id', 'like', '%' . $filters['id'] . '%');
        })->get();
    }

    public function destroy(Request $request)
    {
        try {
            DB::beginTransaction();
            Movie::where('id', $request->id)->delete();

            DB::commit();
            return response([
                'status' => 'success',
            ], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response([
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
