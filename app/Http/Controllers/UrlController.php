<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUrlRequest;
use App\Models\Url;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\RedirectResponse;

class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        $urls = Url::latest()->paginate(20);

        return view('pages.urls.index', compact('urls'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Renderable
     */
    public function create(): Renderable
    {
        return view('pages.urls.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateUrlRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(CreateUrlRequest $request): RedirectResponse
    {
        $validated = $request->validated();

        $url = Url::create($validated);

        return redirect(route('dashboard.urls.index'))->with(['success' => 'Ссылка успешно добавлена 🙂']);
    }

}
