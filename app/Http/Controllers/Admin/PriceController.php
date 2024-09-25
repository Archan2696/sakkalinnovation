<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class PriceController extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function price_banner(){  

        $data['price_banner']=DB::table('banner')->where('page_name',"price")->get();

        return view('admin.price_banner',$data);
    }

    public function price_description(){

        $data['price_description']=DB::table('price_description')->get();

        return view('admin.price_description',$data);
    }

    public function update_price_description_data($id){
        
            $price_description=DB::table('price_description')->where('id',$id)->get();

            $data['id']=$price_description[0]->id;

            $data['title']=$price_description[0]->title;

            $data['description']=$price_description[0]->description;

        return view('admin.add_price_description_data',$data);
    }


    public function store_update_price_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

        DB::table('price_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/price_description')->with('error','data updated successfully!!');
        
    }






    public function monthly_price(){

        $data['monthly_price']=DB::table('monthly_price')->get();

        return view('admin.monthly_price',$data);
    }

    public function add_monthly_price_data($id){
        
        if($id==0){

            $data['title']='';
            $data['price']='';
            $data['features']=[];
            $data['id']=$id;
        }
        else{

            $monthly_price=DB::table('monthly_price')->where('id',$id)->get();

            $data['id']=$monthly_price[0]->id;

            $data['title']=$monthly_price[0]->title;
            $data['price']=$monthly_price[0]->price;
            $data['features']=json_decode($monthly_price[0]->features);
        }

        return view('admin.add_monthly_price_data',$data);
    }


    public function store_add_monthly_price_data(Request $request,$id){

            $validated=$request->validate([
                'title'=>'required',
                'price'=>'required',
                'feature'=>'required',
            ]);

            $price=$request->input('price');
            $title=$request->input('title');
            $feature=$request->input('feature');

            $features=[];

            if(!empty($feature)){
                $i=0;
                foreach($feature as $key=>$d){
                    $features[$i]['fes']=$feature[$key];
                    $i++;
                }

                $features=json_encode($features);
            }

            if($id ==0){

                DB::table('monthly_price')->insert(['title'=>$title,'price'=>$price,'features'=>$features]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('monthly_price')->where('id',$id)->update(['title'=>$title,'price'=>$price,'features'=>$features]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/monthly_price')->with('error',$message);
    }

    

    public function delete_monthly_price($id){

        DB::table('monthly_price')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }







    public function yearly_price(){

        $data['yearly_price']=DB::table('yearly_price')->get();

        return view('admin.yearly_price',$data);
    }

    public function add_yearly_price_data($id){
        
        if($id==0){

            $data['title']='';
            $data['price']='';
            $data['features']=[];
            $data['id']=$id;
        }
        else{

            $yearly_price=DB::table('yearly_price')->where('id',$id)->get();

            $data['id']=$yearly_price[0]->id;

            $data['title']=$yearly_price[0]->title;
            $data['price']=$yearly_price[0]->price;
            $data['features']=json_decode($yearly_price[0]->features);
        }

        return view('admin.add_yearly_price_data',$data);
    }


    public function store_add_yearly_price_data(Request $request,$id){

            $validated=$request->validate([
                'title'=>'required',
                'price'=>'required',
                'feature'=>'required',
            ]);

            $price=$request->input('price');
            $title=$request->input('title');
            $feature=$request->input('feature');

            $features=[];

            if(!empty($feature)){
                $i=0;
                foreach($feature as $key=>$d){
                    $features[$i]['fes']=$feature[$key];
                    $i++;
                }

                $features=json_encode($features);
            }

            if($id ==0){

                DB::table('yearly_price')->insert(['title'=>$title,'price'=>$price,'features'=>$features]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('yearly_price')->where('id',$id)->update(['title'=>$title,'price'=>$price,'features'=>$features]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/yearly_price')->with('error',$message);
    }

    

    public function delete_yearly_price($id){

        DB::table('yearly_price')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



    public function price_tab(){
        
        dd(11);

        $data['price_tab']=DB::table('price_tab')->get();

        return view('admin.price_tab',$data);
    }

    public function add_price_tab_data($id){
        
        if($id==0){

            $data['title']='';
            $data['id']=$id;
        }
        else{

            $price_tab=DB::table('price_tab')->where('id',$id)->get();

            $data['id']=$price_tab[0]->id;

            $data['title']=$price_tab[0]->title;
        }

        return view('admin.add_price_tab_data',$data);
    }


    public function store_add_price_tab_data(Request $request,$id){

            $validated=$request->validate([
                'title'=>'required',
            ]);

            $title=$request->input('title');

            $features=[];


            if($id ==0){

                DB::table('price_tab')->insert(['title'=>$title]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('price_tab')->where('id',$id)->update(['title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/price_tab')->with('error',$message);
    }

    

    public function delete_price_tab($id){

        DB::table('price_tab')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }





    

}
