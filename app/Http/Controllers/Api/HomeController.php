<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\University;
use App\Models\College;
use App\Models\Course;
use App\Models\CMS;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
     // Fetch all published sliders
        $sliders = CMS::where('type', 'slider')
            ->where('status', 'published')
            ->get()
            ->map(function ($cms) {
                return [
                    'image'       => $cms->image_path,
                    'caption'     => $cms->title,
                    'sub_caption' => $cms->content,
                    'link'        => url('/' . $cms->slug),
                ];
            })
            ->toArray();

        return response()->json([
            'status'       => true,
            'message'      => 'Home data fetched successfully',
            'data' => [
                'sliders'      => $sliders,
                'universities' => University::take(4)->get(),
                'colleges'     => College::take(4)->get(),
                'courses'      => Course::take(4)->get(),
                'testimonials' => Testimonial::take(3)->get(),
            ]
        ]);
    }
}
