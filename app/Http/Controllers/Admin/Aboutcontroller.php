<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Aboutcontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }

    public function about_banner(){  

        $data['about_banner']=DB::table('banner')->where('page_name',"about")->get();

        return view('admin.about_banner',$data);
    }

     public function about(){

        $data['about']=DB::table('about')->get();

        return view('admin.about',$data);
    }


    public function add_about_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['link']='';

            $data['id']=$id;
        }
        else{

            $about=DB::table('about')->where('id',$id)->get();

            $data['id']=$about[0]->id;

            $data['image']=$about[0]->image;

            $data['title']=$about[0]->title;

            $data['description']=$about[0]->description;

            $data['link']=$about[0]->link;

        }

        return view('admin.add_about_data',$data);
    }


    public function store_add_about_data(Request $request,$id){

        
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
            $link=$request->input('link');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('about')->insert(['image'=>$imagename,'description'=>$description,'title'=>$title,'linkedin_url'=>$linkedin_url,]);

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
                    DB::table('about')->where('id',$id)->update(['image'=>$imagename,]);
                }


                DB::table('about')->where('id',$id)->update(['description'=>$description,'title'=>$title,'link'=>$link,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about')->with('error',$message);
    }

    

    public function delete_about($id){

        $userdata=DB::table('about')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

    public function choose_us(){

        $data['choose_us']=DB::table('choose_us')->get();

        $data['choose_us_description']=DB::table('choose_us_description')->get();

        return view('admin.choose_us',$data);
    }


    public function update_choose_us_description_data($id){
        
            $choose_us_description=DB::table('choose_us_description')->where('id',$id)->get();

            $data['id']=$choose_us_description[0]->id;

            $data['title']=$choose_us_description[0]->title;

            $data['description']=$choose_us_description[0]->description;

        return view('admin.add_choose_us_description_data',$data);
    }


    public function store_update_choose_us_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('choose_us_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/choose_us')->with('error','data updated successfully!!');
        
    }


    public function add_choose_us_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $choose_us=DB::table('choose_us')->where('id',$id)->get();

            $data['id']=$choose_us[0]->id;

            $data['image']=$choose_us[0]->image;

            $data['title']=$choose_us[0]->title;

            $data['description']=$choose_us[0]->description;
        }

        return view('admin.add_choose_us_data',$data);
    }


    public function store_add_choose_us_data(Request $request,$id){

        
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

                DB::table('choose_us')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('choose_us')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('choose_us')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/choose_us')->with('error',$message);
    }

    

    public function delete_choose_us($id){

        $userdata=DB::table('choose_us')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('choose_us')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



     public function about_service(){

        $data['about_service']=DB::table('about_service')->get();

        return view('admin.about_service',$data);
    }


    public function add_about_service_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $about_service=DB::table('about_service')->where('id',$id)->get();

            $data['id']=$about_service[0]->id;

            $data['image']=$about_service[0]->image;

            $data['title']=$about_service[0]->title;

            $data['description']=$about_service[0]->description;

        }

        return view('admin.add_about_service_data',$data);
    }


    public function store_add_about_service_data(Request $request,$id){

        
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

                DB::table('about_service')->insert(['image'=>$imagename,'description'=>$description,'title'=>$title,]);

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
                    DB::table('about_service')->where('id',$id)->update(['image'=>$imagename,]);
                }


                DB::table('about_service')->where('id',$id)->update(['description'=>$description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/about_service')->with('error',$message);
    }

    

    public function delete_about_service($id){

        $userdata=DB::table('about_service')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('about_service')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


}
