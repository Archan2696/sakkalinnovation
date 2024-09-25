<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class HeaderFootercontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    
     public function footer_description(){

        $data['footer_description']=DB::table('footer_description')->get();

        return view('admin.footer_description',$data);
    }


    public function add_footer_description_data($id){
        
        if($id==0){

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $footer_description=DB::table('footer_description')->where('id',$id)->get();

            $data['id']=$footer_description[0]->id;

            $data['title']=$footer_description[0]->title;

            $data['description']=$footer_description[0]->description;

        }

        return view('admin.add_footer_description_data',$data);
    }


    public function store_add_footer_description_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
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

                DB::table('footer_description')->insert(['description'=>$description,'title'=>$title,]);

                $message='data submitted successfully!!';
            }
            else{

                DB::table('footer_description')->where('id',$id)->update(['description'=>$description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/footer_description')->with('error',$message);
    }

    

    public function delete_footer_description($id){

        $userdata=DB::table('footer_description')->where('id',$id)->get();

        DB::table('footer_description')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



     public function add_banner_data($id){
        
        if($id==0){

            $data['image']='';

            $data['page_name']='';

            $data['page_title']='';

            $data['id']=$id;
        }
        else{

            $banner=DB::table('banner')->where('id',$id)->get();

            $data['id']=$banner[0]->id;

            $data['image']=$banner[0]->image;

            $data['page_name']=$banner[0]->page_name;

            $data['page_title']=$banner[0]->page_title;

        }

        return view('admin.add_banner_data',$data);
    }


    public function store_add_banner_data(Request $request,$id){

         if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'page_name'=>'required',
                    'page_title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'page_name'=>'required',
                    'page_title'=>'required',

                ]);
            }
            

            $page_name=$request->input('page_name');
            $page_title=$request->input('page_title');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('banner')->insert(['image'=>$imagename,'page_name'=>$page_name,'page_title'=>$page_title]);

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
                    DB::table('banner')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('banner')->where('id',$id)->update(['page_name'=>$page_name ,'page_title'=>$page_title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/'.$page_name.'_banner')->with('error',$message);
        
    }

    public function social_links(){  

        $data['social_links']=DB::table('social_links')->get();

        return view('admin.social_links',$data);
    }


    public function add_social_links_data($id){
        
            $social_links=DB::table('social_links')->where('id',$id)->get();

            $data['id']=$social_links[0]->id;

            $data['facebook_url']=$social_links[0]->facebook_url;
            $data['linkedin_url']=$social_links[0]->linkedin_url;
            $data['twitter_url']=$social_links[0]->twitter_url;
            $data['github_url']=$social_links[0]->github_url;

        return view('admin.add_social_links_data',$data);
    }


    public function store_add_social_links_data(Request $request,$id){

        // $validated=$request->validate([
        //     'facebook_url'=>'required',
        //     'insta_url'=>'required',
        //     'github_url'=>'required',
        //     'twitter_url'=>'required',
        // ]);

        $facebook_url=$request->input('facebook_url');
        $linkedin_url=$request->input('linkedin_url');
        $twitter_url=$request->input('twitter_url');
        $github_url=$request->input('github_url');
 
        DB::table('social_links')->where('id',$id)->update(['facebook_url'=>$facebook_url,'linkedin_url'=>$linkedin_url,'twitter_url'=>$twitter_url,'github_url'=>$github_url]);

        return redirect('/admin/social_links')->with('error','data updated successfully!!');
        
    }


    public function contact_inquiry(){

        $data['contact_data']=DB::table('contact_data')->orderby('id','desc')->get();

        return view('admin.contact_inquiry',$data);
    }



    public function delete_contact_inquiry($id){

        DB::table('contact_data')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


}
