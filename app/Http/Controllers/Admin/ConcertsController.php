<?php

namespace App\Http\Controllers\Admin;

use App\Models\Conserts;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ConcertsRequest;
use App\Models\Concerts;
use Illuminate\Http\Request;
use illuminate\Support\Str;

class ConcertsController extends Controller
{
    public function index()
    {
        // to get all the tour packages
        $items = Concerts::all();

        return view('pages.admin.concerts.index', [
            'items' => $items

        ]);
    }
    public function create()
    {
        // return view to create a new tour package
        return view('pages.admin.concerts.create');
    }

    public function store(ConcertsRequest $request)
    {
        // to store the tour package
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        Concerts::create($data);
        return redirect()->route('concert.index');
    }

    public function edit($id)
    {
        $item = Concerts::findOrFail($id);
        return view('pages.admin.concerts.edit', [
            'item' => $item
        ]);
    }

    public function update(ConcertsRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Concerts::findOrFail($id);

        $item->update($data);

        return redirect()->route('concert.index');
    }

    public function destroy($id)
    {
        $item = Concerts::findOrFail($id);
        $item->delete();
        return redirect()->route('concert.index');
    }
}
