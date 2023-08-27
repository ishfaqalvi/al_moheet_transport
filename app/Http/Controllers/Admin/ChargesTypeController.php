<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\ChargesType;
use Illuminate\Http\Request;

/**
 * Class ChargesTypeController
 * @package App\Http\Controllers
 */
class ChargesTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $chargesTypes = ChargesType::get();

        return view('admin.charges-type.index', compact('chargesTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $chargesType = new ChargesType();
        return view('admin.charges-type.create', compact('chargesType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ChargesType::$rules);

        $chargesType = ChargesType::create($request->all());

        return redirect()->route('charges-types.index')
            ->with('success', 'ChargesType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $chargesType = ChargesType::find($id);

        return view('admin.charges-type.show', compact('chargesType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $chargesType = ChargesType::find($id);

        return view('admin.charges-type.edit', compact('chargesType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ChargesType $chargesType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChargesType $chargesType)
    {
        $chargesType->update($request->all());

        return redirect()->route('charges-types.index')
            ->with('success', 'ChargesType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $chargesType = ChargesType::find($id)->delete();

        return redirect()->route('charges-types.index')
            ->with('success', 'ChargesType deleted successfully');
    }
}
