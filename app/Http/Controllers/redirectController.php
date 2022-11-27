<?php

namespace App\Http\Controllers;

use App\Models\Url;
use Illuminate\Http\Request;

class redirectController extends Controller
{
    private Url $url;
    public function __construct()
    {
        $this->url = new Url();
    }
    public function redirect($page)
    {
        $query = $this->url->where('short',$page)->first();

        // if it does not exist on the database return 404
        if(!$query ?? true) return abort(404);

        // if it exists return redirect to url
        // TODO: collect analytics
        return redirect($query->long, 301);
    }
}
