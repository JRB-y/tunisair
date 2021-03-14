<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function show($search, $id)
    {
        $type = Type::find($id);
        return view('frontend.search.index')
            ->with('search', $search)
            ->with('type', $type);
    }

    public function search(Request $request)
    {
        $model = app(ucfirst("App\Models\\" . $request->search));

        $search_type = intval($request->type_id);
        $search_query = $request->search_query;
        $search_adrs = $request->search_adrs;
        $doctor_speciality = $request->doctor_speciality;

        $results = $model->where('type_id', $search_type)->where(function($q) use ($search_query, $search_adrs) {
            if ($search_query !== null) {
                $q->where('name', 'like', '%' . $search_query . '%')
                    ->orWhere('name', 'like', '%' . $search_query . '%');
            }
            if ($search_adrs !== null) {
                $q->orWhere('address', 'like', '%' . $search_adrs . '%')
                ->orWhere('city', 'like', '%' . $search_adrs . '%');
            }
            return $q;
        });


        if ($search_type === 3 && $doctor_speciality) {
            $results->where('spec', 'like', '%' . $doctor_speciality . '%');
        }

        return redirect()->route('frontend.display.search', ['type' => $request->search, 'id' => $request->type_id])
            ->with('results', $results->get())
            ->with('search', $request->search)
            ->with('search_query', $request->search)
            ->with('type', Type::find($search_type));

    }
}
