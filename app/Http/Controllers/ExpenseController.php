<?php

namespace App\Http\Controllers;

use App\Models\expense;
use App\Models\expenseCategory;
use App\Models\expenseType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expenses = expense::orderBy('created_at', 'DESC')->get();
        return view('admin.expenses.index', compact('expenses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = expenseCategory::pluck('name','id');
        $types = expenseType::pluck('name','id');
        return view('admin.expenses.create', compact('categories','types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        expense::create([
            'entry_date' => date('Y-m-d' , strtotime($request->entry_date)),
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_categories_id' => $request->expense_categories_id,
            'expense_types_id' => $request->expense_types_id,
            'Created_by' => (Auth::user()->name),
            'user_id' => auth()->id()

        ]);
        return redirect()->route('admin.expenses.index')->with('message','Expense record created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(expense $expense , $id)
    {
        $expense = expense::find($id);
        $categories = expenseCategory::pluck('name','id');
        $types = expenseType::pluck('name','id');
        return view('admin.expenses.edit', compact('expense','categories','types'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, expense $expense, $id)
    {
        $expense = expense::find($id);
        $expense->update([
            'entry_date' => date('Y-m-d' , strtotime($request->entry_date)),
            'amount' => $request->amount,
            'description' => $request->description,
            'expense_categories_id' => $request->expense_categories_id,
            'expense_types_id' => $request->expense_types_id,
            'status' => $request->has('status'),
        ]);
        return redirect()->route('admin.expenses.index')->with('message','Expense record updated successfully ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $expense = expense::find($id);
        $expense->delete();
        return redirect()->route('admin.expenses.index')->with('error','Expense record deleted successfully ');
    }
    public function gettypes($id)
    {
        $types = DB::table("expense_types")->where("expense_categories_id", $id)->pluck("name", "id");
        return json_encode($types);
    }
}
