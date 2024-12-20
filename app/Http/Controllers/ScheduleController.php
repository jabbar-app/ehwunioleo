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

    public function store(Request $request)
    {
        $waste = Waste::findOrFail($request->waste_id);

        $requests = [
            'user_name' => $request->user_name,
            'user_id' => $request->user_id,
            'waste_name' => $waste->waste_name,
            'waste_code' => $waste->waste_code,
            'amount' => $request->amount,
            'packaging' => $request->packaging,
            'weight' => $request->weight,
            'source' => $request->source,
            'status' => 'On Request',
            'note' => $request->note,
        ];

        Schedule::create($requests);

        return redirect()->route('dashboard')->with('success', 'Request pengangkutan LB3 berhasil dikirim!');
    }

    /**
     * Display the specified resource.
     */
    public function detail($id)
    {
        $schedule = Schedule::findOrFail($id);
        $sources = Source::all();

        return view('ehwunioleo.schedules.detail', [
            'title' => 'Penjadwalan',
            'schedule' => $schedule,
            'sources' => $sources,
            'id' => $id,
        ]);
    }

    public function delete($id)
    {
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

                return redirect()->route('dashboard')->with('success', 'Request pengangkutan LB3 berhasil diperbaharui!');
                // return redirect('/send-request');

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

        if (Auth::user()->role == 'Super Admin' || Auth::user()->role == 'Safety Leader') {
            return redirect()->route('schedules.index')->with('info', 'Status Request diubah menjadi Correction!');
        }
        return redirect()->route('dashboard')->with('info', 'Status Request diubah menjadi Correction!');
    }

    public function show(Request $request)
    {
        $schedule = Schedule::findOrFail($request->id);
        // dd($schedule);
        $providers = Provider::all();

        return view('ehwunioleo.schedules.set', [
            'title' => 'Penjadwalan',
            'schedule' => $schedule,
            'providers' => $providers,
        ]);
    }

    public function set(Request $request)
    {
        $schedule = Schedule::findOrFail($request->id);
        $schedule->update([
            'date' => $request->date,
            'status' => 'On Scheduled',
            'dispose_to' => $request->provider,
        ]);

        return redirect()->route('schedules.index')->with('success', 'Request pengangkutan LB3 berhasil diperbaharui!');

        // return redirect('/send-schedule');
    }

    public function confirm($id)
    {
        $schedule = Schedule::findOrFail($id);
        $providers = Provider::all();

        return view('ehwunioleo.schedules.complete', [
            'title' => 'Penjadwalan',
            'schedule' => $schedule,
            'providers' => $providers,
        ]);
    }

    public function complete(Request $request, $id)
    {
        $request->validate([
            'date' => 'required|date',
        ], [
            'date.required' => 'Kolom Tanggal Selesai harus diisi.',
            'date.date' => 'Kolom Tanggal Selesai harus berupa tanggal yang valid.',
        ]);

        $schedule = Schedule::findOrFail($id);

        // dd($request->all());
        $used = Waste::where('waste_name', $schedule->waste_name)->value('used');
        $amount = $schedule->amount;

        $used = $used - $amount;
        // dd($used);

        DB::table('wastes')->where('waste_name', $schedule->waste_name)->update([
            'used' => $used
        ]);

        $reports = [
            'date_in' => $schedule->date,
            'date' => $request->date,
            'user_name' => $schedule->user_name,
            'user_id' => $schedule->user_id,
            'waste_name' => $schedule->waste_name,
            'waste_code' => $schedule->waste_code,
            'source' => $schedule->source,
            'amount' => $schedule->amount,
            'weight' => $schedule->weight,
            'packaging' => $schedule->packaging,
            'dispose_to' => $schedule->dispose_to,
            'note' => $schedule->note,
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
