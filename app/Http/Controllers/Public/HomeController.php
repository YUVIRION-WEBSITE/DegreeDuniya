<?php

namespace App\Http\Controllers\Public;

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

        // Debugging purpose — you can remove this once verified
        // dd($sliders);

        return view('public.home', [
            'sliders'      => $sliders,
            'universities' => University::take(3)->get(),
            'colleges'     => College::take(3)->get(),
            'courses'      => Course::take(3)->get(),
            'testimonials' => Testimonial::take(5)->get(),
        ]);
    }
}
