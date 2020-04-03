<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\KeyWord;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\View\View;
use App\Enums\ItemStatus;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Factory|View
     */
    public function index()
    {
        if (request()->input('search_key')) {
            $terms = explode(' ', request()->input('search_key'));
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
            if (!empty($products)) {
                $key = KeyWord::where('search_key', $terms[0])->first();
                if (empty($key)) {
                    KeyWord::create([
                        'search_key' => $terms[0],
                        'frequency' => 1
                    ]);
                } else {
                    $key->update([
                        'frequency' => ($key->frequency + 1)
                    ]);
                }
            }
        } else {
            $products = Item::all();
        }

        return view('items.index', ['products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param Item $item
     * @return Factory|View
     */
    public function show(Item $item)
    {
        $status = ItemStatus::getKey($item->status);
        return view('items.show')->with([
            'item' => $item,
            'status' => $status,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
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
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
