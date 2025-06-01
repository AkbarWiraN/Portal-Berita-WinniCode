<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\ArticleNews;
use App\Models\Author;
use App\Models\BannerAdvertisement;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $categories = Category::all();

        $articles = ArticleNews::with(['category'])
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(3)
        ->get();

        $featured_articles = ArticleNews::with(['category'])
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(5)
        ->get();

        $authors = Author::all();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        $teknologi_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Teknologi');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(10)
        ->get();

        $teknologi_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Teknologi');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(1)
        ->get();
        
        $politik_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Politik');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(10)
        ->get();

        $politik_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Politik');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(1)
        ->get();
        
        $olahraga_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Olahraga');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(10)
        ->get();

        $olahraga_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Olahraga');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(1)
        ->get();
        
        $ekonomi_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Ekonomi');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(10)
        ->get();

        $ekonomi_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Ekonomi');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(1)
        ->get();
        
        $kesehatan_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Kesehatan');
        })
        ->where('is_featured', 'not_featured')
        ->latest()
        ->take(10)
        ->get();

        $kesehatan_featured_articles = ArticleNews::whereHas('category', function ($query) {
            $query->where('name', 'Kesehatan');
        })
        ->where('is_featured', 'featured')
        ->inRandomOrder()
        ->take(1)
        ->get();
        

        return view('front.index', compact('kesehatan_articles', 'kesehatan_featured_articles','ekonomi_articles', 'ekonomi_featured_articles','teknologi_articles', 'teknologi_featured_articles','politik_articles', 'politik_featured_articles','olahraga_articles', 'olahraga_featured_articles', 'categories', 'articles', 'authors', 'featured_articles', 'bannerads'));
    }

    public function category(Category $category){
        $categories = Category::all();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        return view('front.category', compact('category', 'categories', 'bannerads'));
    }

    public function author(Author $author){
        $categories = Category::all();
        $authors = Author::all();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        return view('front.author', compact('author', 'categories', 'bannerads', 'authors'));
    }


    public function search(Request $request){
        $request->validate([
            'keyword'=>['required', 'string', 'max:255'],
        ]);
        $categories = Category::all();
        $keyword = $request->keyword;

        $articles = ArticleNews::with(['category', 'author'])
        ->where('name', 'like', '%' . $keyword . '%')->get();

        return view('front.search', compact('categories', 'keyword', 'articles'));
    }

    public function details(ArticleNews $articleNews){
        $categories = Category::all();
        $authors = Author::all();

        $articles = ArticleNews::with(['category', 'author'])
        ->where('is_featured', 'not_featured')
        ->where('id', '!=', '$articleNews->id')
        ->latest()
        ->take(3)
        ->get();

        $bannerads = BannerAdvertisement::where('is_active', 'active')
        ->where('type', 'banner')
        ->inRandomOrder()
        // ->take(1)
        ->first();

        return view('front.details', compact('articleNews', 'categories', 'articles', 'bannerads'));
    }
}
