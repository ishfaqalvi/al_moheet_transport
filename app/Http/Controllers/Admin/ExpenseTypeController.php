<?php
namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;


use App\Models\ExpenseType;
use Illuminate\Http\Request;

/**
 * Class ExpenseTypeController
 * @package App\Http\Controllers
 */
class ExpenseTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenseTypes = ExpenseType::get();

        return view('admin.expense-type.index', compact('expenseTypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $expenseType = new ExpenseType();
        return view('admin.expense-type.create', compact('expenseType'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(ExpenseType::$rules);

        $expenseType = ExpenseType::create($request->all());

        return redirect()->route('expense-types.index')
            ->with('success', 'ExpenseType created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expenseType = ExpenseType::find($id);

        return view('admin.expense-type.show', compact('expenseType'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expenseType = ExpenseType::find($id);

        return view('admin.expense-type.edit', compact('expenseType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  ExpenseType $expenseType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpenseType $expenseType)
    {
        $expenseType->update($request->all());

        return redirect()->route('expense-types.index')
            ->with('success', 'ExpenseType updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $expenseType = ExpenseType::find($id)->delete();

        return redirect()->route('expense-types.index')
            ->with('success', 'ExpenseType deleted successfully');
    }
}
