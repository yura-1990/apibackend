<?php

namespace App\Http\Controllers;

use App\Http\Resources\WorkerResource;
use App\Models\Worker;
use Illuminate\Http\Request;


class WorkerController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $workers = Worker::all();
        return response()->json([
            'status' => 'success',
            'workers' => $workers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $worker = Worker::create([
            'name' => $request->name,
            'email' => $request->email,
            'contact'=> $request->contact,
            'address'=> $request->address
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Worker created successfully',
            'worker' => $worker,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $worker = Worker::find($id);
        return response()->json([
            'status' => 'success',
            'worker' => $worker,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'contact' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $worker = Worker::find($id);
        $worker->name = $request->name;
        $worker->email = $request->email;
        $worker->contact = $request->contact;
        $worker->address = $request->address;
        $worker->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Worker updated successfully',
            'worker' => $worker,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        $worker->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Worker deleted successfully',
            'worker' => $worker,
        ]);
    }
}
