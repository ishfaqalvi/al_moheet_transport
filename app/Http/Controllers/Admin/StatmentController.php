<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\Client;
use App\Models\Statment;
use Illuminate\Http\Request;

/**
 * Class StatmentController
 * @package App\Http\Controllers
 */
class StatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $client = Client::find($id);

        return view('admin.statment.index', compact('client'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $statment = Statment::create($request->all());

        return redirect()->back()->with('success', 'Statment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $statment = Statment::find($id);

        return view('admin.statment.print', compact('statment'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Statment $statment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Statment $statment)
    {
        $statment->update($request->all());

        return redirect()->back()->with('success', 'Statment updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $statment = Statment::find($id)->delete();

        return redirect()->back()->with('success', 'Statment deleted successfully');
    }
}
