<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getUsers(Request $request)
    {
        $total = count(User::all());
        $per_page = $request->per_page ?? 10;

        $users = User::paginate($per_page);

        return response()->json([
            'status' => 'success',
            'data' => $users,
            'total' => $total
        ]);
    }
}