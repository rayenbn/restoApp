<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Table;
use Carbon\Carbon;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tables = table::paginate(10);

        return view('system-mgmt/tables/index', ['tables' => $tables]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system-mgmt/tables/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validateInput($request);
         table::create([
            'table_number' => $request['table_number'],
            'status' => $request['status']
        ]);

        return redirect()->intended('system-management/tables');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $table = table::find($id);
        // Redirect to tables list if updating table wasn't existed
        if ($table == null || count($table) == 0) {
            return redirect()->intended('/system-management/tables');
        }

        return view('system-mgmt/tables/edit', ['table' => $table]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = table::findOrFail($id);
        $input = [
            'table_number' => $request['table_number'],
            'status' => $request['status']
        ];
        $this->validate($request, [
        'status' => 'required'
        ]);
        table::where('id', $id)
            ->update($input);
        
        return redirect()->intended('system-management/tables');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        table::where('id', $id)->delete();
         return redirect()->intended('system-management/tables');
    }



    private function validateInput($request) {
        $this->validate($request, [
        'table_number' => 'required|max:5|unique:tables',
        'status' => 'required'
    ]);
    }


}