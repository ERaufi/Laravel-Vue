<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddTeacherRequest;
use App\Models\Teachers;
use Illuminate\Http\Request;

class TeachersController extends Controller
{
    //

    public function getData(Request $request)
    {
        $teachers = Teachers::query()
            ->when($request->name, function ($query) use ($request) {
                return $query->where('name', $request->name);
            })
            ->when($request->email, function ($query) use ($request) {
                return $query->where('email', $request->email);
            })
            ->when($request->phone, function ($query) use ($request) {
                return $query->where('phone', $request->phone);
            })
            ->when($request->salary, function ($query) use ($request) {
                return $query->where('salary', $request->salary);
            })
            ->paginate(10);

        return $teachers;
    }


    public function create(AddTeacherRequest $request)
    {
        $items = new Teachers();
        $items->name = $request->name;
        $items->email = $request->email;
        $items->phone = $request->phone;
        $items->salary = $request->salary;
        $items->save();

        return response()->json(['message' => 'Added Successfully'], 200);
    }

    public function delete($id)
    {
        Teachers::find($id)->delete();

        return response()->json(['message' => 'deleted Successfully'], 200);
    }

    public function getTeacher($id)
    {
        $item = Teachers::find($id);

        return $item;
    }

    public function update(Request $request, $id)
    {
        $items = Teachers::find($id);
        $items->name = $request->name;
        $items->email = $request->email;
        $items->phone = $request->phone;
        $items->salary = $request->salary;
        $items->update();

        return response()->json(['message' => 'succesfully Updated'], 200);
    }
}
