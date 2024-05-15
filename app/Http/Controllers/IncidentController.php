<?php
namespace App\Http\Controllers;
use App\Models\Incidents;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//vibhore.mit@gmail.com
//Vibhore@123   //I have taken same password for everyuser to make it easy. 
class IncidentController extends Controller
{
    //
    public function index()
    {
        $incidents = Incidents::join('users', 'incidents.user_id', '=', 'users.id')
                    ->select('incidents.*', 'users.name as user_name')
                    ->where('users.id', '=', Auth::user()->id)
                    ->get();
                    //dd($incidents);
        //return response()->json($incidents);//REST api format;    
        return view('incidents.index', compact('incidents'));//project format
    }

    public function create()
    {
        return view('incidents.create');
    }


    public function store(Request $request)
    {
        
        $request->validate([
            'incident_details' => 'required',
            'incident_report_time' => 'required',
        ]);
        //dd($request->file('vj_file'));
        $incidents = new Incidents();

        //dd($request);
        //Post::create($request->all());
        $incidents->reporter_type = $request->reporter_type;
        $incidents->incident_id = $request->incident_id;
        $incidents->reporter_name = $request->reporter_name;
        $incidents->incident_details = $request->incident_details;
        $incidents->incident_report_time = $request->incident_report_time;
        
        $incidents->priority = $request->priority;
        $incidents->incident_status = $request->incident_status;
        $incidents->user_id = $request->user_id;
        $incidents->save();
        /*return response()->json([
            "message"=>"Incident Added"],201);//REST API
            */
        return redirect()->route('incidents.index')
            ->with('success', 'Incident created successfully.');//our project format
    }

    public function show($id)
    {
        $incidents = Incidents::find($id);
        /*REST api response 
        if(!empty($incidents))
        {
            return response()->json($incidents);
        }
        else
        {
            return response()->json(["message"=>"Incident not found"],404);
        }
        */
        return view('incidents.show', compact('incidents'));//our project response
    }

    public function edit($id)
    {
        $incidents = Incidents::find($id);
        /*restapi not applicable for this*/
        return view('incidents.edit', compact('incidents'));
    }

    public function search()
    {
        return view('incidents.search');
    }

    public function search2(Request $request)
    {
        $request->validate([
            'incident_id' => 'required',
        ]);
        $inci_id=$request->incident_id;
        $column='incident_id';
        //$incidents = Incidents::where($column, $inci_id)->get();//it will give collection we need foreach loop to process further
        $incidents = Incidents::where($column, $inci_id)->where('user_id', '=', Auth::user()->id)->first();//it will give single record.         
        if ($incidents) {
            echo $incidents->id;
        } else {
            //echo "No incident found with the given ID.";
            return redirect()->route('incidents.search')->with('success', 'No incident found with the given ID.');
        }
    return redirect()->route('incidents.show', $incidents->id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'incident_details' => 'required',
        ]);
        //dd($request);
//        $incidents = Incidents::find($id);
        if(Incidents::where('id',$id)->exists())
        {
            $incidents = Incidents::find($id);
            $incidents->incident_details = is_null($request->incident_details) ? $incidents->incident_details:$request->incident_details;//$request->incident_details;
            //$incidents->incident_report_time = $request->incident_report_time;//we are not updating it. 
            $incidents->priority = is_null($request->priority) ? $incidents->priority:$request->priority;//$request->priority;
            $incidents->incident_status = is_null($request->incident_status) ? $incidents->incident_status:$request->incident_status;//$request->incident_status;
            $incidents->save();
        //    return response()->json(["message"=>"Incident Updated"],201);//rest api
        return redirect()->route('incidents.index')
            ->with('success', 'Incident updated successfully.');
        }else
        {
        //    return response()->json(["message"=>"Incident Not found"],404);//rest api
        }    
    }

    public function destroy($id)
    {
        if(Incidents::where('id',$id)->exists())
        {
        $incidents = Incidents::find($id);
        $incidents->delete();
        //return response()->json(["message"=>"Incident Deleted"],202);//rest api
        return redirect()->route('incidents.index')
            ->with('success', 'Incident deleted successfully');
        }
        else
        {
            //return response()->json(["message"=>"Incident Not Found"],404);//rest api
        }
    }
}
