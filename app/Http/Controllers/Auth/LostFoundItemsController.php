<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;

class LostFoundItemsController extends Controller
{
    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'User added successfully.');
    }
}
