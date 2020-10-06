<?php

namespace App\Http\Controllers\Manager;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\Country;
use App\Http\Requests\StoreCountry;
use App\Http\Requests\UpdateCountry;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $paginate = 5;
        if($request->search && $request->country == 0)
        {
            $datas = Country::where('name','LIKE','%'.$request->search.'%')->paginate($paginate);
        }
        else
        {
            $datas = Country::orderbyDesc('created_at')->paginate($paginate);
        }
        return view('manager.others.countries.index',['datas' => $datas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('manager.others.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCountry $request)
    {
        Country::create($request->all());
        return redirect()->route('manager.others.countries.index')->with('message','Đã thêm mới thành công.');     
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
        $country = Country::find($id);
        return view('manager.others.countries.edit',['country' => $country]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCountry $request, $id)
    {
        $data = Country::find($id)->update($request->all());
        return redirect()->route('manager.others.countries.index')->with('message','Đã cập nhật thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::find($id)->delete();
        return back()->with('message','Đã xóa thành công');
    }
}