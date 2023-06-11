<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class AssetController extends Controller
{
    //
     public function detail($id) {
        $data = Asset::find($id);
        return response()->json([
            'code' => 200,
            'message' => 'Success',
            'data' => $data
        ], 200);
    }

    public function register(Request $request){
    // {
        $validatedData = $request->validate([
            'name' => ['string'],
            'location' => ['string'],
            'as_number' => ['string'],
            'dns' => ['string'],
            'organization_id' => ['integer'],
            'sensor_id' => ['integer'],
            'pic'=> ['integer'],
            'description' => ['string']
        ]);

            // var_dump($request->all());

        // try {
            $asset = Asset::create([
                'name' => $validatedData['name'],
                'organization_id' => $validatedData['organization_id'],
                'location' => $validatedData['location'],
                'as_number' => $validatedData['as_number'],
                'dns' => $validatedData['dns'],
                'sensor_id' => $validatedData['sensor_id'],
                'pic_id' => $validatedData['pic'],
                'description' => $validatedData['description']
            ]);

            return response()->json([
                'code ' => 201,
                'message' => 'registered',
                'data' => $asset
            ], 201);
        // } catch (\Exception $e) {
        //     return response()->json([
        //         'code' => 500,
        //         'message' => 'error',
        //         'data' => $e->getMessage()
        //     ], 500);
        // }
    }

    public function edit(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => ['string'],
            'location' => ['string'],
            'as_number' => ['string'],
            'dns' => ['string'],
            'organization_id' => ['integer'],
            'sensor_id' => ['integer'],
            'pic'=> ['integer'],
            'description' => ['string']
        ]);

        try {
            $asset = Asset::findOrFail($id);
            $asset->update([
                'name' => $validatedData['name'] ?? $asset->name,
                'location' => $validatedData['location'] ?? $asset->location,
                'as_number' => $validatedData['as_number'] ?? $asset->as_number,
                'dns' => $validatedData['dns'] ?? $asset->dns,
                'organization_id' => $validatedData['organization_id'] ?? $asset->organization_id,
                'sensor_id' => $validatedData['sensor_id'] ?? $asset->sensor_id,
                'pic_id' => $validatedData['pic'] ?? $asset->pic_id,
                'description' => $validatedData['description'] ?? $asset->description
            ]);

            return response()->json([
                'code ' => 201,
                'message' => 'updated',
                'data' => $asset
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'error',
                'data' => $e->getMessage()
            ], 500);
        }
    }

    public function delete($id)
    {
        try {
            $asset = Asset::findOrFail($id);
            $asset->delete();

            return response()->json([
                'code ' => 201,
                'message' => 'deleted',
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'error',
                'data' => $e->getMessage()
            ], 500);
        }
    }
}
