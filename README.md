1) Installation Via Composer
- composer create-project laravel/laravel example-app

2) Laravel Installer as a global Composer dependency
- composer global require laravel/installer
- laravel new example-app

3) Run project
- php artisan serve

4) Make Controller
- php artisan make:controller UserController
- In web.php, import this controller,
use App\Http\Controllers\UserController;

5) Access using Route
- Route::get("user",[UserController::class,"show"]);
- First arg is path name, 
- Second arg is controller and its function name
- Old version
= Route::get("user","UserController@show");

6) Dynamic URL, Pass argument in URL
- Route::get("user/{name}",[UserController::class,"show_user"]);
- In Controller,
function show_user($name){ return $name; }

7) Access View
- make users.blade.php in resources/views folder
- 1) Route::view("user","users"); // user is path and users is file name
- 2) Route::get('/user',function(){
         return view("users");
     });
- 3) Route::get('/user/{name}',function($name){
         return view("users",["name"=>$name]);
     });
- 4) Route::get('people',[PeopleController::class,"show_people"]);

8) Make Component
- php artisan make:component header
- it will create folder in resources/views/component and file name will be header.blade.php where we will write html code
- it will also create folder app/View/Components and create file header.php where dynamic code will be written

9) Include Component in view file
- <x-header />

10) Pass values in component
- <x-header componentName="ABC" />
- in app/view/component/ header.php file:
public $title="";
    public function __construct($componentName)
    {
        //
        $this->title = $componentName;
    }
- in header view file we can use as {{$title}}

11) Blade Demo - If for foreach
- 
@if($ifdata['name']=="Ravi")
<h3>Hello {{$ifdata['name']}}</h3>
@else
<h3>Hello Unknown</h3>
@endif
-
@for($i=1;$i<=10;$i++)
{{$i}}
<br>
@endfor
-
@foreach($foreachdata as $data)
{{$data}}
<br>
@endforeach

12) Include page in View Page
- @include("innerpage") - No need to write .blade.php

13) User php values in JS
-
<script>
var user = @json($user);
</script>

14) Form
- Define route for form when it submit.
- dont forgot to add @csrf in form
- Route::post("formsubmit",[FormDemoController::class,"postData"]);
- Route::view("formdemo","formdemo");
- In Controller File
   function postData(Request $req){
        return $req->input();
   }

15) Global Middleware
- php artisan make:middleware ageCheck
- register this ageCheck middleware in Http/Kernel.php file in Global $middleware array
- in ageCheck.php middleware file

public function handle(Request $request, Closure $next)
    {
        if($request->age && $request->age<18){
            return redirect("noaccess");
        }
        return $next($request);
    }

16) Group Middleware
- php artisan make:middleware verifiedCheck
- register this verifiedCheck middleware in Http/Kernel.php file in Group $middlewareGroups array
- 'verifiedPage'=>[
            \App\Http\Middleware\verifiedCheck::class,
        ]
- in verifiedCheck.php file
public function handle(Request $request, Closure $next)
    {
        if(!$request->verified || $request->verified!="true"){
            return redirect("noaccess");
        }
        return $next($request);
    }
- Now for group middleware, Route must be define in which we can add routes on which we want to apply group middleware 
Route::group(['middleware'=>['verifiedPage']],function(){
    Route::view("verifiedpage","verifiedpage");
});

17) Routed Middleware 
- Make middleware same as other
- register this memberCheck middleware in Http/Kernel.php file in Routed protected $routeMiddleware array
- 'memberPage' => \App\Http\Middleware\memberCheck::class,
- Now for routed middleware, it will apply to only one route so it will write like this:
Route::view("routedmw","routedmw")->middleware("memberPage");

18) Connect With Database
- in root folder of website, in .env file update DB config.
- or In config folder database.php file, update DB config.

19) We can get data from Database using two way:
- Using Controller
- Using Model

20) DB Connection using Controller
- In controller file, import
use Illuminate\Support\Facades\DB;

- in class
function get_data(){
        return DB::select("select * from users");
    }

21) DB Connection using Model
- Model will Map Database Table with Class Name - Table is 'users' and Class is 'user'
- Means Table name should be pural and class name should be singular
- if Table name is singular then in Model file Class add 
= public $table = 'employee'
i) Method One - where table name is pural
-In controller file, import
 use App\Models\User;
- Now in class function
- In controller class function write this
  return User::all();
ii) Method Two - where table name is singular
- In Model file Class add below line 
  public $table = "company";
- Now in controller file, import
  use App\Models\Company;
- In controller class function write this
  return Company::all();

22) Http Client 
- with Http Client we can get other web apis data
- in controller file import this
  use Illuminate\Support\Facades\Http;
- in controller class function add this
  function get_data(){
        $data = Http::get("https://reqres.in/api/users?page=1");

        return view("httpclientdemo",["data"=>$data["data"]]);
    }

23) Http Request Methods 
- GET, POST, PUT, DELETE, HEAD, PATCH, OPTIONS
- GET = No need of adding @csrf, values will be show in URL, use for get data
- POST = Need to add @csrf, use for Insert
- PUT = Need to add @csrf, use for UPDATE
- DELETE = Need to add @csrf, user for DELETE

- make route appropriately
Route::view("httpreqmethod","httpreqmethod");
Route::get("httpreq_process",[HttpReqController::class,"httpget"]);
Route::post("httpreq_process",[HttpReqController::class,"httppost"]);
Route::put("httpreq_process",[HttpReqController::class,"httpput"]);
Route::delete("httpreq_process",[HttpReqController::class,"httpdelete"]);

24) Session | with login example

- Set Session - $req->session()->put("session_name","value");
- Get Session - echo session("session_name");
- Delete Session - session()->pull("session_name");

$req->session()->put("USER_NAME",$data["username"]);

Route::get("session_logout",function(){
    if(session()->has("USER_NAME")){
        session()->pull("USER_NAME",null);
    }
    return redirect("session_login");
});

Route::get("session_login",function(){
    if(session()->has("USER_NAME")){
        return redirect("session_profile");
    }
    return view("session_login");
});

25) Flash Session
- Display only once after page load.
-  $req->session()->flash("flash_session_name","Success");

26) File Upload 
- $req->file("photo")->store("user_image"); 
- Here user_image is folder to store 'photo'
- File will be upload in storage > app > user_image 
- By default laravel create file with random string name
- We can set custom name as follow:
- $req->file("photo")->storeAs("user_image","custom_file_name.png");
- Get upload file name $req->photo->hashName();

27) Localization
- Use for Multi language website content
- Content will be set in different language file as variable
- For example if you want to change any word in three different language then you have to define three variable in different language folder & file
- Folder will be created in resources > lang > hi or gj or ko etc
- In this folder create file with xyz.php extention
- Example : 
return [
	"home_var"=>"Home",
];
- Now in view file, use like this;
<h1>{{__("xyz.home_var")}}</h1>
- Default Lang will be load as defined in config > app.php file
- Dynamic loading can be done using defining Routes

Route::get("localization/{lang}",function($lang){
    App::setlocale($lang);
    return view("localization");
});


28) Save Data to DB
- Make View file, Controller and model with singular name
- in model file, if table doesnot have created_at and updated_at field then add : public $timestamps = false; in the class.
- make routes for view and controller 
- in controller file import Model : use App\Models\User;
- in controller file define function to save data:
function save_data_process(Request $req){
        $user = new User;
        $user->username  = $req->username;
        $user->first_name   = $req->first_name;
        $user->last_name    = $req->last_name;
        $user->email        = $req->email;
        $user->password     = md5($req->password);

        $user->save();

        $req->session()->flash("msg","Data Saved Successfully.");

        return redirect("savedata");
    }

29) Show Data List from DB
- in controller file - $users->all();

30) Show Data List With Pagination
- in controller file - $users->paginate(5)  or Users::paginate(5)
- in view file - {{$users->links()}}

31) Update Data
- Make Route to load selected data in form
- Route::get("/edit/{id}",[EditDeleteController::class,"edit_data"]);
- Make route to save selected data
- Route::post("edit_process",[EditDeleteController::class,"edit_process"]);
- function edit_data(Request $req){
        return view("data_edit",["edit_data"=>User::find($req->id)]);
    }
- function edit_process(Request $req){
        $data = User::find($req->id);
        $data->first_name = $req->first_name;
        $data->last_name = $req->last_name;
        $data->email = $req->email;
        $data->save();
        return redirect("data_edit");
    }

32) Delete Data
- Make Route for Delete with Id
- Route::get("/delete/{id}",[EditDeleteController::class,"delete_process"]);
- function delete_process(Request $req){
        $data = User::find($req->id);
        $data->delete();
        return redirect("data_edit");
    }

33) Query Builder
- $data = DB::table("users")->get();
- $data = DB::table("users")->count();
- $data = (array)DB::table("users")->find(1); // type casting

- DB::table('users')
        ->insert([
            "username"=>"jasonroy",
            "password"=>md5("jasonroy"),
            "first_name"=>"Jason",
            "last_name"=>"Roy",
            "email"=>"jason@test.com",
        ]);

- DB::table('users')
        ->where("id",13)
        ->update([
            "username"=>"joeroot",
            "password"=>md5("joeroot"),
            "first_name"=>"Jeo",
            "last_name"=>"Root",
            "email"=>"joe@test.com",
        ]);

- DB::table('users')
        ->where("id",13)
        ->delete();

34) Aggregate Mehtod
- DB::table('users')->sum("id");
- DB::table('users')->min("id");
- DB::table('users')->max("id");
- DB::table('users')->avg("id");
- DB::table('users')->select(DB::raw("min(id) as min_price, max(id) as max_price"))->get();

35) Join 
-  $data = DB::table('users')
        ->join("company","users.company_id","=","company.id")
        ->select(DB::raw("users.*,company.name AS company_name"))
        ->get();
        return view("joindemo",["users"=>$data]);
- It will return data object

36) Seeding - To insert dummy data 
- Create Seeder - php artisan make:seeder UsersSeeder
- Seeder file will be in database/seeders/UsersSeeder.php folder
- in function run(), add insert query
- Import following
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str; - To generate random string

- DB::table('users')->insert([
            "company_id"    => rand(1,2),
            "username"      => Str::random(5),
            "first_name"    => Str::random(5),
            "last_name"     => Str::random(5),
            "email"         => Str::random(5)."@gmail.com",
            "phone"         => rand(1000000000,9999999999),
            "city"          => Str::random(8),
            "password"      => md5(Str::random(6))
        ]);

37) Stub
- Raw file where modal/controller/migration/seeder etc file's default code defined. I.e. command with make have stub defined.
- Command to publish stub: php artisan stub:publish
- Stub file will be created in new Folder Stub in root
- for example, if you want to set default function named index() in controller file then do something like this. It will create new controller everytime with this code.

<?php
namespace {{ namespace }};

use {{ rootNamespace }}Http\Controllers\Controller;
use Illuminate\Http\Request;

class {{ class }} extends Controller
{
    function index(Request $req){

    }
}

38) Maintanance Mode
- Start = php artisan down
- Disable = php artisan up
- Bypass Maintanance Mode = php artisan down --secret="xyz123abc"
- Bypass mode will allow to access only user who has secret code.

39) Laravel Upgrade from 7 to 8
- framework = ^8.0
- collision = ^5.0
- guzzle = ^7.0.1
- ignition = ^2.3.6

40) JetStream
- check laravel version : laravel -v
- jetstream will work on on laravel installer version >=4.0
- create new project - laravel new jetblog --jet
- choose appropriate option 
- command - npm install && npm run dev 
- after that create DB and set config in env
- now run php artisan migrate
- change APP_URL in env file too.

41) Accessors
- Modify data after fetched from DB to display in View
- i.e. Name field values can be made capitalize using Accessors before it disaply in View
- in model file, create function like below,
function getNameAttribute($value){
	return ucFirst($value);
}
function getAddressAttribute($value){
        return $value.", USA";
}
- This will automatically convert name column data to capitalize and address column append with ", USA"

42) Mutator
- It will set data before saving to database.
- In model file, create function like below
function setNameAttribute($value){
        return $this->attributes["name"] = $value." Ltd.";
}
    function setAddressAttribute($value){
        return $this->attributes["address"] = $value.", India";
}

42) One to One and One to Many Relation
- get data from two table using model
- for example, Two tables category and products has connected using cid.
- so if you want to check particular category's number of products then we can use this.
- means category has many record with product or we can assume one category has only one product.
- 1) Category has only one produc then we will use hasOne()
= In category model,
function productData(){
        return $this->hasOne("App\Models\Product","cid");
    }
- 2) Category has many product then we will use hasMany()
= In category model,
function productData(){
        return $this->hasMany("App\Models\Product","cid");
    }
- In controller,
return view("onetoone_manyrelation",["product_data"=>Category::find(1)->productData]);

43) Fluent String
- Apply string operation in chain manner
- import this class - use Illuminate\Support\Str;
-  $new_data = Str::of($old_data)
                    ->ucfirst($old_data)
                    ->replaceFirst("Hi","Hello",$old_data)
                    ->camel($old_data);

44) Route Model Binding
- define route like this
- Route::get("route_model_binding/{key}",[RouteModelBindingController::class,"index"]);
- Route::get("route_model_binding/{key:username}",[RouteModelBindingController::class,"index"]);
- Default it will give result based on id. If you want to specific column then user {key:username}
- Make model and controller
- In controller,
function index(User $key){
        $data = $key;
        return view("route_model_binding",["users"=>$data]);
    }

45) Markdown Mail Template
- commad to generate mail files : php artisan make:mail TestMail --markdown=mailbody.TestMail
- Official doc link : https://laravel.com/docs/7.x/mail#markdown-mailables
- Here mailbody folder will be created on view with TestMail.blade.php file which is main file of mailbody
- TestMail class file will be created in new Mail folder.
- to use markdownmail, import : use App\Mail\TestMail;
- example:
function index(Request $req){
        return new TestMail();
    }

46) First API
- make controller and define route in api.php of route folder
- POSTMAN is recommended for API development

47) Get API with Param
- in api route,
Route::get("get_user_data_with_param/{id?}",[UsersParamApiController::class,"get_user_data"]);
- ? will allow api to run instead error it will can be manage in controller like below:
function get_user_data($id=null){
        $res    = array();
        $user_data = ($id>0)?User::find($id):User::all();
        if(!empty($user_data)){
            $res["result"]  = "1";
            $res["data"]    = $user_data;
        }else{
            $res["result"]  = "0";
            $res["data"]    = array();
        }
        return $res;
    }
- if you want to use other column i.e. name then do like below,
Route::get("list/{key:name?}", ['DeviceController::class', 'list']);
- By default param will take as id, so if you want to use name or username then user "key:columnname"
- so in controller,
function get_user_data(User $key=null)
{
     return  $user_data = ($key!==null)?User::find($key):User::all();;
}

or 

function get_user_data($key){
     return User::where('username',$key)->get();
}

48) Post API
- Route::post("save_user_data",[UsersPostApiController::class,"save_user_data"]);
function save_user_data(Request $req){
        
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($req)){
            $user_data = new User;
            $user_data->company_id  = $req->company_id;
            $user_data->username    = $req->username;
            $user_data->first_name  = $req->first_name;
            $user_data->last_name   = $req->last_name;
            $result = $user_data->save();
            if($result){
                $res = 1;
                $msg = "Data saved successfully.";
            }
        }

        return ["result"=>$res,"msg"=>$msg];
    }

49) Put API
- Route::put("update_user_data",[UsersPostPutApiController::class,"update_user_data"]);
function update_user_data(Request $req){
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($req)){
            $user_data = User::find($req->id);
            $user_data->company_id  = $req->company_id;
            $user_data->username    = $req->username;
            $user_data->first_name  = $req->first_name;
            $user_data->last_name   = $req->last_name;
            $result = $user_data->save();
            if($result){
                $res = 1;
                $msg = "Data udpated successfully.";
            }
        }

        return ["result"=>$res,"msg"=>$msg];
    }

50) Delete API
- Route::delete("delete_user_data/{id}",[UsersPostPutDeleteApiController::class,"delete_user_data"]);
function delete_user_data($id){
        $res = 0;
        $msg = "Something went wrong. Please try again.";
        if(isset($id) && $id>0){
            $user_data = User::find($id);
            $result = $user_data->delete();
            if($result){
                $res = 1;
                $msg = "Data deleted successfully.";
            }
        }
        return ["result"=>$res,"msg"=>$msg];
    }