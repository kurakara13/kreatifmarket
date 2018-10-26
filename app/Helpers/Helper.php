<?php

function set_active($uri, $output = 'active', $sub_output = 'active-submenu')
{
 if( is_array($uri) ) {
   foreach ($uri as $u) {
     if (Route::is($u)) {
       return $sub_output;
     }
   }
 } else {
   if (Route::is($uri)){
     return $output;
   }
 }
}


 ?>
