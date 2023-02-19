<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;

use Illuminate\Http\Request;


class LocalizationController extends Controller
{
    /**
     * @param $locale
     * @return RedirectResponse
     */
    public function index($locale)
    {
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
