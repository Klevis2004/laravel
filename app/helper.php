<?php

namespace App;

use App\Models\LibratPost;
use App\Models\User;

    function helper_user($userId) {
        $user_name =  User::where('id', $userId)
            ->select('name')
            ->first('name');
        return $user_name;
    }

    function helper_books($bookId) {
        $book_name =  LibratPost::where('id', $bookId)
            ->select('name')
            ->first('name');
        return $book_name;
    }

