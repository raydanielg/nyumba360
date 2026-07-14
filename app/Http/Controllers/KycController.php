<?php

namespace App\Http\Controllers;

use App\Models\KycDocument;
use App\Models\AuditLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KycController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        $user = auth()->user();
        if ($user->kyc && $user->kyc->status === 'approved') {
            return redirect()->route('dashboard')->with('info', 'Your KYC is already verified.');
        }
        return view('kyc.create', ['kyc' => $user->kyc]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        if ($user->kyc && $user->kyc->status === 'approved') {
            return redirect()->route('dashboard')->with('info', 'Your KYC is already verified.');
        }

        $rules = [
            'nida_number' => 'required|string|max:50',
            'id_card' => 'required|image|max:5120',
            'selfie' => 'required|image|max:5120',
        ];

        if ($user->isLandlord()) {
            $rules['proof_of_ownership'] = 'required|image|max:5120';
        }

        if ($user->isBroker()) {
            $rules['business_name'] = 'required|string|max:255';
            $rules['operating_area'] = 'required|string|max:255';
            $rules['business_licence'] = 'nullable|image|max:5120';
        }

        $validated = $request->validate($rules);

        $data = [
            'user_id' => $user->id,
            'nida_number' => $validated['nida_number'],
            'id_card_path' => $request->file('id_card')->store('kyc', 'private'),
            'selfie_path' => $request->file('selfie')->store('kyc', 'private'),
            'status' => 'pending',
        ];

        if ($user->isLandlord() && $request->hasFile('proof_of_ownership')) {
            $data['proof_of_ownership_path'] = $request->file('proof_of_ownership')->store('kyc', 'private');
        }

        if ($user->isBroker()) {
            $data['business_name'] = $validated['business_name'];
            $data['operating_area'] = $validated['operating_area'];
            if ($request->hasFile('business_licence')) {
                $data['business_licence_path'] = $request->file('business_licence')->store('kyc', 'private');
            }
        }

        if ($user->kyc) {
            $user->kyc->update($data);
        } else {
            KycDocument::create($data);
        }

        AuditLog::log('kyc_submitted', 'kyc', "KYC submitted for verification");

        return redirect()->route('dashboard')->with('success', 'KYC documents submitted! We will review and get back to you soon.');
    }
}
