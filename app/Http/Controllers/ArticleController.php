<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Article;
use App\Events\ArticleWasPublished;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Event;
class ArticleController extends Controller
{
   public function index()
    {
        return view("article.index");
    }
    
    public function create()
    {
        Log::info("Request fired");
        $article_title = "Hi random title with " . str_random(10);
        $article = new Article;
        $article->title = $article_title;
        $article->save();
        
        Event::fire(new ArticleWasPublished($article_title));
        Log::info("Request ended");
        return "Artcile created successfully";
    }
}
