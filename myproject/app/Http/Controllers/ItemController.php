<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $products = Item::where('item_type_id', 2)->get();

        if (!empty($_GET['key_search'])) {
            $terms = explode(" ", $_GET['key_search']);

            $products = Item::query()
//            ->whereHas('items', function ($query) use ($terms) {
//                foreach ($terms as $term) {
//                    // Loop over the terms and do a search for each.
//                    $query->where('name', 'like', '%' . $term . '%');
//                }
//            })
                ->where(function ($query) use ($terms) {
                    foreach ($terms as $term) {
                        $query->where('name', 'like', '%' . $term . '%');
                    }
                })
                ->get();
        } else {
            $products = Item::all();
        }

        return view('items.index', ['products' => $products]);
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
