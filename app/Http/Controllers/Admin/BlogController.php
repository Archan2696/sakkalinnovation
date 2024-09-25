<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Validation\Rule;

class BlogController extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }

     private function createSlug($str, $delimiter = '-')
    {
        $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
        return $slug;
    }

    
     public function blog_banner(){  

        $data['blog_banner']=DB::table('banner')->where('page_name',"blog")->get();

        return view('admin.blog_banner',$data);
    }


        public function blog_detail_banner(){  

        $data['blog_detail_banner']=DB::table('banner')->where('page_name',"blog_detail")->get();

        return view('admin.blog_detail_banner',$data);
    }

     public function blog(){

        $data['blog']=DB::table('recent_news')->get();

        $data['blog_description']=DB::table('blog_description')->get();

        return view('admin.blog',$data);
    }


    public function update_blog_description_data($id){
        
            $blog_description=DB::table('blog_description')->where('id',$id)->get();

            $data['id']=$blog_description[0]->id;

            $data['title']=$blog_description[0]->title;

            $data['description']=$blog_description[0]->description;

        return view('admin.add_blog_description_data',$data);
    }


    public function store_update_blog_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('blog_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/blog')->with('error','data updated successfully!!');
        
    }


    public function add_blog_data($id){

        if($id==0){

            $data['image']='';
            
            $data['slug']='';
            
            $data['meta_title']='';
            
            $data['meta_description']='';

            $data['title1']='';

            $data['title2']='';

            $data['title3']='';
            
            $data['title3']='';
            
            $data['main_description']='';

            $data['detail_title']=json_decode('[{"title":null}]');

            $data['description']=json_decode('[{"des":null}]');

            // $data['detail_title2']='';

            // $data['second_description']=json_decode('[{"des":null}]');

            $data['id']=$id;
        }
        else{

            $blog=DB::table('recent_news')->where('id',$id)->get();

            $data['id']=$blog[0]->id;
            
            $data['slug']=$blog[0]->slug;
            
            $data['meta_title']=$blog[0]->meta_title;
            
            $data['meta_description']=$blog[0]->meta_description;

            $data['image']=$blog[0]->image;

            $data['title1']=$blog[0]->title1;

            $data['title2']=$blog[0]->title2;

            $data['title3']=$blog[0]->title3;
            
            $data['main_description']=$blog[0]->main_description;

            $data['detail_title']=json_decode($blog[0]->detail_title);

            $data['description']=json_decode($blog[0]->description);

            // $data['detail_title2']=$blog[0]->detail_title2;

            // $data['second_description']=json_decode($blog[0]->second_description);

        }
        

        return view('admin.add_blog_data',$data);
    }


    public function store_add_blog_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title1'=>'required',
                    'title2'=>'required',
                    'title3'=>'required',
                    'slug' => [
                    'nullable',
                    Rule::unique('blog', 'slug'),
                ],
                ]);
                            $validated=$request->validate([
                    'title1'=>'required',
                    'title2'=>'required',
                    'title3'=>'required',
                    'slug' => [
                    'nullable',
                    Rule::unique('blog', 'slug')->ignore($id),
                ],
                ]);
            }
            

            $title1=$request->input('title1');
            $title2=$request->input('title2');
            $title3=$request->input('title3');
            $detail_title=$request->input('detail_title');
            $description=$request->input('description');
            $main_description=$request->input('main_description');
            
            $meta_title=$request->input('meta_title');
            
            $meta_description=$request->input('meta_description');
            
             $slug=createSlug($request->input('title2'), $delimiter = '-');

            if($slug ==''){
                $slug=createSlug($request->input('title2'), $delimiter = '-');
            }
          
                $descriptions=[];
                if(!empty($description)){
                    $i=0;
                    foreach($description as $key=>$d){
                        $descriptions[$i]['des']=$description[$key];
                        $i++;
                    }
        
                    $descriptions=json_encode($descriptions);
                }
        
        
                $detail_titles=[];
        
                if(!empty($detail_title)){
                    $i=0;
                    foreach($detail_title as $key=>$d){
                        $detail_titles[$i]['title']=$detail_title[$key];
                        $i++;
                    }
        
                    $detail_titles=json_encode($detail_titles);
                }
            
            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('recent_news')->insert(['slug'=>$slug,'meta_title'=>$meta_title,'meta_description'=>$meta_description,'image'=>$imagename,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'detail_title'=>$detail_titles,'description'=>$descriptions,'main_description'=>$main_description,]);

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
                    DB::table('blog')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('recent_news')->where('id',$id)->update(['slug'=>$slug,'meta_title'=>$meta_title,'meta_description'=>$meta_description,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'detail_title'=>$detail_titles,'description'=>$descriptions,'main_description'=>$main_description,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/blog')->with('error',$message);
    }

    

    public function delete_blog($id){

        $userdata=DB::table('recent_news')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('recent_news')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
    
    
    
    
    
    
    
    
    
    
    
    // old code
    
    
    
    // public function add_blog_data($id){
        
    //     if($id==0){

    //         $data['image']='';

    //         $data['title1']='';

    //         $data['title2']='';

    //         $data['title3']='';
            
    //         $data['title3']='';

    //         $data['detail_title1']='';

    //         $data['description']=json_decode('[{"des":null}]');

    //         $data['detail_title2']='';

    //         $data['second_description']=json_decode('[{"des":null}]');

    //         $data['id']=$id;
    //     }
    //     else{

    //         $blog=DB::table('recent_news')->where('id',$id)->get();

    //         $data['id']=$blog[0]->id;

    //         $data['image']=$blog[0]->image;

    //         $data['title1']=$blog[0]->title1;

    //         $data['title2']=$blog[0]->title2;

    //         $data['title3']=$blog[0]->title3;

    //         $data['detail_title1']=$blog[0]->detail_title1;

    //         $data['description']=json_decode($blog[0]->description);

    //         $data['detail_title2']=$blog[0]->detail_title2;

    //         $data['second_description']=json_decode($blog[0]->second_description);

    //     }
        

    //     return view('admin.add_blog_data',$data);
    // }


    // public function store_add_blog_data(Request $request,$id){

        
    //         if($id ==0){
    //             $validated=$request->validate([
    //                 'image'=>'required',
    //                 'title1'=>'required',
    //                 'title2'=>'required',
    //                 'title3'=>'required',
    //                 'detail_title1'=>'required',
    //                 'detail_title2'=>'required',
    //             ]);
    //         }else{
    //             $validated=$request->validate([
    //                 'title1'=>'required',
    //                 'title2'=>'required',
    //                 'title3'=>'required',
    //                 'detail_title1'=>'required',
    //                 'detail_title2'=>'required',
    //             ]);
    //         }
            

    //         $title1=$request->input('title1');
    //         $title2=$request->input('title2');
    //         $title3=$request->input('title3');
    //         $detail_title1=$request->input('detail_title1');
    //         $description=$request->input('description');
    //         $detail_title2=$request->input('detail_title2');
    //         $second_description=$request->input('second_description');
            
            
    //             $descriptions=[];
    //             if(!empty($description)){
    //                 $i=0;
    //                 foreach($description as $key=>$d){
    //                     $descriptions[$i]['des']=$description[$key];
    //                     $i++;
    //                 }
        
    //                 $descriptions=json_encode($descriptions);
    //             }
        
        
    //             $second_descriptions=[];
        
    //             if(!empty($second_description)){
    //                 $i=0;
    //                 foreach($second_description as $key=>$d){
    //                     $second_descriptions[$i]['des']=$second_description[$key];
    //                     $i++;
    //                 }
        
    //                 $second_descriptions=json_encode($second_descriptions);
    //             }


    //         if($id ==0){

    //             $filename=$request->file('image');
    //             $imagename='';
    //             if($filename !=''){
    //                 $destination_path='uploads';
    //                 $imagename=time().'_'.$filename->getClientOriginalName();
    //                 $filename->move($destination_path,$imagename);
    //             }

    //             DB::table('recent_news')->insert(['image'=>$imagename,'title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'detail_title1'=>$detail_title1,'description'=>$descriptions,'detail_title2'=>$detail_title2,'second_description'=>$second_descriptions]);

    //             $message='data submitted successfully!!';
    //         }
    //         else{

    //             $filename=$request->file('image');
    //             $oldimage=$request->input('oldimage');
    //             $imagename='';
    //             if($filename !=''){
    //                 $destination_path='uploads';
    //                 $imagename=time().'_'.$filename->getClientOriginalName();
    //                 $filename->move($destination_path,$imagename);
    //                 if($oldimage !=''){
    //                     unlink(public_path('/uploads/'.$oldimage));
    //                 }
    //                 DB::table('blog')->where('id',$id)->update(['image'=>$imagename,]);
    //             }

    //             DB::table('recent_news')->where('id',$id)->update(['title1'=>$title1,'title2'=>$title2,'title3'=>$title3,'detail_title1'=>$detail_title1,'description'=>$descriptions,'detail_title2'=>$detail_title2,'second_description'=>$second_descriptions]);
    //             $message='data updated successfully!!';
    //         }

    //         return redirect('/admin/blog')->with('error',$message);
    // }
    



}
