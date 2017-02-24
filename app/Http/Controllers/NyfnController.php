<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Region;
use App\Zone;
use App\District;
use Carbon\Carbon;
use Session;
use File;

class NyfnController extends Controller
{
    public function admin()
    {
        $subWeek=Carbon::now()->subWeek();

        $users=User::all();
        $districts=District::all();
        foreach($users as $user)
        {
            if($user->created_at < $subWeek && $user->is_approved != 1)
            {
                 $file_path = app_path("uploads/masters/logocatagory_Computers/{$user->image}");

                 if(File::exists($file_path)) 
                    {
                        File::delete($file_path); 
                    }  
                
                $user->delete();
            }
        }
        return view('admin')->with(['users'=>$users,'districts'=>$districts,'flag'=>'method1']);
    }

    public function search(Request $request)
    {
        $users=User::where('district_involved',$request->district_involved)->get();
        $districts=District::all();

        return view('admin')->with(['users'=>$users,'districts'=>$districts,'district_involved'=>$request->district_involved, 'flag'=>'method2']);
    }

    public function registerMember()
    {
        $region=Region::all();
        return view('auth.register')->with('region',$region);
    }

    public function getZone(Request $request)
    {
        $zone=Zone::where('region_id', $request->id)->get();
        return Response()->json(array('status'=>TRUE, 'zone'=>$zone));
    }

    public function getDistrict(Request $request)
    {
        $district=District::where('zone_id', $request->id)->get();
        return Response()->json(array('status'=>TRUE, 'district'=>$district));
    }

    public function delete(Request $request)
    {
       $user=User::where('id',$request->id)->first();

        $file_path = app_path("uploads/masters/logocatagory_Computers/{$user->image}");
        if(File::exists($file_path)) 
        {
                File::delete($file_path); 
        }   

       if($user)
        {
            $user->delete();
            return response()->json(['status'=>true]);
        }
        else
        {
            return 'No such record in the database';
        }
    }

    public function approve(Request $request)
    {
        $user=User::where('id',$request->id)->first();
        if($user)
        {
            $user->is_approved=1;
            $user->created_at=Carbon::now();
            $user->update();
            return response()->json(['status'=>true]);
        }
        else
        {
            return 'No such record in the database';
        }
    }

    public function show($id)
    {
        $user=User::where('id',$id)->first();
        if($user)
        {
            return view('show')->with('user',$user);
        }
        return 'No Such Record In Database';          
    }

    public function update(Request $request, $id)
    {
        $user=User::where('id',$id)->first();
        if($user)
        {
            $user->name=$request->name;
            $user->father_name=$request->father_name;
            $user->mother_name=$request->mother_name;
            $user->dob=$request->dob;
            $user->gender=$request->gender;
            $user->region_id=$request->region;
            $user->tregion_id=$request->tregion;
            $user->zone_id=$request->zone;
            $user->tzone_id=$request->tzone;
            $user->district_id=$request->district;
            $user->vdc_mun=$request->vdc_mun;
            $user->tvdc_mun=$request->tvdc_mun;
            $user->ward_no=$request->ward_no;
            $user->tward_no=$request->tward_no;
            $user->district_involved=$request->district_involved;
            $user->profession=$request->profession;
            $user->mobile=$request->mobile;
            $user->phone=$request->phone;
            $user->office_phone=$request->office_phone;
            $user->refrence=$request->refrence_name;
            $user->refrence_no=$request->refrence_no;
            $user->email=$request->email;
            $user->password=bcrypt($request->password);

            if(empty($request->uploadedimage))
            {
                $user->image=$request->uploadedimage1;
            }
            else
            {
                  $user->image=$request->uploadedimage;
            }

            if($user->update())
            {
                $message= "Successfully Updated! ";

                Session::flash('message', $message); 
                return redirect('/home');
            }
               
        }
            return 'No Such Record In Database';          
    }


    public function edit($id)
    {
        $region=Region::all();
        $districts=District::all();
        $user=User::where('id',$id)->first();
        if($user)
        {
            return view('edit')->with(['user'=>$user,'region'=>$region,'districts'=>$districts]);
        }
        return 'No Such Record In Database';          
    }

    public function uploadimage()
    {
        $target_dir = public_path('newuploads');
        $tmpname = $_FILES["image"]["tmp_name"];
        $temp = explode(".", $_FILES["image"]["name"]);
        $newfilename = round(microtime(true)) . '.' . end($temp);
        $target_file= $target_dir.DIRECTORY_SEPARATOR.basename($newfilename);
        if(move_uploaded_file($tmpname, $target_file)){
            echo json_encode($newfilename);die;
        }
        else
        {
            echo json_encode(false);die;
        }
    }

    public function checkEmail(Request $request)
    {
        if($request->ajax())
        {
            $check=User::where(['email'=>$request->email])->first();
            if(!$check)
            {
                echo json_encode(TRUE);die;
            }

            echo json_encode(FALSE);die;
        }   
    }

}


