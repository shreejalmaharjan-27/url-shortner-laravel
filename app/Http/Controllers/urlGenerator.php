<?php

namespace App\Http\Controllers;

use App\Helpers\Url;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class urlGenerator extends Controller
{
    private $ug;
    public function __construct()
    {
        $this->ug = new Url();
    }
    public function generate(Request $r)
    {
        $request = $r->post();

        try {
            if (($request['customShortUrl'] ?? false)) {
                if (!$r->bearerToken() ?? true) {
                    throw new Exception("You need to be logged in to make custom URL");
                }

                $customShortUrl = $request['customShortUrl'];
            }

            if (Auth::user() ?? false) $user = Auth::user()->id;
            $shortURL = $this->ug->generate($request['url'], $customShortUrl ?? null, $user ?? null);
            $data = [
                'shortUrl' => $shortURL,
                'longUrl' => $request['url']
            ];
        }catch (Exception $e) {
            $error = $e->getMessage();
        }

        return response([
            'data' => $data ?? null,
            'error' => ($error ?? false) ? $error : false
        ], ($data ?? false) ? 200 : 412);
    }
}
