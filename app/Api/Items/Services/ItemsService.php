<?php

namespace App\Api\Items\Services;

use App\Models\Item;
use App\Api\Base\Traits\HttpResponses;
use App\Api\Items\Requests\CreateItemRequest;
use App\Api\Items\Http\Resources\ItemsResource;

class ItemsService
{
    use HttpResponses;

    public function getAllItems($request)
    {
        $query = Item::isPublished();

        if(isset($request->section)){
            $query->where('section',$request->section);
        }
        if(isset($request->type)){
            $query->where('type',$request->type);
        }
        if(isset($request->condition)){
            $query->where('condition',$request->condition);
        }
        if(isset($request->stock)){
            $query->where('stock',$request->stock);
        }
        if(isset($request->min_price)){
            $query->where('price','>=',$request->min_price);
        }
        if(isset($request->max_price)){
            $query->where('price','<=',$request->max_price);
        }
        if(isset($request->country)){
            $query->where('country_id',$request->country);
        }
        if(isset($request->city)){
            $query->where('city_id',$request->city);
        }
        if(isset($request->category)){
            $query->where(function ($subQuery) use ($request) {
                $subQuery->where('category_id',$request->category)
                ->orWhere('subcategory_id',$request->category);
            });
        }

        if(isset($request->sort)){
            if($request->sort == "recent"){
                $query->orderBy('created_at', 'desc');
            }else{
                $query->orderBy('created_at', 'asc');
            }
        }else{
            $query->orderBy('created_at', 'desc');
        }

        
        return ItemsResource::collection(
           $query->with('country','city','currency')->paginate($request->limit ?? 15)
        )->additional($this->successAdditional());
    }

    public function searchItems($request)
    {
        if(!empty($request->keyword)){          
            $items = Item::where("title", 'like', '%' . $request->keyword . '%')->paginate($request->limit ?? 15);
        }else{
            $items = Item::paginate($request->limit ?? 15);
        }
        return ItemsResource::collection(
            $items
        )->additional($this->successAdditional());
    }


    public function getItem($slug)
    {
        $result = new ItemsResource(
            Item::where("slug",$slug)->first()
        );
        return $this->success($result);
    }


    public function createItem(CreateItemRequest $request)
    {
        $request->validated($request->all());
        $item = Item::create([
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'price' => $request->price,
            'category_id'  => $request->category_id,
            'subcategory_id' => $request->subcategory_id ?? null,
            'country_id' => $request->country_id,
            'city_id' => $request->city_id,
            'currency_id' => $request->currency_id,
            'contact_number'  => $request->contact_number,
            'type' => $request->type,
            'condition' => $request->condition,
            'stock' => $request->stock,
            'section'  => $request->section,
            "published_at" => $request->published_at,
        ]);
        $result = new ItemsResource(
           $item
        );
        return $this->success($result);
    }

}
