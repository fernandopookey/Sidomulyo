<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\BlogComment;
use App\Models\Floating;
use App\Models\FourthFloating;
use App\Models\Header;
use App\Models\SecondFloating;
use App\Models\Sosmed;
use App\Models\ThirdFloating;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class UserBlogCommentController extends Controller
{
    public function store(Request $request)
    {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                'user_comment' => 'required|string'
            ]);

            if ($validator->fails()) {
                return redirect()->back()->with('success', 'Comment area is mandetory');
            }

            $blog = Blog::where('slug', $request->blog_slug)->first();
            if ($blog) {
                BlogComment::create([
                    'blog_id'       => $blog->id,
                    'user_id'       => Auth::user()->id,
                    'user_comment'  => $request->user_comment
                ]);
                return redirect()->back()->with('success', 'Terima kasih atas komentar anda');
            } else {
                return redirect()->back()->with('success', 'No Such Post Found');
            }
        } else {
            return redirect()->back()->with('success', 'Login untuk tinggalkan komentar');
        }
    }

    public function delete(Request $request, $id)
    {
        $comment = BlogComment::findOrFail($id);

        $comment->delete();
        return redirect()->back()->with('success', 'Komentar Berhasil Dihapus');
    }

    // public function destroy(Request $request)
    // {
    //     if (Auth::check()) {
    //         $comment = BlogComment::where('id', $request->comment_id)->where('user_id', Auth::user()->id)->first();
    //         if ($comment) {
    //             $comment->delete();
    //             return response()->json([
    //                 'status'    => 200,
    //                 'success'   => 'Komentar berhasil dihapus'
    //             ]);
    //         } else {
    //             return response()->json([
    //                 'status'    => 500,
    //                 'success'   => 'Something Went Wrong'
    //             ]);
    //         }
    //     } else {
    //         return response()->json([
    //             'status'    => 401,
    //             'success'   => 'Login untuk hapus komentar ini'
    //         ]);
    //     }
    // }
}
