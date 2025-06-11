<?php

namespace Modules\Service\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use App\Models\Item;
use App\Models\Speed;

class ServiceController extends Controller
{
    public function speed()
    {
        $data = Speed::all();
        return view('service::speed.speed', ['data' => $data]);
    }

    public function item()
    {
        $data = Item::all();
        return view('service::item.item', ['data' => $data]);
    }

    public function create_speed()
    {
        return view('service::speed.create');
    }

    public function create_item(){
        return view('service::item.create');
    }

    public function store_speed(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);
        Speed::create([
            'name' => $request->name,
            'duration_hours' => $request->duration,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('speed')->with('success', 'Speed '.$request->name.' added');
    }

    public function store_item(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit_type' => 'required',
            'price' => 'required|numeric',
        ]);
        Item::create([
            'name' => $request->name,
            'unit_type' => $request->unit_type,
            'price' => $request->price,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect()->route('item')->with('success', 'Item '.$request->name.' added');
    }

    public function edit_speed($speed_id)
    {
        $data = Speed::find($speed_id);
        return view('service::speed.edit', ['data' => $data]);
    }

    public function edit_item($item_id)
    {
        $data = Item::find($item_id);
        return view('service::item.edit', ['data' => $data]);
    }

    public function update_speed(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'duration' => 'required|numeric',
            'price' => 'required|numeric',
        ]);

        $speed = Speed::Find($request->speed_id);
        $speed->name = $request->name;
        $speed->duration_hours = $request->duration;
        $speed->price = $request->price;
        $speed->updated_at = now();
        $speed->save();

        return redirect()->route('speed')->with('success', "Speed data changed");
    }

    public function update_item(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'unit_type' => 'required',
            'price' => 'required|numeric',
        ]);

        $item = Item::Find($request->item_id);
        $item->name = $request->name;
        $item->unit_type = $request->unit_type;
        $item->price = $request->price;
        $item->updated_at = now();
        $item->save();

        return redirect()->route('item')->with('success', "Item data changed");
    }

    public function delete_speed($speed_id)
    {
        $speed = Speed::find($speed_id)->name;
        Speed::destroy($speed_id);
        return redirect()->route('speed')->with('success', $speed.' deleted');
    }

    public function delete_item($item_id)
    {
        $item = Item::find($item_id)->name;
        Item::destroy($item_id);
        return redirect()->route('item')->with('success', $item.' deleted');
    }
}
