<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Carbon\Carbon;
use DB;
use Illuminate\Support\Facades\Log;

class FrontController extends Controller
{
    public function index(){

        $data['home_banner']=DB::table('home_banner')->get();

        //$data['service']=DB::table('service')->inRandomOrder()->limit(3)->get();

        $data['service']=DB::table('service')->take(3)->get();

        $data['home_service_description']=DB::table('home_service_description')->get();

        $data['home_about']=DB::table('home_about')->get();

        $data['home_about_description']=DB::table('home_about_description')->get();

        $data['portfolio']=DB::table('portfolio')->take(6)->get();

        $data['portfolio_description']=DB::table('portfolio_description')->get();

        $data['what_we_do']=DB::table('what_we_do')->get();

        $data['package_services']=DB::table('package_services')->get();

        $data['service_packages_description']=DB::table('service_packages_description')->get();

        $data['team']=DB::table('team')->take(3)->get();

        $data['team_description']=DB::table('team_description')->get();

        $data['faq']=DB::table('faq')->get();

        $data['faq_description']=DB::table('faq_description')->get();

        $data['review']=DB::table('review')->get();

        $data['review_description']=DB::table('review_description')->get();

        $data['recent_news']=DB::table('recent_news')->take(3)->get();

        $data['recent_news_description']=DB::table('recent_news_description')->get();

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();
        
        return view('index',$data);
    }







    public function about(){

        $data['banner']=DB::table('banner')->where('page_name','about')->get();

        $data['about']=DB::table('about')->get();

        $data['choose_us']=DB::table('choose_us')->get();

        $data['choose_us_description']=DB::table('choose_us_description')->get();

        $data['about_service']=DB::table('about_service')->get();


        $data['recent_news']=DB::table('recent_news')->take(3)->get();

        $data['recent_news_description']=DB::table('recent_news_description')->get();

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('about',$data);
    }








    public function services(){

        $data['banner']=DB::table('banner')->where('page_name','service')->get();

        $data['service']=DB::table('service')->get();

        $data['service_description']=DB::table('service_description')->get();


        $data['facility']=DB::table('facility')->get();

        $data['facility_description']=DB::table('facility_description')->get();

        $data['what_we_do']=DB::table('what_we_do')->get();

        $data['package_services']=DB::table('package_services')->get();

        $data['service_packages_description']=DB::table('service_packages_description')->get();


        $data['recent_news']=DB::table('recent_news')->take(3)->get();

        $data['recent_news_description']=DB::table('recent_news_description')->get();

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('services',$data);
    }



    public function portfolio(){

        $data['banner']=DB::table('banner')->where('page_name','portfolio')->get();

        $data['portfolio_description']=DB::table('portfolio_description')->get();

        $data['cta']=DB::table('cta')->get();

        $data['portfolio']=DB::table('portfolio')->get();
        
        
        $data['portfolio_list']=DB::table('portfolio')->get();
        
        //$data['portfolio_list']=DB::table('portfolio')->take(6)->get();
        
        
        $data['project_type']=DB::table('project_type')->get();

        $data['recent_news']=DB::table('recent_news')->take(3)->get();

        $data['recent_news_description']=DB::table('recent_news_description')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('portfolio',$data);
    }



    public function price(){

        $data['banner']=DB::table('banner')->where('page_name','price')->get();

        $data['price_description']=DB::table('price_description')->get();

        $data['monthly_price']=DB::table('monthly_price')->get();

        $data['yearly_price']=DB::table('yearly_price')->get();

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('price',$data);
    }



    public function contact(){

        $data['banner']=DB::table('banner')->where('page_name','contact')->get();

        $data['contact_info']=DB::table('contact_info')->get();

        $data['contact']=DB::table('contact')->get();

        $data['contact_description']=DB::table('contact_description')->get();

        $data['form_description']=DB::table('form_description')->get();
        
        $data['contact_map']=DB::table('contact_map')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('contact',$data);
    }
    
    
    
    
    public function privacy(){

        $data['banner']=DB::table('banner')->where('page_name','privacy')->get();

        $data['privacy_policy']=DB::table('privacy_policy')->get();

        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('privacy',$data);
    }
    
    
    
    
    public function terms(){

        $data['banner']=DB::table('banner')->where('page_name','terms')->get();

        $data['terms_condition']=DB::table('terms_condition')->get();
        
        
        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('terms',$data);
    }
    
    
      
    public function blog(){

        $data['banner']=DB::table('banner')->where('page_name','blog')->get();

        $data['blog_description']=DB::table('blog_description')->get();
        
        $data['blog']=DB::table('recent_news')->paginate(3);

        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('blog',$data);
    }
    
    
    public function blog_detail($id){

        $data['banner']=DB::table('banner')->where('page_name','blog_detail')->get();

        $data['blog_description']=DB::table('blog_description')->get();
        
        $data['blog']=DB::table('recent_news')->where('slug',$id)->get();
        
        $data['blog_list']=DB::table('recent_news')->orderby('id','desc')->take(3)->get();

        $data['social_links']=DB::table('social_links')->get();
        
        $data['footer_description']=DB::table('footer_description')->get();

        return view('blog_detail',$data);
    }
    
    
    
     public function loadBlog(Request $request){
        $search = $request->input('search');

        
        $blog=DB::table('recent_news');

        
        if($search!=''){
            $blog->where('title2','LIKE','%'.$search.'%');
        }
        

        $blog= $blog->paginate(3);
        
        if(count($blog)>0){
            $data['blog']=$blog;
            $data['have_property']=true;
        }else{
            $data['blog']=$blog;
            $data['have_property']=false;
        }
        return view('blog_ajaxData',$data);
    }
    
    
    

  public function getContactData(Request $request){

        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'number' => 'required',
            'email' => 'required',
            'message' => 'required',
        ]);

        if ($validator->passes()) {
        $name=$request->name;
        $number=$request->number;
        $email=$request->email;
        $message=$request->message;

        $contact_data=DB::table('contact_data')->insert(['name'=>$name,'number'=>$number,'email'=>$email,'message'=>$message]);

        if($email){

            $admin_detail=DB::table('admins')->get();

            $aemail=$admin_detail[0]->email;
            $aname=$admin_detail[0]->name;
            $aphone_no=$admin_detail[0]->phone_no;
       
            $meta['FROM_EMAIL']= "leonsak10@gmail.com";
            $meta['admin_email']="leonsak10@gmail.com";
            $meta['subject']="Someone need expert help";
            $meta['name']=$aname;
            $meta['username']=$name;
            $meta['email']=$email;
            $meta['number']=$number;
            $meta['message_data']=$message;
            $meta['data']="New Inquiry !!";
             
                 
            Mail::send('email.new_email', $meta, function($m) use($meta){
        
               $m->from($meta['FROM_EMAIL'],'New Get Started Inquiry');
               $m->to($meta['admin_email']);
               $m->subject($meta['subject']);
            });




        //     $meta['FROM_EMAIL']="leonsak10@gmail.com";
        //     $meta['client_email']="$email";
        //     $meta['subject']="New Get Started Inquiry";
        //     $meta['name']=$name;
        //     $meta['data']="Thank you for your response !!";
      
        //   Mail::send('email.new_email1', $meta, function($m) use($meta){
        
        //       $m->from($meta['FROM_EMAIL'],'Inquiry submitted successfully');
        //       $m->to($meta['client_email']);
        //       $m->subject($meta['subject']); 
        //      });
            
            $meta = [
                'FROM_EMAIL' => "leonsak10@gmail.com",
                'client_email' => $email,
                'subject' => "New Get Started Inquiry",
                'name' => $name,
                'data' => "Thank you for your response !!"
            ];
        
            try {
                Mail::send('email.new_email1', $meta, function($m) use ($meta) {
                    $m->from($meta['FROM_EMAIL'], 'Inquiry submitted successfully');
                    $m->to($meta['client_email']);
                    $m->subject($meta['subject']);
                });
            } catch (\Exception $e) {
                Log::error('Failed to send client email: ' . $e->getMessage());
            }
            

            return response()->json(['success'=>'Response Sent successfully.']);
            
        }
    }

        return response()->json(['error'=>$validator->errors()]);
        
    }
}
