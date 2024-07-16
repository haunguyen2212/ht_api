<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCategoryRequest;
use App\Http\Requests\Admin\UpdateCategoryRequest;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    protected CategoryRepository $category;

    public function __construct(
        CategoryRepository $categoryRepository
    )
    {
        $this->category = $categoryRepository;
    }

    public function index(){
        return $this->category->orderBy('updated_at', 'desc')->paginate(config('constants.PAGINATION_DEFAULT'));
    }

    public function store(StoreCategoryRequest $request){
        try{
            $data = $request->all();
            DB::beginTransaction();
            $store = $this->category->create($data);
            DB::commit();
            return response()->json(['data' => $store, 'message' => __('message.create_successful', ['name' => 'danh mục'])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }
    }

    public function update(UpdateCategoryRequest $request, $id){
        try{
            $data = $request->all();
            DB::beginTransaction();
            $update = $this->category->update($data, $id);
            DB::commit();
            return response()->json(['data' => $update, 'message' => __('message.update_successful', ['name' => 'danh mục'])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }
    }


}
