<?php

namespace App\Http\Controllers;

use App\Models\Provider;
use App\Models\Report;
use App\Models\Schedule;
use App\Models\Source;
use App\Models\Waste;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ScheduleController extends Controller
{
  public function __construct()
  {
    $this->middleware("auth");
  }
  /**
   * Display a listing of the resource.
   */
  public function index()
  {
    $schedules = Schedule::all();
    $sources = DB::table('sources')->get();
    $requests = Schedule::where('step', '0')->get();
    $processes = Schedule::where('step', '1')->get();

    return view('ehwunioleo.schedules.index', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
      'requests' => $requests,
      'processes' => $processes,
      'sources' => $sources,
    ]);
  }

  /**
   * Show the form for creating a new resource.
   */
  public function create()
  {
    $schedules = Schedule::all();
    $wastes = Waste::all();
    $sources = DB::table('sources')->get();

    return view('ehwunioleo.schedules.create', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
      'wastes' => $wastes,
      'sources' => $sources,
    ]);
  }

  public function check(Request $request)
  {
    $waste_code = Waste::where('waste_name', $request->waste)->value('waste_code');
    $packaging = Waste::where('waste_name', $request->waste)->value('packaging');

    return response()->json(['waste_code' => $waste_code, 'packaging' => $packaging]);
  }

  /**
   * Store a newly created resource in storage.
   */
  public function store(Request $request)
  {

    // dd($request);
    $request->validate([
      'waste_name' => 'required',
      'amount' => 'required',
      'weight' => 'required',
      'packaging' => 'required',
      'source' => 'required',
      'note' => 'required',
    ]);

    $requests = [
      'user_name' => $request->user_name,
      'user_id' => $request->user_id,
      'waste_name' => $request->waste_name,
      'waste_code' => $request->waste_code,
      'amount' => $request->amount,
      'weight' => $request->weight,
      'packaging' => $request->packaging,
      'source' => $request->source,
      'status' => 'On Request',
      'note' => $request->note,
    ];

    Schedule::create($requests);

    return redirect('/schedule')->with('success', 'Request pengangkutan LB3 berhasil dikirim!');
  }

  /**
   * Display the specified resource.
   */
  public function detail($id)
  {
    $schedules = Schedule::where('id', $id)->get();
    $sources = Source::all();

    return view('ehwunioleo.schedules.detail', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
      'sources' => $sources,
      'id' => $id,
    ]);
  }

  public function delete($id) {
    Schedule::where('id', $id)->delete();

    return redirect('/dashboard')->with('danger', 'Data Request telah berhasil dihapus!');
  }

  /**
   * Show the form for editing the specified resource.
   */
  public function resubmit(Request $request, $id)
  {
    Schedule::where('id', $id)->update([
      'status' => 'Resubmit',
      'amount' => $request->amount,
      'weight' => $request->weight,
      'packaging' => $request->packaging,
      'source' => $request->source,
      'note' => $request->note,
    ]);

    return redirect('/dashboard')->with('success', 'Data Request telah berhasil dikirim ulang!');
  }

  /**
   * Update the specified resource in storage.
   */
  public function update(Request $request, $id)
  {
    if ($request->v_symbol == true && $request->v_packaging == true && $request->v_label == true) {
      $status = "Approved";

      $capacity = Waste::where('waste_name', $request->waste_name)->value('capacity');
      $used = Waste::where('waste_name', $request->waste_name)->value('used') + $request->amount;
      if ($capacity - $used >= 0) {
        DB::table('wastes')->where('waste_name', $request->waste_name)->update([
          'used' => $used
        ]);

        DB::table('schedules')->where('id', $request->id)->update([
          'note' => $request->note,
          'dispose_to' => '-',
          'step' => '1',
          'status' => $status,
        ]);

        return redirect('/send-request');
      } else {
        DB::table('schedules')->where('id', $request->id)->update([
          'note' => $request->note,
          'v_symbol' => $request->v_symbol,
          'v_packaging' => $request->v_packaging,
          'v_label' => $request->v_label,
          'status' => 'Pending',
        ]);

        return redirect('/dashboard')->with('warning', 'Kapasitas TPS LB3 telah penuh! Status diubah menjadi pendng!');
      }
    } else {
      $status = "Correction";
    }

    // dd($status);

    DB::table('schedules')->where('id', $id)->update([
      'note' => $request->note,
      'v_symbol' => $request->v_symbol,
      'v_packaging' => $request->v_packaging,
      'v_label' => $request->v_label,
      'status' => $status,
    ]);

    return redirect('/dashboard')->with('warning', 'Status Request diubah menjadi Correction!');
  }

  public function show(Request $request)
  {
    $schedules = Schedule::where('id', $request->id)->get();
    $providers = Provider::all();

    return view('ehwunioleo.schedules.set', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
      'providers' => $providers,
    ]);
  }

  public function set(Request $request)
  {
    DB::table('schedules')->where('id', $request->id)->update([
      'date' => $request->date,
      'status' => 'On Scheduled',
      'dispose_to' => $request->provider,
    ]);

    return redirect('/send-schedule');
  }

  public function confirm($id)
  {
    $schedules = Schedule::where('id', $id)->get();
    $providers = Provider::all();

    return view('ehwunioleo.schedules.complete', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
      'providers' => $providers,
    ]);
  }

  public function complete(Request $request, $id)
  {
    // dd($request);
    $used = Waste::where('waste_name', $request->waste_name)->value('used');
    $amount = $request->amount;

    $used = $used - $amount;
    // dd($used);

    DB::table('wastes')->where('waste_name', $request->waste_name)->update([
      'used' => $used
    ]);

    $reports = [
      'date_in' => $request->date_in,
      'date' => $request->date,
      'user_name' => $request->user_name,
      'user_id' => $request->user_id,
      'waste_name' => $request->waste_name,
      'waste_code' => $request->waste_code,
      'source' => $request->source,
      'amount' => $request->amount,
      'weight' => $request->weight,
      'packaging' => $request->packaging,
      'dispose_to' => $request->dispose_to,
      'note' => $request->note,
      'cost' => 0,
    ];

    Report::create($reports);

    DB::table('schedules')->where('id', $id)->delete();

    return redirect('/reports')->with('success', 'Pengangkutan LB3 teleh selesai dan data disimpan ke dalam reports!');
  }

  /**
   * Remove the specified resource from storage.
   */
  public function destroy(Schedule $schedule)
  {
    //
  }

  public function request_detail(Request $request)
  {
    $schedules = Schedule::where('id', $request->id)->get();

    return view('ehwunioleo.request.detail', [
      'title' => 'Penjadwalan',
      'schedules' => $schedules,
    ]);
  }

  public function request_update(Request $request)
  {
    DB::table('schedules')->where('id', $request->id)->update([
      'status' => 'On Request'
    ]);

    return redirect('/dashboard')->with('success', 'Request Pengangkutan berhasil dikirim ulang!');
  }
}
