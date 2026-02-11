<?php

use Illuminate\Support\Facades\Storage;

if (! function_exists('media_url')) {
    /**
     * Generate public URL for storage file
     *
     * @param string|null $path
     * @return string
     */
    function media_url(?string $path): string
    {
        if (! $path) {
            return '';
        }

        return asset('storage/' . ltrim($path, '/'));
    }
}
