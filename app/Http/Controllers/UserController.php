<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of Users.
     *
     * @return Response
     */
    public function index()
    {
        $users = User::all();

        return view('users', ['users' => $users]);
    }

    /**
     * Show the form for creating a new User.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('accordion-form');
    }

    /**
     * Store a newly created User in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        //Validation
        $validator = Validator::make($data, [
            'firstname' => 'required|string',
            'surname' => 'required|string',
            'phone' => 'required|numeric',
            'email' => 'required|email',
            'gender' => 'required|string|size:1',
            'birthday' => 'required|date',
            'comments' => 'required|string'
        ]);

        if($validator->fails()) {
            $res_message = '';
            $messages = $validator->messages();
            foreach ($messages->all() as $message)
                $res_message .= $message;
            return response()->json(['error' => true, 'message' => $res_message]);
        }
        else{
            //User Creation
            $user = User::create($data);
            if($user)
                return response()->json(['error' => false, 'message' => 'User created succesfully!.']);
            else
                return response()->json(['error' => true, 'message' => 'Unknown error. Please try again later.']);
        }
    }

    /**
     * Shows thanks view
     *
     * @return \Illuminate\View\View
     */
    public function thanks(){
        return view('thanks');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
