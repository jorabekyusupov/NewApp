<?php

namespace App\Traits;

trait FileUpload
{
    public function fileUpload($data)
    {
        $file = $data['image'];
        $name = uniqid('diyorbek', true) . '.' . $file->getClientOriginalExtension();
        $file->move(storage_path('/app/public/images'), $name);
        $data['image'] = $name;
        return $data;

    }
}
