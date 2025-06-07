<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostFlowerRequest;
use App\Services\FlowerService;
use Exception;
use Illuminate\Http\Request;

class FlowerController extends Controller
{
    protected $flowerService;

    public function __construct(FlowerService $flowerService){
        $this->flowerService = $flowerService;
    }


    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostFlowerRequest $request)
    {   
        try {
            $validatedData = $request->validated();
            $newFlower = $this->flowerService->store($validatedData);
            return response()->json([
                'Message' => 'Flower Created Successfully',
                'data' => $newFlower,
            ], 201);

        } catch (Exception $error) {
            return response()->json(['Error' => $error->getMessage()], 500);
        }
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
