<?php

namespace App\Http\Controllers;

use App\DataTables\ContactDataTable;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(ContactDataTable $datatable)
    {
        return $datatable->render('back.contact.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'message' => 'required',
            'company' => 'nullable',
            'phone' => 'required',
        ]);

        Contact::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
            'company' => $request->company,
            'phone' => $request->phone,
        ]);
        if($request){
            return response()->json(['message' => 'Contact Berhasil Di Tambahkan'], 200);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $contact = Contact::find($request->id);
        $contact->delete();
        if($contact){
            return response()->json(['message' => 'Contact Behasil Di hapus'], 200);
        }
        return response()->json(['message' => 'Contact not found'], 404);
    }
}
