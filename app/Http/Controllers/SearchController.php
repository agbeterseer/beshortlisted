<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Document;
use App\Region;
use App\City;
use App\Profession;
use App\DocumentProfession;
use App\SortCategory;
use Auth;
use Response;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

     //dd($request->all());
        //get all cvs' mapped to professions
        $document_profession = DB::table('document_profession')->get();

        $s = $request->input('s');

        $years_of_experience = $request->years_of_experience;
        $sort_category = $request->sort_category;
        $profession = $request->profession;
        $location = $request->location;

        $default_profession = '...select one...';
        $default_city = '... select one ...';
        $default_cat = '... select one ...';

        $document_professions = DB::table('document_profession')->get();
        $professions = Profession::all();
        $profession = Profession::findOrFail($profession);
         
        $cities = City::all();
        $sort_categories_list = DB::table('sort_categories')->get();
       
        if ($years_of_experience !=null &&  $sort_category !=null && $location !=null ) {
        // get the single record for a city
        $location = City::findOrFail($location);
 
        $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)->where('sort_by_cat', $sort_category)->where('city_id', $location->id)->paginate(20);
        
        return view('admin.search.index', compact('profession', 'sort_categories_list','documents', 's', 'professions', 'cities', 'location', 'sort_category', 'years_of_experience', 'profession_document','document_professions') ,array('user' => Auth::user()));

        }elseif($years_of_experience !=null &&  $sort_category == null &&  $location == null){
           // / dd('here');

            //dd($request->all());
            $default_profession = '...select one...';
            $default_city = '... select one ...';
            $default_cat = '... select one ...';
            //$years_of_experience = $request->input('years_of_experience');

 $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)->paginate(20);
           
 return view('admin.search.index', compact('default_cat', 'default_city','default_profession','profession', 'sort_categories_list','documents', 's', 'professions', 'cities', 'location', 'sort_category', 'years_of_experience', 'profession_document','document_professions') ,array('user' => Auth::user()));
        }elseif ($years_of_experience !=null &&  $sort_category != null && $location ==null) {

            $default_profession = '...select one...';
            $default_city = '... select one ...';
            $default_cat = '... select one ...';
          
         //$profession = Profession::findOrFail($profession);
 

 $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)->where('sort_by_cat', $sort_category)->paginate(20);
           
 return view('admin.search.index', compact('profession', 'default_cat', 'default_city','default_profession','profession', 'sort_categories_list','documents', 's', 'professions', 'cities', 'location', 'sort_category', 'years_of_experience', 'profession_document','document_professions') ,array('user' => Auth::user()));


        }elseif ($years_of_experience !=null &&  $sort_category == null && $location !=null) {

         
 

            # code...
        }elseif ($profession !=null &&  $sort_category == null && $location == null && $years_of_experience == null) {


    $profession = Profession::findOrFail($profession);
    $documents = Document::all();
    $document_professions = DB::table('document_profession')->where('profession_id', $profession->id)->paginate(20);
        //dd($document_professions);
 return view('admin.search.fliter_by_profession', compact('profession', 'default_cat', 'default_city','default_profession','profession', 'sort_categories_list','documents', 's', 'professions', 'cities', 'location', 'sort_category', 'years_of_experience', 'profession_document','document_professions') ,array('user' => Auth::user()));

        }

        // else{
        // $documents = Document::latest()
        // ->search($s)
        // ->paginate(20);
        // }


    return view('document.index', compact('sort_categories_list','documents', 's', 'professions', 'cities') ,array('user' => Auth::user()));
    }





    public function SearchByCreteria(Request $request){
        
        dd($request->all());
    return view('admin.search.index', compact(['professions','documents']) ,array('user' => Auth::user()));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function customSearch(Request $request)
    {
        dd($request->al());

        $s = $request->input('s');
        $documents = Document::latest()
        ->search($s)
        ->paginate(20);
        $professions = Profession::all();
        $cities = City::all();
        $sort_categories_list = DB::table('sort_categories')->get();

        $documents = DB::table('documents')->where('years_of_experience', $years_of_experience)->where('sort_by_cat', $sort_category)->where('city_id',  $location)->get();
      

    return view('admin.document.custom_search', compact('sort_categories_list','documents', 's', 'professions', 'cities'), array('user' => Auth::user()));
    }
/*Name of the document file*/
  

    /**Function to extract text*/
    function extracttext(Request $filename) {
    //Check for extension
     $file=$filename->file('extract');
        
         $fileName = $file->getClientOriginalName();
    $ext = end(explode('.', $file));
 
    //if its docx file
    if($ext == 'docx')
    $dataFile = "word/document.xml";
    //else it must be odt file
    else
    $dataFile = "content.xml";     
       
    //Create a new ZIP archive object
    $zip = new ZipArchive;
 
    // Open the archive file
    if (true === $zip->open($file)) {
        // If successful, search for the data file in the archive
        if (($index = $zip->locateName($dataFile)) !== false) {
            // Index found! Now read it to a string
            $text = $zip->getFromIndex($index);
            // Load XML from a string
            // Ignore errors and warnings
            $xml = DOMDocument::loadXML($text, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
            // Remove XML formatting tags and return the text
            return strip_tags($xml->saveXML());
        }
        //Close the archive file
        $zip->close();
    }
 
    // In case of failure return a message
    return "File not found";
}

 

function doc_to_text(Request $request){
            $file=$request->file('extract');
        
         $fileName = $file->getClientOriginalName();
 
    $file_handle = fopen($file, "r"); //open the file
    
    $stream_text = @fread($file_handle, filesize($file));
    $stream_line = explode(chr(0x0D),$stream_text);
    $output_text = "";
    foreach($stream_line as $single_line){
        $line_pos = strpos($single_line, chr(0x00));
        if(($line_pos !== FALSE) || (strlen($single_line)==0)){
            $output_text .= "";
        }else{

            $output_text .= $single_line." ";
              //dd($file_handle);
        }
    }
    $output_text = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $output_text);
    return $output_text;
}


// tested and working

 function read_doc(Request $request) {

      $file=$request->file('extract');
        
   $fileName = $file->getClientOriginalName();
 

    $line_array = array();
    $fileHandle = fopen( $file, "r" );
    $line       = @fread( $fileHandle, filesize( $file ) );
    $lines      = explode( chr( 0x0D ), $line );
    $outtext    = "";
    foreach ( $lines as $thisline ) {
        $pos = strpos( $thisline, chr( 0x00 ) );
        if (  $pos !== false )  {

        } else {
            $line_array[] = preg_replace( "/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", "", $thisline );

        }
    }

    return implode("\n",$line_array);
}


public function convertToText(Request $request)
    {
         $this->validate($request, [
            'extract' => 'required']);
         $file=$request->file('extract');
        
         $fileName = $file->getClientOriginalName();
  dd($file);
        if (isset($request->extract) && !file_exists($request->extract)) {
            return 'File Does Not exists';
        }
       

        $fileInformation = pathinfo($request->extract);
        dd($fileInformation);
        $extension = $fileInformation['extension'];
        if ($extension == 'doc' || $extension == 'docx') {
            if ($extension == 'doc') {
                return $this->extract_doc();
            } elseif ($extension == 'docx') {
                return $this->extract_docx();
            }
        } else {
            return 'Invalid File Type, please use doc or docx word document file.';
        }
    }


// working too for only doc
 public function extract_doc(Request $request)
    {
             $file=$request->file('extract');
        
            $fileName = $file->getClientOriginalName();

 
        $fileHandle = fopen($file, 'r');
        $allLines = @fread($fileHandle, filesize($file));
        $lines = explode(chr(0x0D), $allLines);
        $document_content = '';
        foreach ($lines as $line) {
            $pos = strpos($line, chr(0x00));
            if (($pos !== false) || (strlen($line) == 0)) {
            } else {
                $document_content .= $line . ' ';
            }
        }
        $document_content = preg_replace("/[^a-zA-Z0-9\s\,\.\-\n\r\t@\/\_\(\)]/", '', $document_content);
        return $document_content;
    }



// working for 

    public function extract_docx(Request $request)
    {
       dd($request->all());
           $file=$request->file('extract');
            $fileName = $file->getClientOriginalName();
dd($fileName);
        $document_content = '';
        $content = '';

        $zip = zip_open($file);
        //dd($zip);

        if (!$zip || is_numeric($zip)) {
            return false;
        }

        while ($zip_entry = zip_read($zip)) {
            if (zip_entry_open($zip, $zip_entry) == false) {
                continue;
            }

            if (zip_entry_name($zip_entry) != 'word/document.xml') {
                continue;
            }

            $content .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

            zip_entry_close($zip_entry);
        }

        zip_close($zip);

        $content = str_replace('</w:r></w:p></w:tc><w:tc>', ' ', $content);
        $content = str_replace('</w:r></w:p>', "\r\n", $content);
        $document_content = strip_tags($content);

        return $document_content;
    }

/*New Search*/

    public function FilterByAge($value='')
    {
        # code...
    }

  public function FilterByLocation($value='')
    {
        # code...
    }

  public function FilterByLocation($value='')
    {
        # code...
    }

public function FilterByIndustry($value='')
    {
        # code...
    }
 public function fliterByProfession($value='')
    {
        # code...
    } 
    
  public function fliterByMiniSalary($value='')
    {
        # code...
    }  
   public function fliterByCareerLevel($value='')
    {
        # code...
    }    
   public function fliterByEducationalLevel($value='')
    {
        # code...
    }
    public function fliterByGender($value='')
    {
        # code...
    }  
// $keyword = Input::get('keyword', '');5.  Search by age, industry, location etc.
// $documents = Document::SearchByKeyword($keyword)->get();



}
