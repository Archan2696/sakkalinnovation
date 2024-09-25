<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class Servicecontroller extends Controller
{
    public function __construct(){

            $this->middleware('auth:admin');
    }
     public function service_banner(){  

        $data['service_banner']=DB::table('banner')->where('page_name',"service")->get();

        return view('admin.service_banner',$data);
    }

    public function service(){

        $data['service']=DB::table('service')->get();

        $data['service_description']=DB::table('service_description')->get();

        return view('admin.service',$data);
    }


    public function update_service_description_data($id){
        
            $service_description=DB::table('service_description')->where('id',$id)->get();

            $data['id']=$service_description[0]->id;

            $data['title']=$service_description[0]->title;

            $data['description']=$service_description[0]->description;

        return view('admin.add_service_description_data',$data);
    }


    public function store_update_service_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');

        $description=$request->input('description');

    
        DB::table('service_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/service')->with('error','data updated successfully!!');
        
    }


    public function add_service_data($id){
        
        if($id==0){

            $data['home_image']='';

            $data['title']='';

            $data['list']=[];

            $data['image']='';

            $data['home_description']='';

            $data['description']=[];

            $data['id']=$id;
        }
        else{

            $service=DB::table('service')->where('id',$id)->get();

            $data['id']=$service[0]->id;

            $data['home_image']=$service[0]->home_image;

            $data['title']=$service[0]->title;

            $data['list']=json_decode($service[0]->list);

            if($service[0]->list==''){
                $data['list']=[];
            }

            $data['image']=$service[0]->image;

            $data['home_description']=$service[0]->home_description;

            $data['description']=json_decode($service[0]->description);

            if($service[0]->description==''){
                $data['description']=[];
            }

        }

        return view('admin.add_service_data',$data);
    }


    public function store_add_service_data(Request $request,$id){

        
            if($id ==0){
                $validated=$request->validate([
                    'image'=>'required',
                    'title'=>'required',
                ]);
            }else{
                $validated=$request->validate([
                    'title'=>'required',
                ]);
            }
            

            $title=$request->input('title');
            $description=$request->input('description');
            $list=$request->input('list');

            $descriptionData=[];

                if(!empty($description)){
                    $i=0;
                    foreach($description as $key=>$d){
                        $descriptionData[$i]['des']=$description[$key];
                        $i++;
                    }

                    $descriptionData=json_encode($descriptionData);
                }

             $listData=[];

            if(!empty($list)){
                $i=0;
                foreach($list as $key=>$d){
                    $listData[$i]['list']=$list[$key];
                    $i++;
                }

                $listData=json_encode($listData);
            }

            if($id ==0){

                $filename1=$request->file('image');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                DB::table('service')->insert(['image'=>$imagename1,'description'=>$descriptionData,'title'=>$title,'list'=>$listData,]);

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
                    DB::table('service')->where('id',$id)->update(['image'=>$imagename1,]);
                }

                DB::table('service')->where('id',$id)->update(['description'=>$descriptionData,'title'=>$title,'list'=>$listData,]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/service')->with('error',$message);
    }

    

    public function delete_service($id){

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


    public function facility(){

        $data['facility']=DB::table('facility')->get();

        $data['facility_description']=DB::table('facility_description')->get();

        return view('admin.facility',$data);
    }


    public function update_facility_description_data($id){
        
            $facility_description=DB::table('facility_description')->where('id',$id)->get();

            $data['id']=$facility_description[0]->id;

            $data['title']=$facility_description[0]->title;

            $data['highlighted_text']=$facility_description[0]->highlighted_text;

        return view('admin.add_facility_description_data',$data);
    }


    public function store_update_facility_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'highlighted_text'=>'required',

        ]);

        $title=$request->input('title');
        $highlighted_text=$request->input('highlighted_text');

    
        DB::table('facility_description')->where('id',$id)->update(['title'=>$title,'highlighted_text'=>$highlighted_text]);

        return redirect('/admin/facility')->with('error','data updated successfully!!');
        
    }


    public function add_facility_data($id){
        
        if($id==0){

            $data['title']='';

            $data['image']='';

            $data['description']='';

            $data['id']=$id;
        }
        else{

            $facility=DB::table('facility')->where('id',$id)->get();

            $data['id']=$facility[0]->id;

            $data['title']=$facility[0]->title;

            $data['image']=$facility[0]->image;

            $data['description']=$facility[0]->description;

        }

        return view('admin.add_facility_data',$data);
    }


    public function store_add_facility_data(Request $request,$id){

        
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

                $filename1=$request->file('image');
                $imagename1='';
                if($filename1 !=''){
                    $destination_path1='uploads';
                    $imagename1=time().'_'.$filename1->getClientOriginalName();
                    $filename1->move($destination_path1,$imagename1);
                }

                DB::table('facility')->insert(['image'=>$imagename1,'description'=>$description,'title'=>$title,]);

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
                    DB::table('facility')->where('id',$id)->update(['image'=>$imagename1,]);
                }

                DB::table('facility')->where('id',$id)->update(['description'=>$description,'title'=>$title]);
                $message='data updated successfully!!';
            }

            return redirect('/admin/facility')->with('error',$message);
    }

    

    public function delete_facility($id){

        $userdata=DB::table('facility')->where('id',$id)->get();

        $image=$userdata[0]->image;

        if($image !=''){
            unlink(public_path('/uploads/'.$image));
        }

        DB::table('facility')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }
















    public function package_services(){

        $data['package_services']=DB::table('package_services')->get();

        $data['service_packages_description']=DB::table('service_packages_description')->get();
        
        return view('admin.package_services',$data);
    }


    public function update_service_packages_description_data($id){
        
            $service_packages_description=DB::table('service_packages_description')->where('id',$id)->get();

            $data['id']=$service_packages_description[0]->id;

            $data['title']=$service_packages_description[0]->title;

            $data['description']=$service_packages_description[0]->description;

        return view('admin.add_service_packages_description_data',$data);
    }


    public function store_update_service_packages_description_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'description'=>'required',
        ]);

        $title=$request->input('title');
        $description=$request->input('description');
            
        DB::table('service_packages_description')->where('id',$id)->update(['title'=>$title,'description'=>$description]);

        return redirect('/admin/package_services')->with('error','data updated successfully!!');
        
    }


    public function add_package_service_data($id){
        
            $data['title']='';

            $data['standard']='1';

            $data['premium']='1';

            $data['business']='1';

            $data['standard_type']='1';

            $data['premium_type']='1';

            $data['business_type']='1';

            $data['id']=$id;

            $data['standard_text']='';
            $data['premium_text']='';
            $data['business_text']='';

            $package_services=DB::table('package_services')->where('id',$id)->get();

            if(count($package_services) !=0){

                $data['id']=$package_services[0]->id;

                $data['title']=$package_services[0]->title;
                $data['standard']=$package_services[0]->standard;
                $data['premium']=$package_services[0]->premium;
                $data['business']=$package_services[0]->business;
                $data['standard_type']=$package_services[0]->standard_type;
                $data['premium_type']=$package_services[0]->premium_type;
                $data['business_type']=$package_services[0]->business_type;

                if($package_services[0]->standard_type == 2){
                    $data['standard_text']=$package_services[0]->standard;
                }
                if($package_services[0]->premium_type == 2){
                    $data['premium_text']=$package_services[0]->premium;
                }
                if($package_services[0]->business_type == 2){
                    $data['business_text']=$package_services[0]->business;
                }
            }

        return view('admin.add_package_service_data',$data);
    }


    public function store_add_package_service_data(Request $request,$id){

        $validated=$request->validate([
            'title'=>'required',
            'standard_type'=>'required',
            'premium_type'=>'required',
            'business_type'=>'required',
        ]);

        $title=$request->input('title');

        $standard=$request->input('standard');
        $premium=$request->input('premium');
        $business=$request->input('business');

        $standard_type=$request->input('standard_type');
        $premium_type=$request->input('premium_type');
        $business_type=$request->input('business_type');

        if($standard_type == 2){
            $standard=$request->input('standard_text');
        }
        if($premium_type == 2){
            $premium=$request->input('premium_text');
        }
        if($business_type == 2){
            $business=$request->input('business_text');
        }

        if($id ==0){

            DB::table('package_services')->insert(['title'=>$title,'standard'=>$standard,'premium'=>$premium,'business'=>$business,'standard_type'=>$standard_type,'premium_type'=>$premium_type,'business_type'=>$business_type]);

            $message='data submitted successfully!!';
        }

        else{

            DB::table('package_services')->where('id',$id)->update(['title'=>$title , 'standard'=>$standard,'premium'=>$premium , 'business'=>$business,'standard_type'=>$standard_type,'premium_type'=>$premium_type,'business_type'=>$business_type]);
            $message='data updated successfully!!';

        }

        return redirect('/admin/package_services')->with('error',$message);
        
    }

    

    public function delete_package_service($id){

        DB::table('package_services')->where('id',$id)->delete();

        return response()->json([
            'success'=>'200',
        ]);
    }

}
