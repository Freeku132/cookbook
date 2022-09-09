<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;



class AnnouncementsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcement = Announcement::first();

        abort_if(!$announcement->isActive, 404);

        return view('announcement', [
            'announcement' => $announcement
        ]);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $announcement = Announcement::first();


        return view('edit-announcement', [
            'announcement' => $announcement
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $fields = $request->validate([
            'isActive' => 'required',
            'bannerText' => 'required',
            'bannerColor' => 'required',
            'titleText' => 'required',
            'titleColor' => 'required',
            'content' => 'required',
            'buttonText' => 'required',
            'buttonColor' => 'required',
            'buttonLink' => 'required|url',
            'imageUpload' => 'file|image|max:20000',
            'imageUploadFilePond' => 'string|nullable',
        ]);

        if ($request->imageUpload) {
            $requestImage = $request->file('imageUpload');

            $image = Image::make($requestImage)->resize(600, null, function ($constraint){
                $constraint->aspectRatio();
                $constraint->upsize();
            } );
//            $path = $request->file('imageUpload')->store('images', 'public');
       //     $path = $image->store('images', 'public');

            $path = config('filesystems.disks.public.root').'/'.$requestImage->hashName();

            $image->save($path, 100,'png');

            $fields = array_merge($fields, ['imageUpload' => $requestImage->hashName()]);
        }

        if ($request->imageUploadFilePond){
            $newFileName = Str::after($request->imageUploadFilePond, 'tmp/');
            Storage::disk('public')->move($request->imageUploadFilePond, "images/$newFileName");
            $fields = array_merge($fields, ['imageUploadFilePond' => "images/$newFileName"]);

        }

//        $announcement = Announcement::first();
//        $announcement->update($fields);

         Announcement::first()->update($fields);


        return back()->with('success_message', 'Announcement was updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
