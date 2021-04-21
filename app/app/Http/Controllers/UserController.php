<?php

namespace App\Http\Controllers;
use App\User;
use App\Repositories\Repository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    //
    
    protected $user;
    
    public function __construct(User $use) {
        $this->user = new Repository($use);
    }
    
    
    public function index(Request $request){
        return $this->user->monUser(User::query(), $request);
    }
}
