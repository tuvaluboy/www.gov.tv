<?php

namespace App\Http\Controllers\Front;

use Carbon\Carbon;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateNewsandUpdateRequest;
use App\Http\Resources\Admin\NewsandUpdateResource;
use App\Imageslide;
use App\NewsandUpdate;
use App\Budget;
use App\Vacancy;
use App\Page;
use App\Aboutuvalu;
use App\Tuvaluconstition;
use App\Tuvaludevelopmentplan;
use App\Holiday;
use App\ServiceCategory;
use App\ServicesSubCategory;
use App\Service;
use App\Picture;
use App\Category;
use App\item;
use App\DirectoryCategory;
use App\DirectorySubCategory;
use App\DirectoryContent;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Models\Media;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        //Should initialise page to Home

        // $page = Page::where('name','=','Home')->get();
        // $pictures = Picture::where('page_id','=',$page[0]->id)->get();

        // $imageslides = Imageslide::where('page_id','=',$pageid);
        $imageslides = Imageslide::all();
        // return $imageslides;

        $servicescategories = ServiceCategory::where('status','Publish')->get();
        $counts = ServiceCategory::where('status','Publish')->count();
        $titlename = "Welcome to Gov.tv | Government of Tuvalu";

        return view('front.home', compact('titlename','imageslides','counts','servicescategories'));

    }

    public function directory(){
        $titlename = "Directory";
        $diretorycategory = DirectoryCategory::all()->where('status','Publish');
        return view('front.directorycategory',compact('diretorycategory','titlename'));
    }

    public function directorysubcategory($id){
        $directorycategory = DirectoryCategory::find($id);
        $directorysubcategory = DirectorySubCategory::where('directorycategory_id','=',$directorycategory->id)->where('status','Publish')->get();
        $titlename= $directorycategory->title;

        return view('front.directorysubcategory',compact('directorycategory','titlename','directorysubcategory'));
    }

    public function directorycontent($content_id, $subcategory_id){
        // find the content
        $directorycontent = DirectoryContent::find($content_id);
        // find the subcategory that was connected
        $directorysubcategory = DirectorySubCategory::find($subcategory_id);
        // fint all the content that has same content with the selected
       // $directorycontents = DirectoryContent::where( ,$directorycontent->directorysubcategory_id )->where('status','Publish')->get();

        $titlename = $directorycontent->title;

        return view('front.directorycontent',compact('titlename','directorycontent','directorysubcategory'));
    }
    public function directorycontentsingle($content_id){
        // find the content
        $directorycontent = DirectoryContent::find($content_id);
        // find the subcategory that was connected
        $directorysubcategory = DirectorySubCategory::find($subcategory_id);
        // fint all the content that has same content with the selected
       // $directorycontents = DirectoryContent::where( ,$directorycontent->directorysubcategory_id )->where('status','Publish')->get();

        $titlename = $directorycontent->title;

        return view('front.directorycontent',compact('titlename','directorycontent','directorysubcategory'));
    }

    public function budget(){
        $budgets = Budget::all();
        return view('front.budget',compact('budgets'));
    }

    public function vacancies(){
        $vacancies = Vacancy::all()->where('status','=','Publish')->where('duedate','>',Carbon::now());
        return view('front.vacancies',compact('vacancies'));
    }
    public function showvacancies($id){
        $vacancy = Vacancy::find($id);

        // $vacancies = Vacancy::all()->where('status','=','Publish');
        return view('front.showvacancy',compact('vacancy'));
    }

    public function news(){
        $news = NewsandUpdate::where('type','=','news')->orderBy('created_at','asc')->get();

        return view('front.news',compact('news'));
    }

    public function shownews($id){
        $new = NewsandUpdate::find($id);
        return view('front.shownews',compact('new'));
    }
    public function announcement(){
        // $announcements = DB::table('newsand_updates')
        // ->where('type','=','update')
        // ->orderBy('created_at','desc')
        // ->get();

        $announcements = NewsandUpdate::where('type','=','update')->orderBy('created_at','asc')->get();
        // $announcements = NewsandUpdate::all();
        return view('front.announcement', compact('announcements'));
    }
    public function showannouncement( $id){
        // $announcement = DB::table('newsand_updates')
        // ->where('id','=',$id)
        // ->get();
        $announcement = NewsandUpdate::find($id);
        return view('front.showannouncement', compact('announcement'));
    }

    public function contact(){
        $titlename = "Contacts";
        return view('front.contacts', compact('titlename'));

    }

    // About Controller
    public function about(){
        $about = Aboutuvalu::first();
        $constitution = Tuvaluconstition::first();
        $tuvaludevelopmentplan = Tuvaludevelopmentplan::first();
        $holiday = Holiday::first();
        $titlename = "About";
       // return $about->description;
        return view('front.about', compact('about','titlename','constitution','tuvaludevelopmentplan','holiday'));
    }
    // Services Sub category
    public function showsubcategory($id){
        //find the category
        $serviceCategory = ServiceCategory::find($id);
        $subcategories = ServicesSubCategory::all()->where('servicescategory_id',$id)->where('status','Publish');
        $titlename = $serviceCategory->title;


        return view('front.servicessubcategory', compact('titlename','subcategories','serviceCategory'));
    }
    // Services Content
    public function services($id){
        $service = Service::find($id);
        $services = Service::where('servicessubcategory_id',$service->servicessubcategory_id)->where('status','Publish')->get();
        $subcategories = ServicesSubCategory::find($service->servicessubcategory_id);
        $serviceCategory = ServiceCategory::find($subcategories->servicescategory_id);
        //return $service->contacts[0]->contentDirectorySubCategories->id;
        $titlename = $service->title;
        return view('front.services', compact('titlename','service','services','subcategories','serviceCategory'));
    }

    public function mediacenter(){
        $categories = Category::all();
        $titlename = "Media";

        return view('front.media',compact('categories','titlename'));
    }

    public function medialist($id){
        $category = Category::find($id);
        $items = Item::where('categories_id',$category->id)->where('status','Publish')->orderBy('CREATED_AT', 'desc')->paginate(5);
        $titlename = $category->title;

        return view('front.medialist',compact('items','titlename','category'));
    }
    public function mediashow($id){
        $selecteditem = Item::find($id);
        $categoryid = $selecteditem->categories_id;
        $category = Category::find($categoryid);
        $items = Item::where('categories_id',$category->id)->paginate(5);
        $titlename = $selecteditem->title;

        return view('front.mediashow',compact('category','items','titlename','selecteditem'));
    }

    public function search(Request $request){
        $titlename = "Search Result";
        //search services
        $services = Service::filterByRequest($request)->where('status','Publish')->get();
        //search directory
        $directories = DirectoryContent::where('title',$request->search)->where('status','Publish')->get();
        //search news
        $mediaitems = item::where('title',$request->search)->where('status','Publish')->get();


        $countresult = $services->count() + $directories->count() + $mediaitems->count();
        //return $services;
        return view('front.search',compact('services','directories','mediaitems','titlename','countresult'));
    }
}
