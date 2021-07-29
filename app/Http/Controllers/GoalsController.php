<?php

namespace App\Http\Controllers;

use App\Models\Goal;
use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class GoalsController extends BaseController
{
    //
    public function goals()
    {
        $goals= Goal::all();

        return \view('goals.goals',[

            'selected_navigation' => 'goals',
            'goals'=> $goals
        ]);
    }
    public function setGoal(Request $request)
    {
        $goal = false;

        if($request->id)
        {
            $goal = Goal::find($request->id);
        }

        return \view('goals.set-goal',[

            'selected_navigation' => 'goals',
            'goal'=>  $goal,

        ]);
    }

    public function goalPost(Request $request)
    {
        $request->validate([

            'name'=>'required|max:150',
            'id'=>'nullable|integer',

        ]);

        $goal = false;

        if($request->id){

            $goal = Goal::find($request->id);
        }



        if(!$goal){

            $goal = new Goal();
            $goal->uuid = Str::uuid();
        }

        $goal->name = $request->name;
        $goal->date = $request->date;
        $goal->description = clean($request->description);


        $goal->save();

        return redirect('/goals');


    }
    public function goalEdit($id)
    {
        $goal = Goal::find($id);

        if ($goal){



            return \view('goals.set-goal',[

                'selected_navigation' => 'goals',



            ]);

        }
    }

    public function visionBoard()
    {    $images= Image::orderBy('id', 'DESC')->get();

        return \view('goals.vision-board',[

            'selected_navigation' => 'vision-board',
            'images'=> $images,
        ]);
    }




    public function imagePost(Request $request)
    {
        if(config('app.environment') === 'demo')
        {

            return;

        }
        $request->validate([
            'file'=>'required|image'
        ]);
        $path = false;
        if($request->file)
        {

            $path = $request->file('file')->store('public');
            $path = str_replace('public/','',$path);


        }

//        $path = $request->file('file')->store('documents');

        $image = new Image();
        $image->uuid = Str::uuid();
        $image->name= $path;
        $image->path= $path;
        $image->name = $request->file('file')->getClientOriginalName();
        $image->save();
    }


}
