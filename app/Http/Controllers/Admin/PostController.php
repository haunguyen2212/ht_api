<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StorePostRequest;
use App\Http\Requests\Admin\UpdatePostRequest;
use App\Repositories\PostRepository;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    protected PostRepository $post;
    private $name;

    public function __construct(
        PostRepository $postRepository
    )
    {
        $this->post = $postRepository;
        $this->name = __('common.post');
    }

    public function index(){
        return $this->post->orderBy('updated_at', 'desc')->paginate(config('constants.PAGINATION_DEFAULT'));
    }

    public function store(StorePostRequest $request){
        try{
            $data = $request->all();
            DB::beginTransaction();
            $store = $this->post->create($data);
            DB::commit();
            return response()->json(['data' => $store, 'message' => __('message.create_successful', ['name' => $this->name])]);
        }catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => $e->getMessage()], 500);
        }    
    }

    public function update(UpdatePostRequest $request, $id){
        try{
            $data = $request->all();
            DB::beginTransaction();
            $update = $this->post->update($data, $id);
            DB::commit();
            return response()->json(['data' => $update, 'message' => __('message.update_successful', ['name' => $this->name])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }
    }

    public function destroy($ids){
        try{
            DB::beginTransaction();
            $ids = explode(',', $ids);
            $this->post->withoutTrashed()->whereIn('id', $ids)->delete();
            DB::commit();
            return response()->json(['message' => __('message.delete_successful', ['name' => $this->name])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }
    }

    public function restore($ids){
        try{
            DB::beginTransaction();
            $ids = explode(',', $ids);
            $this->post->onlyTrashed()->whereIn('id', $ids)->restore();
            DB::commit();
            return response()->json(['message' => __('message.restore_successful', ['name' => $this->name])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }
    }

    public function forceDelete($ids){
        try{
            $ids = explode(',', $ids);
            DB::beginTransaction();
            $this->post->onlyTrashed()->whereIn('id', $ids)->forceDelete();
            DB::commit();
            return response()->json(['message' => __('message.delete_successful', ['name' => $this->name])]);
        }
        catch(\Exception $e){
            DB::rollBack();
            return response()->json(['message' => __('message.system_error')], 500);
        }

    }

}
