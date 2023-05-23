<?php

namespace App\Http\Controllers;

use App\Models\BackgroundImage;
use App\Models\Blog;
use App\Models\Client;
use App\Models\FacilityAndMachine;
use App\Models\Floating;
use App\Models\Header;
use App\Models\HomeContent;
use App\Models\HomeTextContent;
use App\Models\Installation;
use App\Models\Machine;
use App\Models\Modal;
use App\Models\ModalHome;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\Profile;
use App\Models\Slider;
use App\Models\Sosmed;
use App\Models\SupportingFacilities;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $slider         = Slider::take(3)->get();
        $product        = Product::take(8)->get();
        $sosmed         = Sosmed::get();
        $header         = Header::get();
        $floating       = Floating::get();
        $homecontent    = HomeContent::get();
        $modalHome      = ModalHome::get();
        // $categories = Category::take(6)->latest()->get(); Ini untuk mengambil product terakhir
        // $products = Product::with(['galleries'])->take(8)->latest()->get(); ini juga untuk mengambil product terakhir

        return view('user.pages.home', [
            'slider'            => $slider,
            'product'           => $product,
            'sosmed'            => $sosmed,
            'backgroundImage'   => BackgroundImage::get(),
            'header'            => $header,
            'floating'          => $floating,
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
            'modalHome' => ModalHome::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/modalHome'
        ];

        return view('user.pages.modalHome', $data);
    }

    public function product()
    {
        $categories = ProductCategory::take(2)->get();
        $products = Product::orderBy('name')->with(['galleries', 'categories'])->take(8)->get();
        return view('user.pages.home', [
            'product'       => $products,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
            'floating'      => Floating::get(),
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
            'product'       => $post,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
            'floating'      => Floating::get(),
        ]);
    }

    public function client()
    {
        $data = [
            'client'            => Client::get(),
            'sosmed'            => Sosmed::get(),
            'header'            => Header::get(),
            'floating'          => Floating::get(),
            'content'           => 'user/pages/client'
        ];

        return view('user.pages.client', $data);
    }

    public function myprofile()
    {
        $data = [
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/user-profile'
        ];

        return view('user.pages.user-profile', $data);
    }

    public function installation()
    {
        $data = [
            'installation' => Installation::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'content' => 'user/pages/installation'
        ];

        return view('user.pages.installation', $data);
    }

    public function blog()
    {
        $data = [
            'blog'      => Blog::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/blog'
        ];

        return view('user.pages.blog', $data);
    }

    public function blogdetail(Blog $post)
    {

        $data = [
            'blog'      => $post,
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
        ];

        return view('user.pages.blogDetail', $data);

        // return view('user.pages.blogdetail', [
        //     'blog'      => $post,
        //     'sosmed'    => Sosmed::get(),
        //     'header'    => Header::get(),
        // ]);
    }

    public function profile()
    {
        $data = [
            'profile'   => Profile::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/profile'
        ];

        return view('user.pages.profile', $data);
    }

    public function facilityandmachine()
    {
        $data = [
            'facilityandmachine' => FacilityAndMachine::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/facility&machine'
        ];

        return view('user.pages.facilityandmachine', $data);
    }

    public function facility()
    {
        $data = [
            'facility'  => SupportingFacilities::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/facility'
        ];

        return view('user.pages.facility', $data);
    }

    public function machine()
    {
        $data = [
            'machine'   => Machine::get(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'floating'  => Floating::get(),
            'content'   => 'user/pages/machine'
        ];

        return view('user.pages.machine', $data);
    }

    public function machinedetails(Machine $post)
    {

        return view('user.pages.machinedetails', [
            'machine'       => $post,
            'sosmed'        => Sosmed::get(),
            'header'        => Header::get(),
            'floating'      => Floating::get(),
        ]);
    }

    public function floating()
    {
        $data = [
            'floating'  => Floating::all(),
            'sosmed'    => Sosmed::get(),
            'header'    => Header::get(),
            'content'   => 'user/includes/floating'
        ];

        return view('user.includes.floating', $data);
    }
}