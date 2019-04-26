<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Http\Resources\Url as UrlResource;
use App\Traits\Rest;
use Validator;
use App\Url;

class UrlController extends Controller
{

    use Rest;

    /**
     * @param $key
     */
    public function getUrl($key)
    {
        try{
            $link = Url::where('key', $key)->firstOrFail();
            $link->accessed = $link->accessed + 1;
            $link->save();
    
            return redirect($link->url);
        }catch(\Exception $e){
            \abort(404);
        }
    }

    public function storeUrl(Request $request)
    {
        $validator = Validator::make($request->all(), ['url' => 'required|active_url']);

        if($validator->fails())
            return $this->error($validator->messages(), null);

        try{

            $url = new Url;
            $url->key = $this->generateKey();
            $url->url = $request->url;
            $url->save();
    
            return $this->success('success', route('getUrl', $url->key));

        }catch(\Exception $e){
            return $this->error('Unexpected error', $e);
        }
    }

    public function hot100()
    {
        try{
            return $this->success('Hot 100', UrlResource::collection(Url::Hot100()));
        }catch(\Exception $e){
            return $this->error('unexpected error', $e);
        }
    }

    public function generateKey() : String 
    {

        (int)$last_id = DB::table('urls')->latest('id')->first()->id;
        $dictionary = str_split("abcdefghijklmnopqrstuvwxyz0123456789");
	
        if ($last_id == 0)
            return $dictionary[0];
        
        $result = [];
        $base = count($dictionary);
        
        while ($last_id > 0)
        {
            $result[] = $dictionary[($last_id % $base)];
            $last_id = floor($last_id / $base);
        }
        
        $result = array_reverse($result);
        
        if((int)$last_id < 100000){
            return join("", $result) . join("", $result);
        }else{
            return join("", $result);
        }
    }

}
