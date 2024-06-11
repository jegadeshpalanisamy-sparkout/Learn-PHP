<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Http\Controllers\Controller;
use App\Models\CacheDemo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    //
    public function storetoDatabase($key, $value, $duration)
    {
        CacheDemo::create([
            'key' => $key,
            'value' => $value,
            'duration' => $duration,
        ]);
    }
    public function setCache()
    {

        $key = 'car';
        $value = "audii";
        $duration = 200;

        $result = $this->writeThrough($key, $value, $duration);
        echo $result;
    }

    public function writeThrough($key, $value, $duration)
    {

        Cache::put($key, $value, $duration);
        $k = Cache::get($key);
        if (!empty($k)) {
            $this->storetoDatabase($key, $value, $duration);
            return "Cache data was added successfully";
        } else {
            return "Cache data cannot added";
        }
    }


    //checking data retrival speed
    //return all 500 article with caching
    public function withCacheing()
    {
        
        return Cache::remember('articles', 60, function () {
            return Article::all();
        });
    }

    // Returns all 500 without Caching 
    public function allWithoutCache()
    {
        return Article::all();
    }
}
