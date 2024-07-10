<?php

namespace App\Http\Controllers;
use App\Models\Picker;
use Illuminate\Http\Request;

class SidebarController extends Controller
{
    public function getCountPickerTasks()
    {
        $user_id = auth()->user()->id;
        $count = Picker::where('user_id', $user_id)
        ->where('status', 'Pending')
        ->count();

    return $count;

    }

    public function getCountPickerReturn()
{
    $user_id = auth()->user()->id;

    $count = Picker::where('user_id', $user_id)
        ->whereIn('status', ['Refurbish', 'Dispose'])
        ->count();

    return $count;
}

}
