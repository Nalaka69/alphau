<?php

namespace App\Http\Controllers\admin\library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\assetCategory;
class assetCategoryController extends Controller
{
    //storeCategory
    public function storeCategory(Request $request)
    {
        $data = $request->all();

        $request->validate([
            'newCategory' => 'required|string|max:255',        
        ]);
       
        $CreateAssetCategory = assetCategory::create([
            'category_name' => $data['newCategory'],
         ]);

         if($CreateAssetCategory){
            return response()->json([
                'status' => 'success',
                'message' => 'success'
            ], 200);
         }else{
            return response()->json([
                'status' => 'error',
                'message' => 'success'
            ],500);
         }
         
        
    }
}
