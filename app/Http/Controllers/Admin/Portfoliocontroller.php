<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Portfoliocontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    

     public function portfolio_banner(){  

        $data['portfolio_banner']=DB::table('banner')->where('page_name',"portfolio")->get();

        return view('admin.portfolio_banner',$data);
    }

    public function cta(){

        $data['cta']=DB::table('cta')->get();

        return view('admin.cta',$data);
    }


    public function add_cta_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $cta=DB::table('cta')->where('id',$id)->get();

            $data['id']=$cta[0]->id;

            $data['image']=$cta[0]->image;

            $data['title']=$cta[0]->title;

            $data['description']=$cta[0]->description;

        }

        return view('admin.add_cta_data',$data);
    }


    public function store_add_cta_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                     'title'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('cta')->insert(['image'=>$imagename,'description'=>$description,'title'=>$title,]);

                $message='data submitted successfully!!';
            }
            else{

                $filename=$request->file('image');
                $oldimage=$request->input('oldimage');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                    if($oldimage !=''){
                        unlink(public_path('/uploads/'.$oldimage));
                    }
                    DB::table('cta')->where('id',$id)->update(['image'=>$imagename,]);
                }


                DB::table('cta')->where('id',$id)->update(['description'=>$description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/cta')->with('error',$message);
    }

    

    public function delete_cta($id){

        $userdata=DB::table('cta')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('cta')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function portfolio(){

        $data['portfolio']=DB::table('portfolio')->get();

        $data['portfolio_description']=DB::table('portfolio_description')->get();

        $data['project_type']=DB::table('project_type')->get();

        return view('admin.portfolio',$data);
    }


    public function update_portfolio_description_data($id){
        
            $portfolio_description=DB::table('portfolio_description')->where('id',$id)->get();

            $data['id']=$portfolio_description[0]->id;

            $data['title']=$portfolio_description[0]->title;

            $data['description']=$portfolio_description[0]->description;

        return view('admin.add_portfolio_description_data',$data);
    }


    public function store_update_portfolio_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',

        ]);

        $title=$request->input('title');
        $description=$request->input('description');

    
        DB::table('portfolio_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/portfolio')->with('error','data updated successfully!!');
        
    }


    public function add_portfolio_data($id){

        $data['category_data']=DB::table('project_type')->get();

        if($id==0){

            $data['name']='';

            $data['image']='';

            $data['link']='';

            $data['category']='';

            $data['id']=$id;
        }
        else{

            $portfolio=DB::table('portfolio')->where('id',$id)->get();

            $data['id']=$portfolio[0]->id;

            $data['name']=$portfolio[0]->name;

            $data['image']=$portfolio[0]->image;

            $data['category']=$portfolio[0]->category;

            $data['link']=$portfolio[0]->link;

        }


        return view('admin.add_portfolio_data',$data);
    }


    public function store_add_portfolio_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'name'=>'required',
                    'category'=>'required',
                    'link'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'name'=>'required',
                    'category'=>'required',
                    'link'=>'required',
                ]);
            }
            

            $name=$request->input('name');
            $category=$request->input('category');
            $link=$request->input('link');

            if($id ==0){

                $filename1=$request->file('image');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                DB::table('portfolio')->insert(['image'=>$imagename1,'category'=>$category,'name'=>$name,]);

                $message='data submitted successfully!!';
            }
            else{

                $filename1=$request->file('image');
                $oldimage1=$request->input('oldimage1');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                    if($oldimage1 !=''){
                        unlink(public_path('/uploads/'.$oldimage1));
                    }
                    DB::table('portfolio')->where('id',$id)->update(['image'=>$imagename1,]);
                }

                DB::table('portfolio')->where('id',$id)->update(['category'=>$category,'name'=>$name,'link'=>$link]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/portfolio')->with('error',$message);
    }

    

    public function delete_portfolio($id){

        $userdata=DB::table('portfolio')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('portfolio')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


}
