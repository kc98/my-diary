<?php

namespace App\Http\Controllers;

use App\Http\BaseResponse;
use App\Http\Requests\StoreDiaryRequest;
use App\Http\Requests\UpdateDiaryRequest;
use App\Models\Diary;
use Illuminate\Http\Request;

class DiaryController extends Controller
{
    public function index ()
    {
        if(Diary::all()->count() < 1) {
            return BaseResponse::fail('No diary', null, 404);
        }

        return BaseResponse::success(Diary::all());
    }

    public function store (StoreDiaryRequest $request)
    {
        Diary::create($request->validated());

        return BaseResponse::success();
    }

    public function show (Diary $diary)
    {
        return BaseResponse::success($diary);
    }

    public function update (Diary $diary, UpdateDiaryRequest $request)
    {
        $diary->update($request->validated());

        return BaseResponse::success();
    }

    public function destroy (Diary $diary)
    {
        $diary->delete();

        return BaseResponse::success();
    }
}
