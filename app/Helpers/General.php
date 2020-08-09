<?php

// Save Image In Database And Project
function uploadImage ($folder, $image) {
    $image->store('/', $folder);
    $filename = $image->hashName();
    $path = 'images/' . $folder . '/' . $filename;
    return $path;
}
