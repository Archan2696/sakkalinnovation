
<?php
use Illuminate\Support\Facades\Auth;
   
function createSlug($str, $delimiter = '-'){
    
    $slug = strtolower(trim(preg_replace('/[\s-]+/', $delimiter, preg_replace('/[^A-Za-z0-9-]+/', $delimiter, preg_replace('/[&]/', 'and', preg_replace('/[\']/', '', iconv('UTF-8', 'ASCII//TRANSLIT', $str))))), $delimiter));
    return $slug;

}

function meta_content(){
       
    $currentPath = Request::path();

    if($currentPath == '/'){
        $meta_code=DB::table('meta_code')->where('page_name','home')->first();
    }

    $basePath = explode('/', $currentPath)[0];
    $pathSegments = explode('/', $currentPath);
    $blog_name = isset($pathSegments[1]) ? $pathSegments[1] : null;
   
    $meta_code=DB::table('meta_code')->where('page_name',$basePath)->first();
    if($blog_name !=''){
        $blog_data=DB::table('recent_news')->where('slug',$blog_name)->get();

            if(count($blog_data)!=0 && $blog_data[0]->meta_title!='' && $blog_data[0]->meta_description !=''){
                $meta_code = (object) [
                    'meta_title' => $blog_data[0]->meta_title,
                    'meta_description' => $blog_data[0]->meta_description,
                    'page_name' => 'blog_detail'
                ];
            }
            else{
                if($meta_code ==''){
                    $meta_code=DB::table('meta_code')->where('page_name', 'like', '%'.$basePath.'%')->first();
                }   
            }
    }else{
        
            if($meta_code ==''){
                $meta_code=DB::table('meta_code')->where('page_name', 'like', '%'.$basePath.'%')->first();
            } 
    }

    if($meta_code ==''){
        $meta_code = (object) [
            'meta_title' => 'Transforming Ideas into Innovative Websites | Sakkal Innovation',
            'meta_description' => 'Discover how our website developers and digital marketing strategies can transform your ideas into successful online experiences. We don’t just build websites; we bring your ideas to life using creativity and the latest technology. Visit Our Website!',
            'page_name' => 'home1'
        ];
    }
    
    return $meta_code;
}


?>