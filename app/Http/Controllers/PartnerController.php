<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Partner;

class PartnerController extends Controller
{
    public function create()
    {
        return view('dashboard', [
            'page' => 'adminWebPartnerCreate'
        ]);
    }

    public function edit($id)
    {
        return view('dashboard', [
            'page' => 'adminWebPartnerEdit',
            'partner' => Partner::findOrFail($id)
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'logo' => 'required|image'
        ]);

        $path = $request->file('logo')->store('partners', 'public');

        Partner::create([
            'name' => $request->name,
            'logo' => $path,
        ]);

        return redirect()
            ->route('dashboard', [
                'page' => 'adminWebPartnerCreate',
                'tab'  => 'partner',])
            ->with('success', 'Partner ditambahkan');
    }

    public function update(Request $request, $id)
    {
        $partner = Partner::findOrFail($id);

        if ($request->hasFile('logo')) {
            Storage::disk('public')->delete($partner->logo);
            $partner->logo = $request->file('logo')->store('partners', 'public');
        }

        $partner->update([
            'name' => $request->name,
        ]);

        return redirect()
        ->route('dashboard', [
                'page' => 'adminWebAbout',
                'tab'  => 'partner',])
        ->with('success', 'Partner diperbarui');
    }

    public function destroy($id)
    {
        $partner = Partner::findOrFail($id);
        Storage::disk('public')->delete($partner->logo);
        $partner->delete();

        return redirect()
            ->route('dashboard', [
                'page' => 'adminWebAbout',
                'tab'  => 'partner',])
            ->with('success', 'Partner dihapus');
    }
}


