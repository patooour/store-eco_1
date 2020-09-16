<?php

define('PAGINATION_COUNT' , '10');

function getFolder(){
   return app()->getLocale() === 'ar' ? 'css-rtl' : 'css';
}
function saveImage($folder , $photo){
    $fileExtension = $photo->getClientOriginalExtension();
    $fileName = time() . '.'. $fileExtension;
    $path = base_path() . '/assets/images/'. $folder;
    $photo->move($path, $fileName);

     return 'assets/images/'. $folder .'/'.$fileName;

}

