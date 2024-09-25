<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Homecontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
    
    public function home_banner(){

        $data['home_banner']=DB::table('home_banner')->get();

        return view('admin.home_banner',$data);
    }

    public function add_home_banner_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['highlighted_text']='';

            $data['description']='';

            $data['link']='';

            $data['id']=$id;
        }
        else{

            $home_banner=DB::table('home_banner')->where('id',$id)->get();

            $data['id']=$home_banner[0]->id;

            $data['image']=$home_banner[0]->image;

            $data['title']=$home_banner[0]->title;

            $data['highlighted_text']=json_decode($home_banner[0]->highlighted_text);

            if($home_banner[0]->highlighted_text==''){
                $data['highlighted_text']=[];
            }

            $data['description']=$home_banner[0]->description;

            $data['link']=$home_banner[0]->link;
        }

        return view('admin.add_home_banner_data',$data);
    }


    public function store_add_home_banner_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'highlighted_text'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'highlighted_text'=>'required',
                    'description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $highlighted_text=$request->input('highlighted_text');
            $description=$request->input('description');
            $link=$request->input('link');
            
            $textData=[];

            if(!empty($highlighted_text)){
                $i=0;
                    foreach ($highlighted_text as $key => $d) {
                    if (isset($textData[$key])) {
                        $textData[$i]['text'] = $textData[$key];
                    } else {
                        $textData[$i]['text'] = $d;
                    }
                    $i++;
                }

                $textData=json_encode($textData);
            }

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('home_banner')->insert(['image'=>$imagename,'title'=>$title,'highlighted_text'=>$textData,'description'=>$description,'link'=>$link]);

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
                    DB::table('home_banner')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_banner')->where('id',$id)->update(['title'=>$title ,'highlighted_text'=>$textData,'description'=>$description,'link'=>$link]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_banner')->with('error',$message);
    }

    

    public function delete_home_banner($id){

        $userdata=DB::table('home_banner')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_banner')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function home_service(){

        $data['service']=DB::table('service')->get();

        $data['home_service_description']=DB::table('home_service_description')->get();

        return view('admin.home_service',$data);
    }


    public function update_home_service_description_data($id){
        
            $home_service_description=DB::table('home_service_description')->where('id',$id)->get();

            $data['id']=$home_service_description[0]->id;

            $data['title']=$home_service_description[0]->title;

            $data['description']=$home_service_description[0]->description;

        return view('admin.add_home_service_description_data',$data);
    }


    public function store_update_home_service_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

    
        DB::table('home_service_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/home_service')->with('error','data updated successfully!!');
        
    }


    public function add_home_service_data($id){
        
        if($id==0){

            $data['home_image']='';

            $data['title']='';

            $data['list']='';

            $data['image']='';

            $data['home_description']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_service=DB::table('service')->where('id',$id)->get();

            $data['id']=$home_service[0]->id;

            $data['home_image']=$home_service[0]->home_image;

            $data['title']=$home_service[0]->title;

            $data['list']=$home_service[0]->list;

            $data['image']=$home_service[0]->image;

            $data['home_description']=$home_service[0]->home_description;

            $data['description']=$home_service[0]->description;

        }

        return view('admin.add_home_service_data',$data);
    }


    public function store_add_home_service_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'home_image'=>'required',
                    'title'=>'required',
                    'home_description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'home_description'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $home_description=$request->input('home_description');

            if($id ==0){

                $filename1=$request->file('home_image');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                DB::table('service')->insert(['home_image'=>$imagename1,'home_description'=>$home_description,'title'=>$title,]);

                $message='data submitted successfully!!';
            }
            else{

                $filename1=$request->file('home_image');
                $oldimage1=$request->input('oldimage1');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                    if($oldimage1 !=''){
                        unlink(public_path('/uploads/'.$oldimage1));
                    }
                    DB::table('service')->where('id',$id)->update(['home_image'=>$imagename1,]);
                }

                DB::table('service')->where('id',$id)->update(['home_description'=>$home_description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_service')->with('error',$message);
    }

    

    public function delete_home_service($id){

        $userdata=DB::table('service')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('service')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }



    public function home_about(){

        $data['home_about']=DB::table('home_about')->get();

        $data['home_about_description']=DB::table('home_about_description')->get();

        return view('admin.home_about',$data);
    }


    public function update_home_about_description_data($id){
        
            $home_about_description=DB::table('home_about_description')->where('id',$id)->get();

            $data['id']=$home_about_description[0]->id;
            $data['image']=$home_about_description[0]->image;
            $data['title']=$home_about_description[0]->title;

        return view('admin.add_home_about_description_data',$data);
    }


    public function store_update_home_about_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');
        
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

            DB::table('home_about_description')->where('id',$id)->update(['image'=>$imagename]);
        }
            
        DB::table('home_about_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/home_about')->with('error','data updated successfully!!');
        
    }


    public function add_home_about_data($id){
        
        if($id==0){

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $home_about=DB::table('home_about')->where('id',$id)->get();

            $data['id']=$home_about[0]->id;

            $data['image']=$home_about[0]->image;

            $data['description']=$home_about[0]->description;
        }

        return view('admin.add_home_about_data',$data);
    }


    public function store_add_home_about_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'description'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'description'=>'required',
                ]);
            }
            

            $description=$request->input('description');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('home_about')->insert(['image'=>$imagename,'description'=>$description]);

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
                    DB::table('home_about')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('home_about')->where('id',$id)->update(['description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/home_about')->with('error',$message);
    }

    

    public function delete_home_about($id){

        $userdata=DB::table('home_about')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('home_about')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


     public function what_we_do(){

        $data['what_we_do']=DB::table('what_we_do')->get();

        return view('admin.what_we_do',$data);
    }


    public function add_what_we_do_data($id){
        
        if($id==0){

            $data['image1']='';

            $data['image2']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $what_we_do=DB::table('what_we_do')->where('id',$id)->get();

            $data['id']=$what_we_do[0]->id;

            $data['image1']=$what_we_do[0]->image1;

            $data['image2']=$what_we_do[0]->image2;

            $data['title']=$what_we_do[0]->title;

            $data['description']=$what_we_do[0]->description;

        }

        return view('admin.add_what_we_do_data',$data);
    }


    public function store_add_what_we_do_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image1'=>'required',
                    'image2'=>'required',
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

                $filename1=$request->file('image1');
                $filename2=$request->file('image2');
                $imagename1='';
                $imagename2='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                 if($filename2 !=''){
                    $destination_path2='uploads';
                    $imagename2=time().'_'.$filename2->getClientOriginalName();
                    $filename2->move($destination_path2,$imagename2);
                }

                DB::table('what_we_do')->insert(['image1'=>$imagename1,'image2'=>$imagename2,'description'=>$description,'title'=>$title,]);

                $message='data submitted successfully!!';
            }
            else{

                $filename1=$request->file('image1');
                $filename2=$request->file('image2');
                $oldimage1=$request->input('oldimage1');
                $oldimage2=$request->input('oldimage2');
                $imagename1='';
                $imagename2='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                    if($oldimage1 !=''){
                        unlink(public_path('/uploads/'.$oldimage1));
                    }
                    DB::table('what_we_do')->where('id',$id)->update(['image1'=>$imagename1,]);
                }

                if($filename2 !=''){
                    $destination_path2='uploads';
                    $imagename2=time().'_'.$filename2->getClientOriginalName();
                    $filename2->move($destination_path2,$imagename2);
                    if($oldimage2 !=''){
                        unlink(public_path('/uploads/'.$oldimage2));
                    }
                    DB::table('what_we_do')->where('id',$id)->update(['image2'=>$imagename2,]);
                }

                DB::table('what_we_do')->where('id',$id)->update(['description'=>$description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/what_we_do')->with('error',$message);
    }

    

    public function delete_what_we_do($id){

        $userdata=DB::table('what_we_do')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image1 !=''){
            unlink(public_path('/uploads/'.$image1));
        }

        if($image2 !=''){
            unlink(public_path('/uploads/'.$image2));
        }

        DB::table('what_we_do')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


  public function team(){

        $data['team']=DB::table('team')->get();

        $data['team_description']=DB::table('team_description')->get();

        return view('admin.team',$data);
    }


    public function update_team_description_data($id){
        
            $team_description=DB::table('team_description')->where('id',$id)->get();

            $data['id']=$team_description[0]->id;

            $data['title']=$team_description[0]->title;

            $data['description']=$team_description[0]->description;

        return view('admin.add_team_description_data',$data);
    }


    public function store_update_team_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('team_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/team')->with('error','data updated successfully!!');
        
    }


    public function add_team_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['sub_title']='';

            $data['id']=$id;
        }
        else{

            $team=DB::table('team')->where('id',$id)->get();

            $data['id']=$team[0]->id;

            $data['image']=$team[0]->image;

            $data['title']=$team[0]->title;

            $data['sub_title']=$team[0]->sub_title;
        }

        return view('admin.add_team_data',$data);
    }


    public function store_add_team_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                    'sub_title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                    'sub_title'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $sub_title=$request->input('sub_title');

            if($id ==0){

                $filename=$request->file('image');
                $imagename='';
                if($filename !=''){
                    $destination_path='uploads';
                    $imagename=time().'_'.$filename->getClientOriginalName();
                    $filename->move($destination_path,$imagename);
                }

                DB::table('team')->insert(['image'=>$imagename,'title'=>$title,'sub_title'=>$sub_title]);

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
                    DB::table('team')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('team')->where('id',$id)->update(['title'=>$title ,'sub_title'=>$sub_title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/team')->with('error',$message);
    }

    

    public function delete_team($id){

        $userdata=DB::table('team')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('team')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


        public function add_social_url_data($id){
        

            $team=DB::table('team')->where('id',$id)->get();

            $data['id']=$team[0]->id;

            $data['linkedin_url']=$team[0]->linkedin_url;

            $data['facebook_url']=$team[0]->facebook_url;

            $data['github_url']=$team[0]->github_url;

            $data['twitter_url']=$team[0]->twitter_url;

            $data['twitch_url']=$team[0]->twitch_url;

        return view('admin.add_social_url_data',$data);
    }


    public function store_add_social_url_data(Request $request,$id){

                // $validated=$request->validate([
                //     'linkedin_url'=>'required',
                //     'facebook_url'=>'required',
                //     'github_url'=>'required',
                //     'twitter_url' => 'required',
                //     'twitch_url' => 'required',

                // ]);


            $linkedin_url=$request->input('linkedin_url');
            $facebook_url=$request->input('facebook_url');
            $github_url=$request->input('github_url');
            $twitter_url=$request->input('twitter_url');
            $twitch_url=$request->input('twitch_url');

            DB::table('team')->where('id',$id)->update(['linkedin_url'=>$linkedin_url,'facebook_url'=>$facebook_url,'github_url'=>$github_url,'twitter_url'=>$twitter_url,'twitch_url'=>$twitch_url]);


            $message='data Added successfully!!';

            return redirect('/admin/team')->with('error',$message);
        
    }


    public function faq(){

        $data['faq']=DB::table('faq')->get();

        $data['faq_description']=DB::table('faq_description')->get();

        return view('admin.faq',$data);
    }


    public function update_faq_description_data($id){
        
            $faq_description=DB::table('faq_description')->where('id',$id)->get();

            $data['id']=$faq_description[0]->id;

            $data['title']=$faq_description[0]->title;

        return view('admin.add_faq_description_data',$data);
    }


    public function store_update_faq_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
        ]);

        $title=$request->input('title');

        DB::table('faq_description')->where('id',$id)->update(['title'=>$title]);

        return redirect('/admin/faq')->with('error','data updated successfully!!');
        
    }


    public function add_faq_data($id){
        
        if($id==0){

            $data['question']='';

            $data['answer']='';

            $data['id']=$id;
        }
        else{

            $faq=DB::table('faq')->where('id',$id)->get();

            $data['id']=$faq[0]->id;

            $data['question']=$faq[0]->question;

            $data['answer']=$faq[0]->answer;
        }

        return view('admin.add_faq_data',$data);
    }


    public function store_add_faq_data(Request $request,$id){

        $validated=$request->validate([
            'question'=>'required',
            'answer'=>'required',
        ]);

        $question=$request->input('question');

        $answer=$request->input('answer');

        if($id ==0){
            
            DB::table('faq')->insert(['question'=>$question,'answer'=>$answer]);

            $message='data submitted successfully!!';
        }

        else{

            DB::table('faq')->where('id',$id)->update(['question'=>$question , 'answer'=>$answer]);
            $message='data updated successfully!!';

        }

        return redirect('/admin/faq')->with('error',$message);
        
    }

    

    public function delete_faq($id){

        DB::table('faq')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }




    public function review(){

        $data['review']=DB::table('review')->get();

        $data['review_description']=DB::table('review_description')->get();

        return view('admin.review',$data);
    }


    public function update_review_description_data($id){
        
            $review_description=DB::table('review_description')->where('id',$id)->get();

            $data['id']=$review_description[0]->id;

            $data['title']=$review_description[0]->title;

            $data['description']=$review_description[0]->description;

        return view('admin.add_review_description_data',$data);
    }


    public function store_update_review_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('review_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/review')->with('error','data updated successfully!!');
        
    }


    public function add_review_data($id){
        
        if($id==0){

            $data['image']='';

            $data['title']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $review=DB::table('review')->where('id',$id)->get();

            $data['id']=$review[0]->id;

            $data['image']=$review[0]->image;

            $data['title']=$review[0]->title;

            $data['description']=$review[0]->description;
        }

        return view('admin.add_review_data',$data);
    }


    public function store_add_review_data(Request $request,$id){

        
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

                DB::table('review')->insert(['image'=>$imagename,'title'=>$title,'description'=>$description]);

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
                    DB::table('review')->where('id',$id)->update(['image'=>$imagename,]);
                }

                DB::table('review')->where('id',$id)->update(['title'=>$title ,'description'=>$description]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/review')->with('error',$message);
    }

    

    public function delete_review($id){

        $userdata=DB::table('review')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('review')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }


    public function recent_news_description(){

        $data['recent_news_description']=DB::table('recent_news_description')->get();

        return view('admin.recent_news_description',$data);
    }


    public function update_recent_news_description_data($id){
        
            $recent_news_description=DB::table('recent_news_description')->where('id',$id)->get();

            $data['id']=$recent_news_description[0]->id;

            $data['title']=$recent_news_description[0]->title;

            $data['description']=$recent_news_description[0]->description;

        return view('admin.add_recent_news_description_data',$data);
    }


    public function store_update_recent_news_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('recent_news_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/recent_news_description')->with('error','data updated successfully!!');
        
    }




}
