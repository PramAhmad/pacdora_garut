<?php

namespace App\Http\Controllers;

use App\DataTables\TemplateUserDataTable;
use App\Models\Template;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class TemplateUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(TemplateUserDataTable $dataTable)
    {
        return $dataTable->render('back.template.index');
        
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
        // dd($request->all());
        $request->validate([
            'name' => 'required',
            'image' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',

        ],[
            'name.required' => 'Nama harus diisi',
            'image.required' => 'Gambar harus diisi',
            'image.file' => 'File harus berupa gambar',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar jpeg, png, jpg',
            'image.max' => 'File gambar maksimal 2MB',
            
        ]);
       

        $image = $request->file('image');
        $image_name = time()."_".$image->getClientOriginalName();
        $image->move(public_path('upload/temp'),$image_name);

        Template::create([
            'name' => $request->name,
            'image' => $image_name,
        ]);
        if($request->ajax()){
            return response()->json(['message' => 'Template created'], 200);
        }
        return redirect()->back()->with('success','Template created');

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
        $data = Template::find($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
    
        $request->validate([
            'name' => 'required',
            'image' => 'nullable|file|image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'name.required' => 'Nama harus diisi',
            'image.file' => 'File harus berupa gambar',
            'image.image' => 'File harus berupa gambar',
            'image.mimes' => 'File harus berupa gambar jpeg, png, jpg',
            'image.max' => 'File gambar maksimal 2MB',
        ]);

        $template = Template::find($id);
        if($request->hasFile('image')){
            $image = $request->file('image');
            $image_name = time()."_".$image->getClientOriginalName();
            $image->move(public_path('upload/temp'),$image_name);
            $template->update([
                'name' => $request->name,
                'image' => $image_name,
            ]);
        }else{
            $template->update([
                'name' => $request->name,
            ]);
        }
        if($request->ajax()){
            return response()->json(['message' => 'Template updated'], 200);
        }
        return redirect()->back()->with('success','Template updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $template = Template::find($id);
        $template->delete();
        if($template){
            return response()->json(['message' => 'Template deleted'], 200);
        }
        return response()->json(['message' => 'Template not found'], 404);  
    }

    public function select()
    {
        $data['templates'] = Template::paginate(10);
        return view('front.template.select',$data);
    }
    // select store
    public function selectStore(Request $request)
    {
        
        $request->validate([
            'template_id' => 'required',
        ],[
            'template_id.required' => 'Template harus dipilih',
        ]);

        
        $template = Template::whereIn('id',$request->template_id)->get(['image','name']);
        json_encode($template);
        $data = [
            'imgs' => [],
            'userId' => hashId(Auth::user()->id), 
        ];
        foreach ($template as $key => $value) {
            $data['imgs'][] = [
                'url' => asset('upload/temp/'.$value->image),
                'name' => $value->name,
            ];
        }   
        json_encode($data);
       
     
       $post = Http::withHeaders([
            'appId' => '71ee73045e3480fe',
            'appKey' => 'a3e831ccfa3ffd84',
        ])->post('https://api.pacdora.com/open/v1/upload/img', $data);
    
           
        return response()->json(['message' => 'Template selected'], 200);
    }
}
