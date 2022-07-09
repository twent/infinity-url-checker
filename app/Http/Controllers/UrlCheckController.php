<?php

namespace App\Http\Controllers;

use App\Models\UrlCheck;
use Illuminate\Contracts\Support\Renderable;

class UrlCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $urlChecks = UrlCheck::with('url')->latest()->paginate(20);;

        return view('pages.url-checks.index', compact('urlChecks'));
    }

}
