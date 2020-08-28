<?php


namespace App\Traits;



trait UploadTrait
{
    private function imageUpload($images, $imageColumn = null)
    {

        $uploadedImagens = [];

        if(is_array($images))
        {
            foreach($images as $image){
                $uploadedImagens[] = [$imageColumn => $image->store('products', 'public')];
            }
        } else {
            $uploadedImagens = $images->store('logo', 'public');
        }

        return $uploadedImagens;

    }
}
