<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\CoffeeMachine;
use Illuminate\Http\Request;
use App\Http\Requests\DrinkCreateRequest;
use Validator;

class CoffeeMachineController extends Controller
{
    public function index() {
        // tagasta kohvimasina vaade koos muutujatega
        $joogid = CoffeeMachine::orderBy('created_at', 'DESC')->get();
        $count = CoffeeMachine::count();
        return view('coffeeMachine.index', compact('count', 'joogid'));
    }

    public function decrement(CoffeeMachine $machine)
    {
        // vähenda joodavate topside arvu 1 võrra
        $machine->decrement('topsejuua');
        return redirect()->back();
    }

    public function admin()
    {
        // tagasta kohvimasina vaade muutujatega
        $joogid = CoffeeMachine::orderBy('created_at', 'DESC')->get();
        return view('coffeeMachine.admin', compact('joogid'));
    }

    public function create()
    {
        // saada kasutaja uue joogi lisamis-lehele
        return view('coffeeMachine.create');
    }

    public function store(DrinkCreateRequest $request)
    {
        // salvesta uus jook andmebaasi
        CoffeeMachine::create($request->all());
        return redirect(route('coffeeMachine.admin'))->with('message','Joogi lisamine õnnestus!');
    }

    public function increment(CoffeeMachine $machine)
    {
        // suurenda 'topsejuua' atribuuti 'topsepakis' võrra, kui ($topsejuua <= $topsepakis)
        $topsepakis = $machine->topsepakis;
        $topsejuua = $machine->topsejuua;
        if ($topsejuua <= $topsepakis) $machine->increment('topsejuua', $topsepakis);
        return redirect()->back();
    }

    public function delete(CoffeeMachine $machine)
    {
        // kustuta jook andmebaasist
        $machine->delete();
        $nimi = $machine->jooginimi;
        return redirect()->back()->with('message', '\''.$nimi.'\'' . ' eemaldati.');
    }
}
