<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\img;
use App\discrip;
use DB;

class store extends Controller
{
   public function storeImg(Request $request){
         // dd($request->all());
         $imgOb = new img;
         $disOb = new discrip;

        $this->validate($request,[
           'imgtitle'=>'required|max:50|min:3',
           'imagediscription'=>'required|max:2000|min:10',
           'imagefile'=> 'image|required|mimes:jpeg|max:2048'
        ]);
        $imgOb->imagename=$request->imgtitle;
        $disOb->discription=$request->imagediscription;
      //   $disOb->image=$request->image;

      // dd($request->all());
        
       if ($request->hasfile('imagefile')) {
            // echo "ok";
            $file=$request->file('imagefile');
            $extension = $file->getClientOriginalExtension();//getting image extension
            $filename=time().'.'.$extension; //rename with  current time 
            $file->move('uploads/img/',$filename);
            $disOb->image =$filename ;

         }else{
            // return $request;
            $disOb->image='';
            // echo "not ok";

         }
         $disOb->save();
         $imgOb->save();
        

        $dataImg = img::all();  /// data will save in this variable ///

      //   return view('home')->with('dataimg',$dataImg);
      //   return redirect()->back()->with('dataimg',$dataImg);


      return redirect('/home')->with('dataimg',$dataImg);


      //   $dataDis = discrip::all();  /// all daata will save in variable ///
         
         // return view('home')->with('datadis',$dataDis);
        

        //dd($dataDis);
        //return redirect()->back();
        //return view('');
   }



   public function readImg($id){
      $data = DB::table('discrips')
            ->join('imgs','imgs.id','=','discrips.id')
            ->select('discrips.discription','discrips.image','imgs.imagename')
            ->where('imgs.id','=',$id)
            ->get();

         
      return view('read')->with('viewit',$data);
      //   dd($data); 
   }


   // public function update($id){
   //    $findtb1 = img::find($id);
   //    $findtb2 = discrip::find($id);
         // return view('update')->with('updata1',$findtb1);
   //      // return view('update')->with('updata2',$findtb2);
   //      // return view('update',compact(['findtb1','findtb2']));
   //      return view('update')->with('updata1',$findtb1);

   // }

   public function deleteImg($id){
     $val1 =  img::find($id);
     $val2 =  discrip::find($id);
     $val1->delete();
     $val2->delete();
      return redirect()->back();
       
   }


public function update(Request $request){
   $name = $request->upname;
   $dis = $request->updis;
   $idd = $request->id;
   $val1 =  img::find($idd);
   $val2 =  discrip::find($idd);
   $val1->imagename = $name;
   $val2->discription = $dis;


   $val1->save();
   $val2->save();
   $dataImg = img::all();
return redirect('home/')->with('dataimg',$dataImg);

}

   



}
