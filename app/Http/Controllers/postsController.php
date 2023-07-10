<?php

namespace App\Http\Controllers;

use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Posts::orderBy('id','desc')->get();

        if ($posts) {
            return response()->json([
                'message' => 'success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'error',
            ]);
        }
    }

    public function indexPagination()
    {
        $posts = Posts::orderBy('id','desc')->paginate(2);

        if ($posts) {
            return response()->json([
                'message' => 'success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'error',
            ]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'category'     => 'required',
            'description'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $posts = new Posts();
        $posts->title = $request->title;
        $posts->category = $request->category;
        $posts->description = $request->description;
        $posts->save();

        if ($posts) {
            return response()->json([
                'message' => 'create data success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'create data error !',
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Posts::find($id);

        if ($posts) {
            return response()->json([
                'message' => 'detail data success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'data not found !',
            ]);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title'     => 'required',
            'category'     => 'required',
            'description'   => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        $posts = Posts::find($id);
        $posts->title = $request->title;
        $posts->category = $request->category;
        $posts->description = $request->description;
        $posts->save();

        if ($posts) {
            return response()->json([
                'message' => 'update data success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'update data error or posts record no found !',
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $posts = Posts::find($id);

        if ($posts) {
            $posts->delete();
            return response()->json([
                'message' => 'delete data success',
                'data' => $posts
            ]);
        } else {
            return response()->json([
                'message' => 'delete data error or posts record no found !',
            ]);
        }
    }
}
