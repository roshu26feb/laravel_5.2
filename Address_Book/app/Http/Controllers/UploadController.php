<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use App\Upload;
use Auth;
use Illuminate\Support\Facades\Redirect;


class UploadController extends Controller
{
   /**
   * Display a listing of the resource.
   *
   * @return Response
   */
  public function index()
  {
    $Upload = Upload::all();
    $user = Auth::user();
    $userid = $user->id;
    $upload = Upload::where('user_id', '=', $userid)->get();
    return \View::make('upload.index', compact('upload'));
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return Response
   */
  public function create()
  {
    return \View::make('upload.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @return Response
   */
  public function store()
  {
     $input = Input::all();
	 
   echo '<pre>';
	 $dir = $this->dirToArray($input['url_path'],'No');
	 
   foreach ($dir as $key1 => $value1) {
      
      echo 'is parent';
      $data = array();
     
      if(is_array($value1))
      {
        $objUpload =  $this->save(array('type'=>"folder",'path'=>$key1));
        foreach ($value1 as $key2 => $value2) {
          $this->save(array('type'=>"file",'path'=>$key1.'/'.$value2 ,'parent_id' => $objUpload));
         
        }
      }
      else
      {
         $this->save(array('type'=>"file",'path'=>$value1));
      }
   }

   return redirect()->action('UploadController@index');     
  }

  public function save($input)
  {
     
        $user = Auth::user();
        if(isset($user)) {
          $userid = $user->id;
          $input['user_id'] = $userid;
          $objUpload = Upload::create($input);
           return $objUpload['id'];
        }
             
  }

        

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function show($id)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return Response
   */
  public function edit($id)
  {
    
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function update($id)
  {
        
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return Response
   */
  public function destroy($id)
  {
   
  }
  
  public function dirToArray($dir,$callback)
	{
		$result = array();
			$cdir = scandir($dir);
		  	foreach ($cdir as $key => $value) 
		   	{ 
		      	if (!in_array($value,array(".",".."))) 
		      	{ 
			        if (is_dir($dir . DIRECTORY_SEPARATOR . $value)) 
			        { 
			            $result[$value] = $this->dirToArray($dir . DIRECTORY_SEPARATOR . $value,'Yes'); 
		            	foreach ($result[$value] as $key1 => $value1) {
		            		if(is_array($value1))
		            		{
		            		}
		            		else
		            		{
		            			
				            	$path = $dir.'/'.$value.'/'.$value1;
				            	$key = $value.'/'.$value1;
                    
				            	
		            		}
	            		}	
			        } 
			       else 
			       { 
			       	 	$result[] = $value; 
			       	 	if($callback == 'No')
			       	 	{
				       	 	$path = $dir.'/'.$value;
			            	$key = $value;		            	
			            }
					
			        } 
			    } 
			} 
						   
			return $result; 
		}
		
  
}
