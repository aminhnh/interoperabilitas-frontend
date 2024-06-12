<?php

namespace App\Http\Controllers;

use App\Services\KantongDarahService;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    protected $client;
    public function __construct()
    {
        $this->client = new Client(['base_uri' => env('EXTERNAL_API_BASE_URL')]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $response = $this->client->request('GET', '/api/darah');
            // $content = $response->getBody()->getContents();
            // $contentArray = json_decode($content, true);
            // $kantongdarah = $contentArray['data'];
            // return view('kantongdarah.index', compact('kantongdarah'));
            $responseData = json_decode($response->getBody()->getContents(), true);
            return view('kantongdarah.index', ["kantongdarah" => $responseData['data']]);
        } catch (GuzzleException $e) {
            return view('kantongdarah.index', ["kantongdarah" => $responseData['data']])->with('error', $e->getMessage());
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kantongdarah.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            $response = $this->client->request('POST', '/api/darah', [
                'json' => $request->all(),
            ]);
            return redirect()->route('kantongdarah.index')->with('success', 'Data kantong darah berhasil ditambahkan');
        } catch (GuzzleException $e) {
            return redirect()->route('kantongdarah.index')->with('error', 'Gagal menyimpan data kantong darah. Silakan coba lagi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try {
            $response = $this->client->request('GET', "/api/darah/{$id}");
            $responseData = json_decode($response->getBody()->getContents(), true);
            return view('kantongdarah.show', ["kantongdarah" => $responseData['data']]);
        } catch (GuzzleException $e) {
            return redirect()->route('kantongdarah.index')->with('error', 'Gagal mengakses data kantong darah. Silakan coba lagi.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $response = $this->client->request('GET', "/api/darah/{$id}");
            $data = json_decode($response->getBody()->getContents(), true);
            if (isset($data['data'])) {
                return view('kantongdarah.edit', ['kantongdarah' => $data['data']]);
            } else {
                return redirect()->route('kantongdarah.index')->with('error', 'Gagal mengambil data kantong darah.');
            }
        } catch (GuzzleException $e) {
            return redirect()->route('kantongdarah.index')->with('error', 'Gagal mengambil data kantong darah. Silakan coba lagi nanti.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $response = $this->client->request('PUT', "/api/darah/{$id}", [
                'json' => $request->all(),
            ]);
            return redirect()->route('kantongdarah.show', ['id' => $id])->with('success', 'Data kantong darah berhasil diperbarui');
        } catch (GuzzleException $e) {
            return redirect()->route('kantongdarah.show')->with('error', 'Gagal mengupdate data kantong darah. Silakan coba lagi.');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $response = $this->client->request('DELETE', "/api/darah/{$id}");
            return redirect()->route('kantongdarah.index')->with('success', 'Data kantong darah berhasil dihapus');
        } catch (GuzzleException $e) {
            return redirect()->route('kantongdarah.index')->with('error', 'Gagal menghapus data kantong darah. Silakan coba lagi.');
        }
    }

    public function showLembaga()
    {
        return view('lembaga.lembaga');
    }
}
