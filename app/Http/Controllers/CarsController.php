<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
#use App\Rules\Uppercase;
use App\Http\Requests\CreateValidationRequest;

class CarsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Car::all();
       # $data = Car::where( 'name', '=', 'audi')->get(); #->findOrFail();
    //    $data = Car::all()->toJson();
    //    $data = Car::all()->toArray();
        return view('cars.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cars.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   # public function store(Request $request)
    public function store(CreateValidationRequest $request)
    {

         $request->validated();

        // $request->validate([
        //      'name' => 'required|unique:cars',
        //     # 'name' => new Uppercase,
        //     'founded' => 'required|integer|min:0|max:2021',
        //     'description' => 'required',
        // ]);

        // $car = new Car;
        // $car->name = $request->input('name');
        // $car->founded = $request->input('founded');
        // $car->description = $request->input('description');
        // $car->save();


        #IMAGE
        #guessExtension() || guessClientExtension
        #getClientMimeType() || getMimeType
        #store()
        #asStore()
        #storePulicly()
        #move()
        #getClientOriginalName();
        #getSize()
        #getError()
        #isValid()

        #$request = $request->file('image')->guessExtension();

        $newImageName = time(). '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'),$newImageName);

        #dd($newImageName);

        $car = Car::create([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description'),
            'image_path' => $newImageName,
            'user_id' => auth()->user()->id
        ]);



        return redirect('/cars');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);

        #$products = Product::find($id);

        return view('cars.show')->with('car',$car);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
       
        return view('cars.edit')->with('car',$car);

       // dd($car);
        #return view('cars.edit', compact('car'));
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
            'name' => 'required|unique:cars',
           # 'name' => new Uppercase,
           'founded' => 'required|integer|min:0|max:2021',
           'description' => 'required',
       ]);
        $car = Car::where('id',$id)->update([
            'name' => $request->input('name'),
            'founded' => $request->input('founded'),
            'description' => $request->input('description')
        ]);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
        $car->delete();

        return redirect('/cars');


    }
}
