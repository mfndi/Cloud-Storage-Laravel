<?php
namespace App\Helpers;
// {{-- 
//     ############################
//     #Jangan Hilangkan Copyright :) 
//     #Author : Efendi (Fecore)
//     ############################
// --}}
class ByteForHuman
{
    function readableBytes($bytes) {
        $i = floor(log($bytes) / log(1024));
        $sizes = array('B', 'KB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB');
    
        return sprintf('%.02F', $bytes / pow(1024, $i)) * 1 . ' ' . $sizes[$i];
    }
}