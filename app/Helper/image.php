<?php




    function imageUpload($file, $orginalPath ){
        $time = time();
        $filename = str_replace(" ","",$file->GetClientOriginalName());
        $db_path = $orginalPath.$time. $filename;
        $ImageUpload = \Image::make($file);

        $imageCanvas = \Image::canvas(250, 250, '#ff0000');
        $thumbnailPath = public_path('/thumbnail/'.$orginalPath);
        $originalPath = public_path( $orginalPath);

        if(!\File::isDirectory($originalPath)){
            \File::makeDirectory($originalPath, 0777, true, true);
        }

        $ImageUpload->save($originalPath.$time. $filename);

        // for save thumnail image
        if(!\File::isDirectory($thumbnailPath)){

            \File::makeDirectory($thumbnailPath, 0777, true, true);

        }
        $ImageUpload->resize(250, 250, function ($constraint){
            $constraint->aspectRatio();
        });
        $ImageUpload->resizeCanvas(250, 250, 'center', false, 'fff');
        $ImageUpload = $ImageUpload->save($thumbnailPath.$time. $filename);
        return $db_path;
    }










?>
