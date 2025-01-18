<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use Illuminate\Support\Facades\DB;
use App\Models\Comment;

use Illuminate\Support\Facades\Validator;

class SearchController extends Controller
{
    
    public function seachbox(Request $request){

        $request->validate([
            'name' =>'required',
            'search' => 'required|string',
            
      
        ]);


        $title_id = $request->name;
        $seach_text = $request->search;

        $sql = DB::table('book')->where($title_id, 'like', '%' . $seach_text . '%')->paginate(10);

        // dd($sql);

        return view('booktable', compact('sql'))->with('success', 'Your comment has been posted successfully!');
       
      
       

    }

    public function inbox(){

        $sql = Book::paginate(10);
        // dd($sql);\

        return view('booktable', compact('sql'));

    }


    public function details($id){

        
        $data = Book::find($id);
        // dd($data);

        $ratingData = $this->rating($id);
        $allcomment = $this->comment($id);
        // dd($allcomment);

        return view('details', compact('data', 'ratingData', 'allcomment'));
    }


    public function rating($id){

      
        $count = Comment::where('book_id', $id)->count();
        if($count > 0){
            $sum = Comment::where('book_id', $id)->sum('rating');
            $divide = round($sum/$count);
            return $divide;
        }else{
            return 0;
        }


      

        
    }

    public function comment($id){
        // $allcoment = Comment::where('book_id', $id)->get();

        $data = DB::select('SELECT comment.*, users.name as user_name 
        FROM comment 
        JOIN users ON comment.user_id = users.id 
        WHERE comment.book_id = ?', [$id]);

        return $data;
    }


    
}
