<?php

namespace App\Generic\Traits;

use Illuminate\Support\Facades\File;

trait FileUpload
{
    /**
     * @param $image
     * @auther Nader Ahmed
     * @return string
     */
    public function imageUpload($image , $path):string
    {
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/'.$path);
        $image->move($destinationPath, $name);
        return '/uploads/'.$path . '/' . $name;
    }

    /**
     * @param string $path
     * @auther Nader Ahmed
     */
    public function removeImageFromDisk(string $path)
    {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }
}
