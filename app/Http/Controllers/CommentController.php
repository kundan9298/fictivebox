<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;

class CommentController extends Controller
{
    
    public function storecomment(Request $request){

    
        
        $data = new Comment();
        $data->comment = $request->comment;
        $data->rating = $request->rating;
        $data->user_id = $request->user_id;
        $data->book_id= $request->book_id;

        $data->save();

        if($data->save()){
            return redirect()->back()->with('success', 'Comment Post Successfull..');
        }
        else{
            return redirect()->back()->with('success', 'Comment not Post Successfull..');
        }


        

    }
}
