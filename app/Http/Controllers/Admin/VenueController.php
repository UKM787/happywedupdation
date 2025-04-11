<?php

namespace App\Http\Controllers\Admin;

use Exception;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryMaster;
use App\Http\Controllers\Controller;
use App\Models\Admin\LocationMaster;
use App\Models\Vendor\Service\Venue;

class VenueController extends Controller
{

    public $venues, $categories, $locations;

    public function __construct()
    {
        $this->venues = Venue::latest()->get();
        $this->locations = LocationMaster::orderBy('name', 'ASC')->pluck('id', 'name');
        $categories = CategoryMaster::latest()->whereNotNull('parent_id')->pluck('id', 'name');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $venues = Venue::with('location')->latest()->paginate(15);
        $categories = CategoryMaster::latest()->whereNotNull('parent_id')->pluck('name', 'id');
        $locations = LocationMaster::paginate(15);
        $loggedIn = auth()->guard('admin')->user();
        return view('admin.venues.index', compact('venues', 'loggedIn', 'categories', 'locations'))->with('i', (request()->input('page', 1) - 1) * 7);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loggedIn = auth()->guard('admin')->user();
        $locations = LocationMaster::pluck('id', 'name');
        $categories = CategoryMaster::latest()->whereNotNull('parent_id')->pluck('name', 'id');
        $venue = new Venue();
        return view('admin.venues.create', compact('loggedIn', 'locations', 'venue', 'categories'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $this->requestValidate($request);

        // $data['category_id'] = empty($data['category_id']) ? Null : $data['category_id'];
        $data['status'] = $request->input('status') == 'on' ? 1 : 0;
        $data['location_id'] = $request->locationmaster_id;
        $data['slug'] = Str::slug($request->name, '-', 'en') . '-' . rand(1, 10000);
        $admin = auth()->guard('admin')->user();

        if ($imageOne = $request->file('imageOne')) {
            $destinationPath = 'assets/venues';
            $locationImage = $data['slug'] . '-' . date('YmdHis') . "." . $imageOne->getClientOriginalExtension();
            $imageOne->move($destinationPath, $locationImage);
            $data['imageOne'] = "$locationImage";
        } else {
            $data['imageOne'] = 'venueDefault.png';
        }
        try {
            $admin->venues()->create($data);
            return redirect()->route('adminvenues.index')->with('success', "$request->name added successfully.");
        } catch (Exception $e) {
            return redirect()->back()->with([
                'status' => 'failure',
                'message' => $e->getMessage()
            ]);
        }

        return redirect()->back()->with(['status' => "added successfully"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Venue $venue)
    {
        $categories = CategoryMaster::latest()->whereNotNull('parent_id')->pluck('name', 'id');
        $loggedIn = auth()->guard('admin')->user();
        return view('admin.venues.show', compact('venue', 'venuecats', 'loggedIn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Venue $venue)
    {
        $loggedIn = auth()->guard('admin')->user();
        // $venue = Venue::findOrFail($id);
        $locations = LocationMaster::pluck('id', 'name');
        $venues = Venue::where('category_id', null)->get();
        $categories = CategoryMaster::latest()->whereNotNull('parent_id')->pluck('id', 'name');
        //dd($venues,$venuecats);
        return view('admin.venues.edit', compact('loggedIn', 'locations', 'categories', 'venues', 'venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Venue $venue, Request $request)
    {
        $data = $this->requestValidate($request);
        $data['category_id'] = empty($data['category_id']) ? null : $data['category_id'];
        $data['status'] = $request->input('status') == 'on' ? 1 : 0;
        // $data['locationmaster_id'] = $request->locationmaster_id;
        //$data['admin_id'] = auth()->guard('admin')->user()->id;
        $data['slug'] = Str::slug($request->description);
        if ($image = $request->file('imageOne')) {
            $destinationPath = 'assets/venues';
            $locationImage = $data['slug'] . '-' . date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $locationImage, 'public');
            $data['imageOne'] = "$locationImage";
        } else {
            unset($data['imageOne']);
        }
        $data['venueable_type'] = $venue->venueable_type;
        $data['venueable_id'] = $venue->venueable_id;
        //dd($data, $venue);
        try {
            $venue->update($data);
            return redirect()->route('adminvenues.index')
                ->with('success', 'New venue added successfully.');
        } catch (Exception $e) {
            return redirect()->back()->with([
                'status' => 'failure',
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();
        return redirect()->route('adminvenues.index')
            ->with('status', "$venue->name deleted successfully");
    }

    public function requestValidate(Request $request)
    {
        return $request->validate(
            [
                'name'          =>  ['required', 'string', 'min:3', 'max:255'],
                'description'   =>  ['required', 'string', 'min:3', 'max:1024'],
                'address'       =>  ['required', 'string', 'min:3', 'max : 255'],
                'longitude'     =>  ['required', 'string', 'min:3', 'max:20'],
                'latitude'      =>  ['required', 'string', 'min:3', 'max:20'],
                'map'           =>  ['sometimes', 'string'],
                'status'        =>  ['sometimes'],
                'priority'      =>  ['sometimes'],
                'icon'          =>  ['sometimes', 'string'],
                'category_id'   =>  ['sometimes'],
                'locationmaster_id'   =>  ['required'],
                'imageOne'      => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ],
            [
                'name.required' => 'Name of Hall is required',
                'description.required' => 'Name of Place Name is required & minimum 3 characters are required',
                'address.required' => 'Adress is required',
                'longitude.required' => 'enter logitude',
                'latitude.required' => 'enter latitude',
                'locationmaster_id.required' => 'City Name is required',
                'priority.required' => 'Choose prioirty'
            ]
        );
    }
}
