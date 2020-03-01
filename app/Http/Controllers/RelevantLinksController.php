<?php

namespace App\Http\Controllers;

use App\Http\Requests\RelevantLinksRequest;
use App\RelevantLink;
use Carbon\Carbon;
use Illuminate\Http\Request;

class RelevantLinksController extends Controller
{
    public function index()
    {
        $relevant_links = RelevantLink::all()->sortByDesc('updated_at');
        return view('admin.relevant_links.index', ['relevant_links' => $relevant_links]);
    }

    public function store(RelevantLinksRequest $request)
    {
        try {
            if ($request->has('expires') && !empty($request->expires)) {
                $request->merge([
                    'expires' => new Carbon($request->expires)
                ]);
            }
            $relevant_link = RelevantLink::create($request->all());
            $relevant_link->save();

            return redirect()->route('admin.relevant_links.index');
        } catch (\Exception $ex) {
            abort(500, 'Kunne ikke opprette lenkee');
        }

        return back();
    }

    public function delete($id)
    {
        try {
            $link = RelevantLink::find($id);
            if (is_null($link)) {
                abort(404, 'Link not found');
            }

            $link->delete();
        } catch (\Exception $ex) {
            abort(500, 'Kunne ikke slette aktuell lenkee');
        }

        return response('ok');
    }

    public static function active()
    {
        return RelevantLink::where(function ($query) {
            $query->where('expires', '>=', date("Y-m-d"))->orWhereNull('expires');
        })->get()->sortByDesc('updated_at');
    }
}
