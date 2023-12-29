<?php

namespace App\Http\Controllers;

use App\Models\Service;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.service.index',[
            'services'=>Service::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.service.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validateData = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload
        if ($request->file('image')) {
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/service/'), $imageName);

            // Add the image name to the validated data
            $validateData['image'] = $imageName;
        }

        // Store data in the database
        Service::create($validateData);

        // Redirect with success message
        return Redirect::route('services.index')->withSuccess('service has been created!');


    }
    /**
     * status change the specified resource.
     */
    public function status(Service $service){
        //the status between 0 and 1
        $service->status = $service->status == 0 ? 1 : 0;

        // Save the updated status to the database
        $service->save();

        // Redirect back with a success message
        return back()->withSuccess('change status');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        return view('admin.service.edit',[
            'service'=>$service
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Service $service)
    {
         // Validate the incoming request data
         $validateData = $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        // Handle image upload if a new image is provided
        if ($request->file('image')) {
             // Delete the old image file if it exists
            if ($service->image) {
                $oldImagePath = public_path('uploads/service/' . $service->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $image = $request->file('image');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/service/'), $imageName);

            // Add the image name to the validated data
            $validateData['image'] = $imageName;
        }

        // Update data in the database
        $service->update($validateData);

        // Redirect with success message
        return Redirect::route('services.index')->withSuccess('service has been created!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        // Check if the service has a photo
        if($service->image){
            $imagePath = public_path('uploads/service/' . $service->image);

             // Check if the file exists before attempting to delete it
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }

        // Delete the service record
        $service->delete();

        // Redirect back with a success message
        return back()->with('success','Service deleted successfully');
    }
}
