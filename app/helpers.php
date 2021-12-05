<?php

function size($path){
  $size =filesize($path);
  if ($size >= 1073741824) {
    $fileSize = round($size / 1024 / 1024 / 1024,1) . 'GB';
  } elseif ($size >= 1048576) {
      $fileSize = round($size / 1024 / 1024,1) . 'MB';
  } elseif($size >= 1024) {
      $fileSize = round($size / 1024,1) . 'KB';
  } else {
      $fileSize = $size . ' bytes';
  }
  return $fileSize;
}