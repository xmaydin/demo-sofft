<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Personnels;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $data = DB::table('personnels')->take(6)->orderBy('created_at')->pluck('salary');
        $data = DB::table('personnels')->take(6)->orderBy('created_at')->pluck('salary');
        $personel = Personnels::all();
        return view("admin.index", ['personel' => $personel, 'data' => $data]);
    }

    public function addNew()
    {
        return view('admin.addnew.index');
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->except('_token'), [
            'name' => 'required|unique:personnels',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required',
            'salary' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $all = $request->except('_token');

            $insert = Personnels::create([
                'name' => $all['name'],
                'position' => $all['position'],
                'age' => $all['age'],
                'office' => $all['office'],
                'salary' => $all['salary'],
            ]);

            if ($insert) {
                return redirect()->back()->with('status', 'Personel added Successfully');
            } else {
                return  redirect()->back()->with('status', 'There was a problem adding personel');
            }
        }
    }

    public function delete($id)
    {
        $count = Personnels::where(['id' => $id])->count();

        if ($count != 0) {
            $delete = Personnels::where(['id' => $id])->delete();

            if ($delete) {
                return redirect()->back()->with('status', 'Personel deleted Successfully');
            } else {
                return redirect()->back()->with('status', 'There was a problem deleting personel');
            }
        } else {
            return redirect('/admin');
        }

    }

    public function edit($id)
    {
        $personel   = Personnels::where(['id' => $id])->get();

        return view('admin.edit.index', ['personel' => $personel]);
    }

    public function update(Request $request)
    {

        $validate = Validator::make($request->except('_token'), [
            'name' => 'required|unique:personnels',
            'position' => 'required',
            'office' => 'required',
            'age' => 'required',
            'salary' => 'required|regex:/^\d+(\.\d{1,2})?$/'
        ]);

        if ($validate->fails()) {
            return redirect()->back()->withErrors($validate)->withInput();
        } else {
            $all = $request->except('_token');

            $update = Personnels::where(['id' => $request->route('id')])->update([
                'name' => $all['name'],
                'position' => $all['position'],
                'office' => $all['office'],
                'age' => $all['age'],
                'salary' => $all['salary']
            ]);

            if ($update) {
                return redirect()->back()->with('status', 'Personel updated Successfully');
            } else {
                return  redirect()->back()->with('status', 'There was a problem updating personel');
            }
        }

    }

}
