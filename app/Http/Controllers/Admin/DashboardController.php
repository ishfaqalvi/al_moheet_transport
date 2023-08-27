<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;
use App\Models\Client;
use App\Models\Statment;
use App\Models\Invoice;
use App\Models\Expense;
use DB;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $data['widgets'] = [
            Branch::count(),
            Client::count(),
            Statment::count(),
            Invoice::count()
        ];

        $data['monthlyExpenses'] = $this->getMonthlyExpense();

        $data['moneFlow'] = $this->getMoneyFlow();
        $data['clientPayments'] = $this->getClientPayments();
        
        return view('admin.dashboard', compact('data'));
    }

    /**
     * Get data from resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getMonthlyExpense()
    {
        $currentYear = date('Y');
        $monthlyData = array_fill_keys(range(1, 12), 0);

        $expensesData = DB::table('expenses')
            ->select(DB::raw('MONTH(date) as month'), DB::raw('SUM(amount) as total_amount'))
            ->whereYear('date', $currentYear)
            ->groupBy(DB::raw('MONTH(date)'))
            ->pluck('total_amount', 'month')
            ->all();
        $monthlyExpenses = array_values(array_replace($monthlyData, $expensesData));
        return $monthlyExpenses;
    }

    /**
     * Get data from resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getMoneyFlow()
    {
        $moneyFlow[] = Statment::sum('amount');
        $moneyFlow[] = Invoice::sum('amount');
        $moneyFlow[] = Expense::sum('amount');
        return $moneyFlow;
    }

    /**
     * Get data from resource.
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getClientPayments()
    {
        $clientPayments[] = Statment::sum('amount');
        $clientPayments[] = Invoice::sum('amount');
        return $clientPayments;
    }
}
