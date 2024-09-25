<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Contactcontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    
     public function contact_banner(){  

        $data['contact_banner']=DB::table('banner')->where('page_name',"contact")->get();

        return view('admin.contact_banner',$data);
    }


    public function contact(){

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        return view('admin.contact',$data);
    }


    public function update_contact_description_data($id){
        
            $contact_description=DB::table('contact_description')->where('id',$id)->get();

            $data['id']=$contact_description[0]->id;
            $data['image']=$contact_description[0]->image;
            $data['name']=$contact_description[0]->name;
            $data['occupation']=$contact_description[0]->occupation;
            $data['phone']=$contact_description[0]->phone;
            $data['email']=$contact_description[0]->email;
            $data['website_link']=$contact_description[0]->website_link;
            $data['title']=$contact_description[0]->title;

        return view('admin.add_contact_description_data',$data);
    }


    public function store_update_contact_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'name'=>'required',
            'phone'=>'required',
            'occupation'=>'required',
            'email'=>'required',
            'website_link'=>'required',
        ]);


        $title=$request->input('title');

        $name=$request->input('name');

        $phone=$request->input('phone');

        $occupation=$request->input('occupation');

        $email=$request->input('email');

        $website_link=$request->input('website_link');
        
        $file=$request->file('image');

        $oldimage=$request->input('oldimage');

        $imagename='';

        if($file){

            $destination_path='uploads';

            $imagename=time().'_'.$file->getClientOriginalName();

            $file->move($destination_path,$imagename);

            if($oldimage){

                unlink(public_path('/uploads/'.$oldimage));
            }

            DB::table('contact_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('contact_description')->where('id',$id)->update(['title'=>$title,'name'=>$name,'phone'=>$phone,'occupation'=>$occupation,'email'=>$email,'website_link'=>$website_link]);

        return redirect('/admin/contact')->with('error','data updated successfully!!');
        
    }





    public function form_description(){

        $data['form_description']=DB::table('form_description')->get();

        return view('admin.form_description',$data);
    }


    public function add_form_description_data($id){
        
        if($id==0){

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $form_description=DB::table('form_description')->where('id',$id)->get();

            $data['id']=$form_description[0]->id;

            $data['description']=$form_description[0]->description;

        }

        return view('admin.add_form_description_data',$data);
    }


    public function store_add_form_description_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'description'=>'required',
                ]);
            }
            

            $description=$request->input('description');

            if($id ==0){

                DB::table('form_description')->insert(['description'=>$description]);
            }
            else{

                DB::table('form_description')->where('id',$id)->update(['description'=>$description]);
            }
            $message='data updated successfully!!';

            return redirect('/admin/form_description')->with('error',$message);
    }

    

    public function delete_form_description($id){

        $userdata=DB::table('form_description')->where('id',$id)->get();

        DB::table('form_description')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


     public function contact_info(){

        $data['contact_info']=DB::table('contact_info')->get();

        return view('admin.contact_info',$data);
    }


    public function add_contact_info_data($id){
        
        if($id==0){


            $data['image']='';

            $data['title']='';

            $data['info']='';

            $data['id']=$id;
        }
        else{

            $contact_info=DB::table('contact_info')->where('id',$id)->get();

            $data['id']=$contact_info[0]->id;


            $data['image']=$contact_info[0]->image;

            $data['title']=$contact_info[0]->title;

            $data['info']=$contact_info[0]->info;

        }

        return view('admin.add_contact_info_data',$data);
    }


    public function store_add_contact_info_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'info'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'info'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $info=$request->input('info');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('contact_info')->insert(['image'=>$imagename,'title'=>$title,'info'=>$info]);

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
                    DB::table('contact_info')->where('id',$id)->update(['image'=>$imagename,]);
                }
                  DB::table('contact_info')->where('id',$id)->update(['title'=>$title,'info'=>$info]);
                $message='data updated successfully!!';

            }

            $message='data updated successfully!!';

            return redirect('/admin/contact_info')->with('error',$message);
    }

    

    public function delete_contact_info($id){

        $userdata=DB::table('contact_info')->where('id',$id)->get();
        
         $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('contact_info')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
    
    
    
    
    public function contact_map(){

        $data['contact_map']=DB::table('contact_map')->get();

        return view('admin.contact_map',$data);
    }


    public function add_contact_map_data($id){
        
        if($id==0){

            $data['map_link']='';
            
            $data['title']='';

            $data['id']=$id;
        }
        else{

            $contact_map=DB::table('contact_map')->where('id',$id)->get();

            $data['id']=$contact_map[0]->id;

            $data['map_link']=$contact_map[0]->map_link;
            
            $data['title']=$contact_map[0]->title;

        }

        return view('admin.add_contact_map_data',$data);
    }


    public function store_add_contact_map_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'map_link'=>'required',
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'map_link'=>'required',
                    'title'=>'required',
                ]);
            }
            

            $map_link=$request->input('map_link');
            $title=$request->input('title');

            if($id ==0){

                DB::table('contact_map')->insert(['map_link'=>$map_link,'title'=>$title]);
            }
            else{

                DB::table('contact_map')->where('id',$id)->update(['map_link'=>$map_link,'title'=>$title]);
            }
            $message='data updated successfully!!';

            return redirect('/admin/contact_map')->with('error',$message);
    }
    



}
