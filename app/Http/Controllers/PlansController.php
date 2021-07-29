<?php

namespace App\Http\Controllers;

use App\Models\Calendar;
use App\Models\Goal;
use App\Models\GoalPlan;
use App\Models\ToLearn;
use App\Models\WeeklyPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PlansController extends BaseController
{
    //
    public function plans()
    {
        $plans= GoalPlan::all();
        $goals = Goal::all()
            ->keyBy('id')
            ->all();

        return \view('plans.plans',[

            'selected_navigation' => 'plans',
            'plans'=> $plans,
            'goals'=> $goals
        ]);
    }
    public function weeklyPlans()
    {    $plans= WeeklyPlan::all();

        return \view('plans.weekly-planner',[

            'selected_navigation' => 'weekly-plans',
            'plans'=>  $plans
        ]);
    }
    public function weeklyPlan(Request $request)
    {

        $plan = false;

        if($request->id)
        {
            $plan = WeeklyPlan::find($request->id);
        }

        return \view('plans.weekly-plan',[

            'selected_navigation' => 'weekly-plan',
            'plan'=> $plan,
        ]);
    }

    public function weeklyPlanPost(Request $request)
    {
        $request->validate([

            'title'=>'required|max:150',
            'id'=>'nullable|integer',

        ]);

        $plan = false;

        if($request->id){

            $plan = WeeklyPlan::find($request->id);
        }

        if(!$plan){

            $plan = new WeeklyPlan();
            $plan->uuid = Str::uuid();
        }

        $plan->title = $request->title;

        $plan->from_date = $request->from_date;
        $plan->to_date = $request->to_date;
        $plan->saturday = clean($request->saturday);
        $plan->sunday = clean($request->sunday);
        $plan->monday = clean($request->monday);
        $plan->tuesday = clean($request->tuesday);
        $plan->wednesday = clean($request->wednesday);
        $plan->thursday = clean($request->thursday);
        $plan->friday = clean($request->friday);
        $plan->notes = clean($request->notes);
        $plan->save();

        return redirect('/weekly-plans');


    }



    public function goalPlans(Request $request)
    {
        $goals= Goal::all();

        $plan = false;

        if($request->id)
        {
            $plan = GoalPlan::find($request->id);
        }

        return \view('plans.goal-plan',[

            'selected_navigation' => 'plans',
            'plan'=> $plan,
            'goals'=> $goals
        ]);
    }

    public function goalPlanPost(Request $request)
    {
        $request->validate([

            'title'=>'required|max:150',
            'id'=>'nullable|integer',

        ]);

        $plan = false;

        if($request->id){

            $plan = GoalPlan::find($request->id);
        }



        if(!$plan){

            $plan = new GoalPlan();
            $plan->uuid = Str::uuid();
        }

        $plan->title = $request->title;
        $plan->goal_id = $request->goal_id;
        $plan->date = $request->date;
        $plan->description = clean($request->description);


        $plan->save();

        return redirect('/plans');


    }


    public function calendarAction(Request $request,$action = '')
    {
        switch ($action)
        {
            case '':
                $events = Calendar::all();

                return \view('plans.calendar',[

                    'selected_navigation' => 'calendar',
                    'events'=> $events
                ]);
                break;

            case 'event':

                $request->validate([
                    'id' => 'nullable|integer',
                ]);

                $event = false;

                if($request->id)
                {
                    $event = Calendar::find($request->id);
                }

                return \view('plans.event',[

                    'selected_navigation' => 'calendar',
                    'event' => $event,

                ]);
                break;

        }

    }


    public function eventPost(Request $request)
    {
        $request->validate([

            'title'=>'required|max:150',
            'id'=>'nullable|integer',

        ]);

        $event = false;

        if($request->id){

            $event = Calendar::find($request->id);
        }

        if(!$event){

            $event = new Calendar();
            $event->uuid = Str::uuid();
        }

        $event->title = $request->title;

        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->description = $request->description;
        $event->save();

        return redirect('/calendar');


    }
}
