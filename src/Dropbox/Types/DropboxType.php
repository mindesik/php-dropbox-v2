<?php

namespace MisterPaladin\Dropbox\Types;

use Carbon\Carbon;

class DropboxType {
    public function __construct($attributes)
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, ['server_modified', 'client_modified'])) {
                $value = Carbon::parse($value);
            }
            
            $this->$key = $value;
        }
    }
}