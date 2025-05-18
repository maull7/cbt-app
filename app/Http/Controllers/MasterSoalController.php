<?php

namespace App\Http\Controllers;

use App\Models\Soal;
use App\Models\Ujian;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Symfony\Contracts\Service\Attribute\Required;

class MasterSoalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $ujian = Ujian::all();

        $soalQuery = Soal::with('ujian');

        if ($request->has('ujian_id') && $request->ujian_id != '') {
            $soalQuery->where('id_ujian', $request->ujian_id);
        }

        $soal = $soalQuery->get();

        return view('soal.index', compact('soal', 'ujian'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $ujian = Ujian::all();
        $kategori = Kategori::all();
        return view('soal.create', compact('kategori', 'ujian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'id_ujian' => 'required|exists:ujians,id',
            'id_kategori_soal' => 'required|exists:kategoris,id',
            'id_kategori_jawaban' => 'required|exists:kategoris,id',
            'jawaban_benar' => 'required',
            'poin' => 'required|numeric|min:0',
        ]);

        // Handle soal: text or image
        $soalValue = $request->file('soal')
            ? $request->file('soal')->store('soal_images', 'public')
            : $request->input('soal');

        // Handle pilihan 1-4: text or image
        $pilihan = [];
        for ($i = 1; $i <= 4; $i++) {
            $key = "pilihan_$i";
            $pilihan[$key] = $request->file($key)
                ? $request->file($key)->store("pilihan_images", "public")
                : $request->input($key);
        }

        // Simpan data
        Soal::create([
            'id_ujian' => $request->id_ujian,
            'id_kategori_soal' => $request->id_kategori_soal,
            'soal' => $soalValue,
            'id_kategori_jawaban' => $request->id_kategori_jawaban,
            'pilihan_1' => $pilihan['pilihan_1'],
            'pilihan_2' => $pilihan['pilihan_2'],
            'pilihan_3' => $pilihan['pilihan_3'],
            'pilihan_4' => $pilihan['pilihan_4'],
            'jawaban_benar' => $request->jawaban_benar,
            'poin' => $request->poin
        ]);

        return redirect()->back()->with('success', 'Soal berhasil disimpan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $ujian = Ujian::all();
        $kategori = Kategori::all();
        $soal = Soal::findOrFail(base64_decode($id));
        return view('soal.edit', compact('soal', 'ujian', 'kategori'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $soal = Soal::findOrFail($id);
        $request->validate([
            'id_ujian' => 'required|exists:ujians,id',
            'id_kategori_soal' => 'required|exists:kategoris,id',
            'id_kategori_jawaban' => 'required|exists:kategoris,id',
            'jawaban_benar' => 'required',
            'poin' => 'required|numeric|min:0',
        ]);

        // Handle soal: text or image
        $soalValue = $soal->soal; // Default to existing value
        if ($request->hasFile('soal')) {
            // If new file uploaded, store it
            $soalValue = $request->file('soal')->store('soal_images', 'public');
        } elseif ($request->filled('soal') && !$request->hasFile('soal')) {
            // If text input and no file uploaded, use the text value
            $soalValue = $request->input('soal');
        }
        // Otherwise keep the existing value

        // Handle pilihan 1-4: text or image
        $pilihan = [];
        for ($i = 1; $i <= 4; $i++) {
            $key = "pilihan_$i";
            $currentValue = $soal->$key; // Get current value from database

            if ($request->hasFile($key)) {
                // If new file uploaded, store it
                $pilihan[$key] = $request->file($key)->store("pilihan_images", "public");
            } elseif ($request->filled($key) && !$request->hasFile($key)) {
                // If text input and no file uploaded, use the text value
                $pilihan[$key] = $request->input($key);
            } else {
                // Otherwise keep the existing value
                $pilihan[$key] = $currentValue;
            }
        }

        // Simpan data
        $soal->update([
            'id_ujian' => $request->id_ujian,
            'id_kategori_soal' => $request->id_kategori_soal,
            'soal' => $soalValue,
            'id_kategori_jawaban' => $request->id_kategori_jawaban,
            'pilihan_1' => $pilihan['pilihan_1'],
            'pilihan_2' => $pilihan['pilihan_2'],
            'pilihan_3' => $pilihan['pilihan_3'],
            'pilihan_4' => $pilihan['pilihan_4'],
            'jawaban_benar' => $request->jawaban_benar,
            'poin' => $request->poin
        ]);

        return redirect()->back()->with('success', 'Soal berhasil disimpan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $soal = Soal::findOrFail($id);
        $soal->delete();

        return redirect()->route('master_soal.index')->with('soal berhasil di hapus');
    }
    public function createAll(string $id)
    {
        // Mendapatkan ujian dan jumlah soal
        $ujian = Ujian::findOrFail(base64_decode($id)); // Ambil data ujian
        $jumlah_soal = $ujian->jumlah_soal; // Ambil jumlah soal dari ujian
        $kategori = Kategori::all();
        return view('soal.create-soal-all', compact('ujian', 'jumlah_soal', 'kategori'));
    }

    public function storeAllExamp(Request $request)
    {

        DB::beginTransaction();
        try {
            // Validate the exam ID first
            $validator = Validator::make($request->all(), [
                'id_ujian' => 'required|exists:ujians,id',
            ]);

            if ($validator->fails()) {
                throw new \Exception('Invalid exam ID');
            }

            // Loop through each question
            foreach ($request->input('soal', []) as $i => $soalData) {
                // Normalize pilihan array to ensure keys 0 to 3 exist
                if (!isset($soalData['pilihan']) || !is_array($soalData['pilihan'])) {
                    throw new \Exception("pilihan field is required for question $i");
                }

                $normalizedPilihan = [];
                for ($j = 0; $j < 4; $j++) {
                    if (isset($soalData['pilihan'][$j + 1])) {
                        $pilihan = $soalData['pilihan'][$j + 1];
                        $normalizedPilihan[$j] = [
                            'text' => $pilihan['text'] ?? null, // Ambil text jika ada
                            'image' => $pilihan['image'] ?? null, // Ambil image jika ada
                        ];
                    } else {
                        // Jika pilihan tidak ada, buat pilihan kosong
                        $normalizedPilihan[$j] = ['text' => null, 'image' => null];
                    }
                }
                // Ganti pilihan dengan pilihan yang dinormalisasi
                $soalData['pilihan'] = $normalizedPilihan;

                // Validate the question with updated pilihan array
                $questionValidator = Validator::make($soalData, [
                    'id_kategori_soal' => 'required|in:1,2',
                    'id_kategori_jawaban' => 'required|in:1,2',
                    'text' => [
                        function ($attribute, $value, $fail) use ($soalData) {
                            if (($soalData['id_kategori_soal'] ?? null) == 1 && empty($value)) {
                                $fail('Kolom teks pertanyaan wajib diisi karena kategori soal adalah teks.');
                            }
                        }
                    ],
                    'image' => [
                        'nullable',
                        'image',
                        'max:4096',
                        function ($attribute, $value, $fail) use ($soalData) {
                            if (($soalData['id_kategori_soal'] ?? null) == 2 && empty($value)) {
                                $fail('Gambar pertanyaan wajib diunggah karena kategori soal adalah gambar.');
                            }
                        }
                    ],
                    'jawaban_benar' => 'required|in:1,2,3,4',
                    'poin' => 'required|numeric|min:0',
                    'pilihan' => 'required|array|size:4',
                    'pilihan.*.text' => [
                        function ($attribute, $value, $fail) use ($soalData) {
                            if (($soalData['id_kategori_jawaban'] ?? null) == 1 && empty($value)) {
                                $fail("Pilihan teks wajib diisi karena kategori jawaban adalah teks.");
                            }
                        }
                    ],
                    'pilihan.*.image' => [
                        'nullable',
                        'image',
                        'max:2048',
                        function ($attribute, $value, $fail) use ($soalData) {
                            if (($soalData['id_kategori_jawaban'] ?? null) == 2 && empty($value)) {
                                $fail("Pilihan gambar wajib diunggah karena kategori jawaban adalah gambar.");
                            }
                        }
                    ],
                ]);

                if ($questionValidator->fails()) {
                    throw new \Exception("Validation failed for question $i: " . $questionValidator->errors()->first());
                }

                // Prepare data to save, initially assign text or image path for pilihan after file uploads
                $soalDataToSave = [
                    'id_ujian' => $request->id_ujian,
                    'id_kategori_soal' => $soalData['id_kategori_soal'],
                    'id_kategori_jawaban' => $soalData['id_kategori_jawaban'],
                    'jawaban_benar' => $soalData['jawaban_benar'],
                    'poin' => $soalData['poin'],
                    'soal' => $soalData['text'] ?? null,
                    // Initialize pilihan with text; will update if images uploaded
                    'pilihan_1' => $soalData['pilihan'][0]['text'] ?? null,
                    'pilihan_2' => $soalData['pilihan'][1]['text'] ?? null,
                    'pilihan_3' => $soalData['pilihan'][2]['text'] ?? null,
                    'pilihan_4' => $soalData['pilihan'][3]['text'] ?? null,
                ];

                // Handle file upload for soal image if exists
                if ($request->hasFile("soal.$i.image")) {
                    $image = $request->file("soal.$i.image");
                    $path = $image->store('soal_images', 'public');
                    $soalDataToSave['soal'] = $path; // Assuming 'soal' field stores image path if image question
                }

                // Handle file uploads for each pilihan image if exists and update pilihan text fields to image path
                for ($j = 1; $j <= 4; $j++) {
                    if ($request->hasFile("soal.$i.pilihan.$j.image")) {
                        $choiceImage = $request->file("soal.$i.pilihan.$j.image");
                        $choicePath = $choiceImage->store('pilihan_images', 'public');
                        $soalDataToSave["pilihan_" . $j] = $choicePath; // Override text with image path if image uploaded
                    }
                }

                // Create and save new Soal record with prepared data
                $soal = Soal::create($soalDataToSave);
            }

            DB::commit();
            return redirect()->back()->with('success', 'All questions saved successfully');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()
                ->with('error', 'Failed to save: ' . $e->getMessage())
                ->withInput();
        }
    }
}
