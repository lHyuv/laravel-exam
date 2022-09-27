<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Product;

class ProductController extends Controller
{
    //
      
        public function index(){
            
            $data = Product::all();
    
            return [
                'message' => 'Successfully retrieved',
                'data' => $data
            ];
        }
    

    
        public function show($id){
            $data = Product::find($id);
    
            return [
                'message' => 'Successfully retrieved',
                'data' => $data
            ];
        }
    

        public function find_by_category($category){
            $data = Product::where('category', $category)->get();
    
            return [
                'message' => 'Successfully retrieved',
                'data' => $data
            ];
        }

        public function create(Request $request){
            
            $validator = Validator::make($request->all(), [
                'name' => ['required', 'string'],
                'category' => ['required', 'integer'],
                'description' => ['string'],
            ]);
    
            if($validator->fails()){
                return ['message' => [$validator->errors()]];       
            }
    
            $data =  Product::create($request->all());
            return [
                'message' => 'Successfully created',
                'data' => $data
            ];
        }
    
        public function update(Request $request, $id){
            $data = Product::findOrFail($id);
            $data->update($request->all());
    
            return [
                'message' => 'Successfully updated',
                'data' => $data
            ];  
        }
    
        public function delete(Request $request, $id){
            $data = Product::findOrFail($id);
    
   
            $data->delete();
          
            return [
                'message' => 'Successfully deleted'
            ];
        }
}
