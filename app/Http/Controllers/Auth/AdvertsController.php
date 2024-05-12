<?php


namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Adverts; // Assuming your model name is UserX


class AdvertsController extends Controller
{
    public function display () {
        $items = Adverts::all();
        return view('lostitem', compact('items'));

    }
    public function index()
    {
        return view('register');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'found_lost' => 'required',
            'item_name' => 'required',
            'description' => 'required',
            'contact_number' => 'required',
            'location' => 'required',
            'photo' => 'required',



        ]);

        // Create a new user instance
        $user = new adverts(); // Adjust model name here
        $user->status = $request->found_lost;
        $user->identify_name = $request->item_name;
        $user->description = $request->description; // Hash the password for security
        $user->Contact_no = $request->contact_number;
        $user->location = $request->location;
        $user->addphoto = $request->photo;

        // Save the user to the database
        $user->save();

        // Redirect back to the page with a success message
        return redirect('/lostitem');

    }

    public function destroy($Post_ID)
    {
        $item = adverts::findOrFail($Post_ID);
        $item->delete();

        return redirect('/lostitem');
    }


}
