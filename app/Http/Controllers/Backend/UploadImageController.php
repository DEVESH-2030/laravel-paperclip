<?php

namespace App\Http\Controllers\Backend;

use App\Models\UploadImage;
use Illuminate\Http\Request;
use App\Http\Requests\ImageRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\Storage;

class UploadImageController extends Controller
{
    /**
     * constructor 
     * @param  UploadImage $uploadImage
     */

    function __construct(UploadImage $uploadImage)
    {
        $this->uploadImage = $uploadImage;
        $this->view = '.backend.upload-image.';

    }

    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $getAllImages = $this->uploadImage
                                        ->orderBy('id', 'desc')
                                        ->paginate(config('services.pagination'));
        return view($this->view . 'index' , compact('getAllImages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view($this->view . 'create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            $file = $request->image;
            $upload = $this->uploadImage;
            if (empty(request()->image))
            {
                toastr()->warning('Please select image.');
            }
            elseif (request()->hasfile('image'))  
            {   
                try {
                    $fileName      = $file->getClientOriginalName();
                    $fileSize      = $file->getSize() / 1024;
                    $mimeType      = $file->getMimeType();
                    $fileExtension = $file->getClientOriginalExtension();
                } catch (\Throwable $th) {
                    return $th;
                }
    
                $minifiedName = md5(uniqid().File::extension($fileName)) . '.' . $fileExtension;
                $filePath     = uniqid() . '/' . config('filesystems.uploads.directory') . '/' . $minifiedName;
                $path     = uniqid() . '/' . config('filesystems.uploads.directory');
                $file->move(public_path('uploads/' . $path), $minifiedName);
                // Storage::disk('public')->put($filePath, file_get_contents($file), 'public');
                $upload->image = $path . '/' . $minifiedName;
                $upload->user_id = auth()->user()->id;
                $upload->save();
                toastr()->success('Image uploaded successfull.');
    
            } else {
                toastr()->error('An error has occurred please try again later.');
            }
            return back();
        } catch (\Throwable $th) {
            return $th->getMessage();
        }
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        #code ...
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit = $this->uploadImage->find($id);
        return view($this->view . 'edit', compact('edit'));
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
        $updateImage = $this->uploadImage->find($id);
        # update image
        if($updateImage) {
            $file = $request->file('image');
            $profile_image = $file->getClientOriginalName();
            $dir = uniqid() . $updateImage->id;
            $filePath = $dir . '/' . $profile_image;
            $storage = Storage::disk('public')->put($filePath, file_get_contents($file), 'public');
            $updateImage->image = $filePath;
            $updateImage->update();

            toastr()->success('Image updated successfull');
        } else {
            $filePath = $updateImage != null && $updateImage->image != '' ? $updateImage->image : '';
            toastr()->success('Thank you ');
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteImage = $this->uploadImage->find($id)->delete();
        if($deleteImage){
            toastr()->success('Image deleted successfull');
        } else {
            toastr()->error('Something went wrong !');
        }
        return back();
    }

}
