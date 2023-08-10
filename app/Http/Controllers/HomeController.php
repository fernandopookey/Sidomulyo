<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use App\Models\Blog;
use App\Models\Client;
use App\Models\FacilityAndMachine;
use App\Models\FAQ;
use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\HomeContent;
use App\Models\HomeTextContent;
use App\Models\Installation;
use App\Models\Machine;
use App\Models\Modal;
use App\Models\ModalHome;
use App\Models\PrivacyPolicy;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\SecondFloating;
use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\SupportingFacilities;
use App\Models\TermsAndConditions;
use App\Models\ThirdFloating;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider             = Slider::where('status', 'Enable')->get();
        $product            = Product::take(8)->get();
        $sosmed             = Sosmed::get();
        $header             = Header::get();
        $floating           = Floating::get();
        $secondFloating     = SecondFloating::get();
        $thirdFloating      = ThirdFloating::get();
        $fourthFloating     = FourthFloating::get();
        $homecontent        = HomeContent::get();
        $modalHome          = ModalHome::where('status', 'Enable')->get();
        // $categories = Category::take(6)->latest()->get(); Ini untuk mengambil product terakhir
        // $products = Product::with(['galleries'])->take(8)->latest()->get(); ini juga untuk mengambil product terakhir

        return view('user.pages.home', [
            'slider'            => $slider,
            'product'           => $product,
            'sosmed'            => $sosmed,
            'backgroundImage'   => BackgroundImage::get(),
            'header'            => $header,
            'floating'          => $floating,
            'secondFloating'    => $secondFloating,
            'thirdFloating'     => $thirdFloating,
            'fourthFloating'    => $fourthFloating,
            'homecontent'       => $homecontent,
            'modalHome'         => $modalHome,
            'homeTextContent'   => HomeTextContent::get(),
            // 'modal'          => $modal
        ]);

        // return view('user.pages.home');
    }

    public function modalHome()
    {
        $data = [
            'modalHome'         => ModalHome::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/modalHome'
        ];

        return view('user.pages.modalHome', $data);
    }

    public function product()
    {
        $categories = ProductCategory::take(2)->get();
        $products = Product::orderBy('name')->with(['galleries', 'categories'])->take(8)->get();
        return view('user.pages.home', [
            'product'           => $products,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
        ]);

        // $categories = Category::take(6)->get();
        // $products = Product::with(['galleries'])->take(8)->get();
        // // $categories = Category::take(6)->latest()->get(); Ini untuk mengambil product terakhir
        // // $products = Product::with(['galleries'])->take(8)->latest()->get(); ini juga untuk mengambil product terakhir

        // return view('pages.home', [
        //     'categories'    => $categories,
        //     'products'    => $products
        // ]);
    }

    public function productdetail(Product $post)
    {

        return view('user.pages.productdetail', [
            'product'           => $post,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
        ]);
    }

    public function client()
    {
        $data = [
            'client'            => Client::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/client'
        ];

        return view('user.pages.client', $data);
    }

    public function myprofile()
    {
        $data = [
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/user-profile'
        ];

        return view('user.pages.user-profile', $data);
    }

    public function installation()
    {
        $data = [
            'installation'      => Installation::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content' => 'user/pages/installation'
        ];

        return view('user.pages.installation', $data);
    }

    public function blog()
    {
        $blog           = Blog::paginate(4);
        $latest_post    = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $about          = Profile::first();

        $data = [
            'blog'              => $blog,
            'latestPost'        => $latest_post,
            'about'             => $about,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/blog'
        ];

        return view('user.pages.blog', $data);
    }

    public function blogdetail(Blog $post)
    {
        $latest_post    = Blog::orderBy('created_at', 'desc')->take(2)->get();
        $about          = Profile::first();

        $data = [
            'blog'              => $post,
            'latestPost'        => $latest_post,
            'about'             => $about,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
        ];

        return view('user.pages.blogDetail', $data);
    }

    public function profile()
    {
        $data = [
            'profile'           => Profile::first(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/profile'
        ];

        return view('user.pages.profile', $data);
    }

    public function facilityandmachine()
    {
        $data = [
            'facilityandmachine'    => FacilityAndMachine::get(),
            'sosmed'                => Sosmed::get(),
            'header'                => Header::get(),
            'floating'              => Floating::get(),
            'secondFloating'        => SecondFloating::get(),
            'thirdFloating'         => ThirdFloating::get(),
            'fourthFloating'        => FourthFloating::get(),
            'content'               => 'user/pages/facility&machine'
        ];

        return view('user.pages.facilityandmachine', $data);
    }

    public function facility()
    {
        $data = [
            'facility'          => SupportingFacilities::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/facility'
        ];

        return view('user.pages.facility', $data);
    }

    public function machine()
    {
        $data = [
            'machine'           => Machine::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/machine'
        ];

        return view('user.pages.machine', $data);
    }

    public function machinedetails(Machine $post)
    {

        return view('user.pages.machinedetails', [
            'machine'           => $post,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
        ]);
    }

    public function floating()
    {
        $data = [
            'floating'          => Floating::all(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'content'           => 'user/includes/floating'
        ];

        return view('user.includes.floating', $data);
    }

    public function faqs()
    {
        $faqs = FAQ::get();

        $data = [
            'faqs'              => $faqs,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/faqs',
        ];

        return view('user.pages.faqs', $data);
    }

    public function privacyPolicy()
    {
        $privacyPolicy = PrivacyPolicy::get();

        $data = [
            'privacyPolicy'     => $privacyPolicy,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/privacy-policy',
        ];

        return view('user.pages.privacy-policy', $data);
    }

    public function termsAndConditions()
    {
        $terms = TermsAndConditions::get();

        $data = [
            'terms'             => $terms,
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'secondFloating'    => SecondFloating::get(),
            'thirdFloating'     => ThirdFloating::get(),
            'fourthFloating'    => FourthFloating::get(),
            'content'           => 'user/pages/terms-and-conditions',
        ];

        return view('user.pages.terms-and-conditions', $data);
    }
}
