<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use DB;

class Policycontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function privacy_banner(){  

        $data['privacy_banner']=DB::table('banner')->where('page_name',"privacy")->get();

        return view('admin.privacy_banner',$data);
    }

    public function terms_banner(){  

        $data['terms_banner']=DB::table('banner')->where('page_name',"terms")->get();

        return view('admin.terms_banner',$data);
    }

    public function privacy_policy(){

        $data['privacy_policy']=DB::table('privacy_policy')->get();

        return view('admin.privacy_policy',$data);
    }


    public function add_privacy_policy_data($id){
        
        if($id==0){

        $data['id']=$id;

        $data['title']='';

        $data['description']='';
        
        }
        else{
        
        $privacy_policy=DB::table('privacy_policy')->where('id',$id)->get();

        $data['id']=$privacy_policy[0]->id;

        $data['title']=$privacy_policy[0]->title;

        $data['description']=$privacy_policy[0]->description;
        }

        return view('admin.add_privacy_policy_data',$data);
    }


    public function store_add_privacy_policy_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        
        $description=$request->input('description');

            if($id==0){

                DB::table('privacy_policy')->insert(['title'=>$title,'description'=>$description]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('privacy_policy')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
            }
           

        return redirect('/admin/privacy_policy')->with('error','data updated successfully!!');
    }
    
    

    public function delete_privacy_policy($id){

        DB::table('privacy_policy')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }






    public function terms_condition(){

        $data['terms_condition']=DB::table('terms_condition')->get();

        return view('admin.terms_condition',$data);
    }


    public function add_terms_condition_data($id){
         
        if($id==0){

        $data['id']=$id;

        $data['title']='';

        $data['description']='';
        
        }
        else{
        
        $terms_condition=DB::table('terms_condition')->where('id',$id)->get();

        $data['id']=$terms_condition[0]->id;

        $data['title']=$terms_condition[0]->title;

        $data['description']=$terms_condition[0]->description;
        }

        return view('admin.add_terms_condition_data',$data);
    }


    public function store_add_terms_condition_data(Request $request,$id){
        
        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');


        if($id==0){

                DB::table('terms_condition')->insert(['title'=>$title,'description'=>$description]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('terms_condition')->where('id',$id)->update(['title'=>$title,'description'=>$description]);
                $message='data updated successfully!!';
            }
           
          


        return redirect('/admin/terms_condition')->with('error','data updated successfully!!');
    }
    
        

    public function delete_terms_condition($id){

        DB::table('terms_condition')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

}
