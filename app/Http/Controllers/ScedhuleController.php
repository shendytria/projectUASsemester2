<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jadwal;

class ScedhuleController extends Controller
{
    public function update(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'monday_0800' => 'required|string|max:255',
            'tuesday_0800' => 'required|string|max:255',
            'wednesday_0800' => 'required|string|max:255',
            'thursday_0800' => 'required|string|max:255',
            'friday_0800' => 'required|string|max:255',
            'monday_1000' => 'required|string|max:255',
            'tuesday_1000' => 'required|string|max:255',
            'wednesday_1000' => 'required|string|max:255',
            'thursday_1000' => 'required|string|max:255',
            'friday_1000' => 'required|string|max:255',
            'monday_1200' => 'required|string|max:255',
            'tuesday_1200' => 'required|string|max:255',
            'wednesday_1200' => 'required|string|max:255',
            'thursday_1200' => 'required|string|max:255',
            'friday_1200' => 'required|string|max:255',
        ]);

        // Logika untuk menyimpan data jadwal ke database
        // Contoh:
        foreach ($validatedData as $key => $value) {
            Jadwal::updateOrCreate(['key' => $key], ['value' => $value]);
        }

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Jadwal berhasil diperbarui.');
    }
}
