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
use App\MinistryContent;
use App\Content;
use App\BackgroundImage;
use Illuminate\Support\Facades\DB;
use Spatie\MediaLibrary\Models\Media;

use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function index(){
        //Get image background for Home
        $pagename = "Home";
        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $backgroundimagemiddle = BackgroundImage::where('page','Homesecond')->where('status','Publish')->first();
        $media = Category::all();

        $servicescategories = ServiceCategory::where('status','Publish')->get();
        $counts = ServiceCategory::where('status','Publish')->count();
        $titlename = "Welcome to Gov.tv | Government of Tuvalu";

        //Directory
        $diretorycategories = DirectoryCategory::where('status','Publish')->get();
        $first = reset($diretorycategories);
        $last  = end($diretorycategories);
      //  return $last;
        $counts_directory = DirectoryCategory::where('status','Publish')->count();
        return view('front.home', compact('titlename','counts','servicescategories','diretorycategories','counts_directory','first','last','backgroundimagetop','backgroundimagefooter','backgroundimagemiddle','media'));

    }

    public function directory(){
        $titlename = "Directory";
        $diretorycategory = DirectoryCategory::all()->where('status','Publish');
        return view('front.directorycategory',compact('diretorycategory','titlename'));
    }

    public function directorysubcategory($id){
        $pagename = "Directory";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $directorycategory = DirectoryCategory::find($id);
        $directorysubcategory = DirectorySubCategory::where('directorycategory_id','=',$directorycategory->id)->where('status','Publish')->get();
        $titlename= $directorycategory->title;

        return view('front.directorysubcategory',compact('directorycategory','titlename','directorysubcategory','backgroundimagetop','backgroundimagefooter'));
    }

    public function directorycontent($content_id){
        $pagename = "Directory";
        // find the content
        $directorycontent = DirectoryContent::find($content_id);
        // find the subcategory that was selected
       // $directorysubcategory = DirectorySubCategory::find($subcategory_id);
        // fint all the content that has same content with the selected
       // $directorycontents = DirectoryContent::where( ,$directorycontent->directorysubcategory_id )->where('status','Publish')->get();
       $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
       $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();

        $titlename = $directorycontent->title;

        return view('front.directorycontent',compact('titlename','directorycontent','backgroundimagetop','backgroundimagefooter'));
    }
    public function directorycontentministry($content_id){
        $pagename = "Directory";
        // find the content
        $directorycontent = MinistryContent::find($content_id);
        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();


        // find the subcategory that was connected

       // $directorysubcategory = DirectorySubCategory::find($subcategory_id);
        // fint all the content that has same content with the selected
       // $directorycontents = DirectoryContent::where( ,$directorycontent->directorysubcategory_id )->where('status','Publish')->get();

        $titlename = $directorycontent->title;

        return view('front.directoryministrycontent',compact('titlename','directorycontent','backgroundimagetop','backgroundimagefooter'));
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

        $contents = Content::all();
        $titlename = "About";
       // return $about->description;
        return view('front.about', compact('titlename','contents'));
    }

    // About content Controller
    public function aboutcontent($id){

        $content = Content::find($id);
        $titlename = "About";
       // return $about->description;
        return view('front.aboutcontent', compact('titlename','content'));
    }


    // Services Sub category
    public function showsubcategory($id){
        $pagename = "Services";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $serviceCategory = ServiceCategory::find($id);
        $subcategories = ServicesSubCategory::all()->where('servicescategory_id',$id)->where('status','Publish');
        $titlename = $serviceCategory->title;

        return view('front.servicessubcategory', compact('titlename','subcategories','serviceCategory','backgroundimagetop','backgroundimagefooter'));
    }
    // Services Content
    public function services($id){
        $pagename = "Services";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $service = Service::find($id);
        $services = Service::where('servicessubcategory_id',$service->servicessubcategory_id)->where('status','Publish')->get();
        $subcategories = ServicesSubCategory::find($service->servicessubcategory_id);
        $serviceCategory = ServiceCategory::find($subcategories->servicescategory_id);

        $titlename = $service->title;
        return view('front.services', compact('titlename','service','services','subcategories','serviceCategory','backgroundimagetop','backgroundimagefooter'));
    }

    public function mediacenter(){
        $categories = Category::all();
        $titlename = "Media";

        return view('front.media',compact('categories','titlename'));
    }

    public function medialist($id){
        $pagename = "Media";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $category = Category::find($id);
        $items = Item::where('categories_id',$category->id)->where('status','Publish')->orderBy('CREATED_AT', 'desc')->paginate(5);
        $titlename = $category->title;

        return view('front.medialist',compact('items','titlename','category','backgroundimagetop','backgroundimagefooter'));
    }
    public function mediashow($id){
        $pagename = "Media";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();
        $selecteditem = Item::find($id);
        $categoryid = $selecteditem->categories_id;
        $category = Category::find($categoryid);
        $items = Item::where('categories_id',$category->id)->paginate(5);
        $titlename = $selecteditem->title;

        return view('front.mediashow',compact('category','items','titlename','selecteditem','backgroundimagetop','backgroundimagefooter'));
    }

    public function search(Request $request){
        $titlename = "Search Result";
        $pagename = "Search";

        $backgroundimagetop = BackgroundImage::where('page',$pagename)->where('status','Publish')->first();
        $backgroundimagefooter = BackgroundImage::where('page','Footer')->where('status','Publish')->first();

        //search services
        $services = Service::where('title','LIKE',$request->search)->where('status','Publish')
        ->get();
        //search directory
        $directories = DirectoryContent::where('title','LIKE',$request->search)->where('status','Publish')->get();
        //search news
        $mediaitems = item::where('title','LIKE',$request->search)->where('status','Publish')->get();


        $countresult = $services->count() + $directories->count() + $mediaitems->count();
        //return $services;
        return view('front.search',compact('services','directories','mediaitems','titlename','countresult','backgroundimagetop','backgroundimagefooter'));
    }
}
