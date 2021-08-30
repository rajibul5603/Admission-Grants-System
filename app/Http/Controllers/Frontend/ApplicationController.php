<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\AcademicLevel;
use App\Models\ApplicationTracking;
use App\Models\BankingServiceProvider;
use App\Models\BankingType;
use App\Models\District;
use App\Models\Division;
use App\Models\FamilyStatus;
use App\Models\FinancialInstitute;
use App\Models\GeneralInfo;
use App\Models\LevelWiseClass;
use App\Models\Occupation;
use App\Models\Circular;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\http\Requests\StoreApplicationInfoRequest;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreApplicationInfoRequest $request)
    {
        $user_id_no = auth()->user()->id;

        $ay = $request->academic_year;
        $cirID = str_pad($request->circular_id, 2, "0", STR_PAD_LEFT);
        $grantsType = $request->grants_name_id;
        $divID = $request->division_id;
        $distID = str_pad($request->district_id, 2, "0", STR_PAD_LEFT);
        $upaID = str_pad($request->upazila_id, 3, "0", STR_PAD_LEFT);
        $eiinNO = str_pad($request->eiin_id, 6, "0", STR_PAD_LEFT);
        $todayRand =  date("ymdHis") . mt_rand(1, 100);

        $today = Carbon::now();
        $dob = date_create($request->dob);

        $interval = $today->diff($dob);
        $age =  $interval->format("%y");



        $appNo = $ay . $cirID . $grantsType . $divID . $distID . $upaID . $eiinNO . $todayRand;
        //2020 01 1 2 01 001 105691 A210806 13 08 33 35


        $generalInfo =  new GeneralInfo([
            'user_id_no' => $user_id_no,
            'application_no' => $appNo,
            'grants_name' => $request->grants_name_id,
            'brid' => $request->brid,
            'nid' => $request->nid,
            'name' => $request->stu_name,
            'father_name' => $request->father_name,
            'father_nid' => $request->father_nid,
            'mother_name' => $request->mother_name,
            'mother_nid' => $request->mother_nid,
            'dob' => $request->dob,
            'age' => $age,
            'village' => $request->village_id,
            'circular_id' => $request->circular_id,
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'upazila_id' => $request->upazila_id,
            'union_id' => $request->union_id,


        ]);


        $generalInfo->save();

        $insertedAppID = $generalInfo->application_no;


        $applicationTracking = new ApplicationTracking([
            'application_no' => $insertedAppID,
            'is_completed' => 1,
            'user_id_no_id' => $user_id_no,
        ]);

        $applicationTracking->save();

        return redirect()->back()->with('message', 'Application Submitted Successfully');

        // $user = new User([
        //     'email' => $request->input('email'),
        //     'password' => bcrypt($request->input('password')),
        // ]);
        // $user->save();

        // $customer = new Customer([
        //     'fname' => $request->input('fname'),
        //     'lname' => $request->input('lname'),
        //     'mname' => $request->input('mname'),
        //     'contactnum' => $request->input('contactnum'),
        //     'gender' => $request->input('gender'),
        //     'lname' => $request->input('lname'),
        // ]);
        // $customer->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Fire When A Applicant hits on Apply Button.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function apply(Request $request)
    {
        try {


            $circulars = Circular::where('id', $request->id)->get();
            foreach ($circulars as $key => $value) {

                $circular_type = $value->circular_type;
            }
            // dd($circular_type);


            $today = Carbon::now();
            $application_deadline = date_create($circulars[0]->application_deadline);

            $interval = $today->diff($application_deadline);
            $daysDiff =  $interval->format("%r%a");



            $user_id_no = auth()->user()->id;
            $guardian_occupations = Occupation::all()->pluck('occupation_name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $familystatuses = FamilyStatus::all()->pluck('status_name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $divisions = Division::all()->pluck('division_name', 'id')->prepend(trans('global.pleaseSelect'), '');
            $districts = District::all()->pluck('district_name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $education_levels = AcademicLevel::all()->pluck('level_name', 'id')->prepend(trans('global.pleaseSelect'), '');

            $class_names  = LevelWiseClass::all()->pluck('class_name', 'id')->prepend(trans('global.pleaseSelect'), '');
            $banking_types  = BankingType::all()->pluck('banking_type', 'id')->prepend(trans('global.pleaseSelect'), '');
            $bank_names = BankingServiceProvider::all()->pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

            try {
                $generalInfoDataCheck = GeneralInfo::findOrFail($user_id_no);
            } catch (\Throwable $th) {

                // echo 'No generalInfoDataCheck ';
            }
            if (!empty($generalInfoDataCheck)) {
                echo 'Already Appliaction Data Exists';
            } else {
                // dd($daysDiff);
                //return view('student.application')->with('circulars', $circularData);
                if ($daysDiff > 0)
                    return view('frontend.application', compact(
                        'circulars',
                        'divisions',
                        'user_id_no',
                        'familystatuses',
                        'guardian_occupations',
                        'education_levels',
                        'class_names',
                        'bank_names',
                        'banking_types',
                        'districts',
                        'circular_type',
                    ));
                else
                    echo "Application Deadline Expire";
            }
        } catch (\Throwable $th) {
            echo "divisions or Circular Error! No Resources";
            // redirect()->to('500');
        }
    }
}
