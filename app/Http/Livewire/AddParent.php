<?php

namespace App\Http\Livewire;

use App\Models\Blood;
use App\Models\Image;
use App\Models\MyParent;
use App\Models\Nationality;
use App\Models\Religion;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithFileUploads;

class AddParent extends Component
{

    use WithFileUploads;

    public $catchError;
    public $updateMode = false;
    public $photos , $parent_id , $show_table = true;

    public $currentStep = 1,
    // Father_INPUTS
    $email, $password,
    $Name_Father, $Name_Father_en,
    $National_ID_Father, $Passport_ID_Father,
    $Phone_Father, $Job_Father, $Job_Father_en,
    $Nationality_Father_id, $Blood_Father_id,
    $Address_Father, $Address_Father_en, $Religion_Father_id,

    // Mother_INPUTS
    $Name_Mother, $Name_Mother_en,
    $National_ID_Mother, $Passport_ID_Mother,
    $Phone_Mother, $Job_Mother, $Job_Mother_en,
    $Nationality_Mother_id, $Blood_Mother_id,
    $Address_Mother, $Address_Mother_en, $Religion_Mother_id;


    public function render()
    {
        return view('livewire.add-parent', [
            'Nationalities' => Nationality::all(),
            'Type_Bloods' => Blood::all(),
            'Religions' => Religion::all(),
            'my_parents' => MyParent::all(),
        ]);
    }

    // Real time validation
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName, [
            'email' => 'required|email',
            'National_ID_Father' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Father' => 'min:10|max:10',
            'Phone_Father' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'National_ID_Mother' => 'required|string|min:10|max:10|regex:/[0-9]{9}/',
            'Passport_ID_Mother' => 'min:10|max:10',
            'Phone_Mother' => 'regex:/^([0-9\s\-\+\(\)]*)$/|min:10'
        ]);
    }


    //firstStepSubmit
    public function firstStepSubmit()
    {
        $this->validate([
            'email' => 'required|unique:my_parents,email,'.$this->id,
            'password' => 'required',
            'Name_Father' => 'required',
            'Name_Father_en' => 'required',
            'Job_Father' => 'required',
            'Job_Father_en' => 'required',
            'National_ID_Father' => 'required|unique:my_parents,National_ID_Father,' . $this->id,
            'Passport_ID_Father' => 'required|unique:my_parents,Passport_ID_Father,' . $this->id,
            'Phone_Father' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'Nationality_Father_id' => 'required',
            'Blood_Father_id' => 'required',
            'Religion_Father_id' => 'required',
            'Address_Father' => 'required',
            'Address_Father_en' => 'required',
        ]);

        $this->currentStep = 2;
    }


    //secondStepSubmit
    public function secondStepSubmit()
    {
        $this->validate([
            'Name_Mother' => 'required',
            'Name_Mother_en' => 'required',
            'National_ID_Mother' => 'required|unique:my_parents,National_ID_Mother,' . $this->id,
            'Passport_ID_Mother' => 'required|unique:my_parents,Passport_ID_Mother,' . $this->id,
            'Phone_Mother' => 'required',
            'Job_Mother' => 'required',
            'Job_Mother_en' => 'required',
            'Nationality_Mother_id' => 'required',
            'Blood_Mother_id' => 'required',
            'Religion_Mother_id' => 'required',
            'Address_Mother' => 'required',
            'Address_Mother_en' => 'required',
        ]);

        $this->currentStep = 3;
    }


    public function submitForm(){

        DB::beginTransaction();

        try {
            $My_Parent = new MyParent();
            // Father_INPUTS
            $My_Parent->email = $this->email;
            $My_Parent->password = Hash::make($this->password);
            $My_Parent->Name_Father = ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father];
            $My_Parent->National_ID_Father = $this->National_ID_Father;
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Phone_Father = $this->Phone_Father;
            $My_Parent->Job_Father = ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father];
            $My_Parent->Passport_ID_Father = $this->Passport_ID_Father;
            $My_Parent->Nationality_Father_id = $this->Nationality_Father_id;
            $My_Parent->Blood_Father_id = $this->Blood_Father_id;
            $My_Parent->Religion_Father_id = $this->Religion_Father_id;
            $My_Parent->Address_Father = ['en' => $this->Address_Father_en, 'ar' => $this->Address_Father];

            // Mother_INPUTS
            $My_Parent->Name_Mother = ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother];
            $My_Parent->National_ID_Mother = $this->National_ID_Mother;
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Phone_Mother = $this->Phone_Mother;
            $My_Parent->Job_Mother = ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother];
            $My_Parent->Passport_ID_Mother = $this->Passport_ID_Mother;
            $My_Parent->Nationality_Mother_id = $this->Nationality_Mother_id;
            $My_Parent->Blood_Mother_id = $this->Blood_Mother_id;
            $My_Parent->Religion_Mother_id = $this->Religion_Mother_id;
            $My_Parent->Address_Mother = ['en' => $this->Address_Mother_en, 'ar' => $this->Address_Mother];

            $My_Parent->save();

            // in config->filesystems
            // 'upload_attachments' => [
            //     'driver' => 'local',
            //     'root' => public_path('/'),
            //     'url' => env('APP_URL').'/storage',
            //     'visibility' => 'public',
            // ],

            if(!empty($this->photos))
            {
                foreach($this->photos as $photo)
                {
                    $name = $photo->getClientOriginalName();
                    $photo->storeAs('attachments/Parents/'.$this->Name_Father . ' , ' .$this->Name_Mother , $name ,'upload_attachments');

                    // insert in images_table
                    $images= new Image();
                    $images->filename = $name;
                    $images->imageable_id = MyParent::latest()->first()->id;
                    $images->imageable_type = 'App\Models\MyParent';
                    $images->save();
                }
            }

            DB::commit();

            toastr()->success(trans('messages.Success'));
            $this->clearForm();
            $this->currentStep = 1;
            return redirect()->route('add_parent');
        }

        catch (\Exception $e) {
            DB::rollback();
            $this->catchError = $e->getMessage();
        };
    }


    public function showformadd(){
        $this->show_table = false;
    }


    public function clearForm()
    {
        $this->email = '';
        $this->password = '';
        $this->Name_Father = '';
        $this->Name_Father_en = '';
        $this->Job_Father = '';
        $this->Job_Father_en = '';
        $this->Address_Father ='';
        $this->Address_Father_en ='';
        $this->National_ID_Father ='';
        $this->Passport_ID_Father = '';
        $this->Phone_Father = '';
        $this->Nationality_Father_id = '';
        $this->Blood_Father_id = '';
        $this->Religion_Father_id ='';

        $this->Name_Mother = '';
        $this->Name_Mother_en = '';
        $this->Job_Mother = '';
        $this->Job_Mother_en = '';
        $this->Address_Mother ='';
        $this->Address_Mother_en ='';
        $this->National_ID_Mother ='';
        $this->Passport_ID_Mother = '';
        $this->Phone_Mother = '';
        $this->Nationality_Mother_id = '';
        $this->Blood_Mother_id = '';
        $this->Religion_Mother_id ='';
    }


    public function edit($id)
    {
        $this->show_table = false;
        $this->updateMode = true;
        $My_Parent = MyParent::where('id',$id)->first();
        $this->parent_id = $id;
        $this->email = $My_Parent->email;
        $this->password = $My_Parent->password;
        $this->Name_Father = $My_Parent->getTranslation('Name_Father', 'ar');
        $this->Name_Father_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Father = $My_Parent->getTranslation('Job_Father', 'ar');
        $this->Job_Father_en = $My_Parent->getTranslation('Job_Father', 'en');
        $this->Address_Father =$My_Parent->getTranslation('Address_Father', 'ar');
        $this->Address_Father_en =$My_Parent->getTranslation('Address_Father', 'en');
        $this->National_ID_Father =$My_Parent->National_ID_Father;
        $this->Passport_ID_Father = $My_Parent->Passport_ID_Father;
        $this->Phone_Father = $My_Parent->Phone_Father;
        $this->Nationality_Father_id = $My_Parent->Nationality_Father_id;
        $this->Blood_Father_id = $My_Parent->Blood_Father_id;
        $this->Religion_Father_id =$My_Parent->Religion_Father_id;

        $this->Name_Mother = $My_Parent->getTranslation('Name_Mother', 'ar');
        $this->Name_Mother_en = $My_Parent->getTranslation('Name_Father', 'en');
        $this->Job_Mother = $My_Parent->getTranslation('Job_Mother', 'ar');;
        $this->Job_Mother_en = $My_Parent->getTranslation('Job_Mother', 'en');
        $this->Address_Mother =$My_Parent->getTranslation('Address_Mother', 'ar');
        $this->Address_Mother_en =$My_Parent->getTranslation('Address_Mother', 'en');
        $this->National_ID_Mother =$My_Parent->National_ID_Mother;
        $this->Passport_ID_Mother = $My_Parent->Passport_ID_Mother;
        $this->Phone_Mother = $My_Parent->Phone_Mother;
        $this->Nationality_Mother_id = $My_Parent->Nationality_Mother_id;
        $this->Blood_Mother_id = $My_Parent->Blood_Mother_id;
        $this->Religion_Mother_id =$My_Parent->Religion_Mother_id;
    }



    //firstStepSubmit
    public function firstStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 2;
    }

    //secondStepSubmit_edit
    public function secondStepSubmit_edit()
    {
        $this->updateMode = true;
        $this->currentStep = 3;
    }

    public function submitForm_edit(){

        if ($this->parent_id){
            $parent = MyParent::find($this->parent_id);
            $parent->update([
                'email' => $this->email,
                'password' => $this->password,

                'Name_Father' => ['en' => $this->Name_Father_en, 'ar' => $this->Name_Father],
                'Job_Father' => ['en' => $this->Job_Father_en, 'ar' => $this->Job_Father],
                'Address_Father' => ['en' => $this->Address_Father_en, 'ar' => $this->Address_Father],
                'National_ID_Father' => $this->National_ID_Father,
                'Passport_ID_Father' => $this->Passport_ID_Father,
                'Phone_Father' => $this->Phone_Father,
                'Nationality_Father_id' => $this->Nationality_Father_id,
                'Blood_Father_id' => $this->Blood_Father_id,
                'Religion_Father_id' => $this->Religion_Father_id,

                'Name_Mother' => ['en' => $this->Name_Mother_en, 'ar' => $this->Name_Mother],
                'Job_Mother' => ['en' => $this->Job_Mother_en, 'ar' => $this->Job_Mother],
                'Address_Mother' => ['en' => $this->Address_Mother_en, 'ar' => $this->Address_Mother],
                'National_ID_Mother' => $this->National_ID_Mother,
                'Passport_ID_Mother' => $this->Passport_ID_Mother,
                'Phone_Mother' => $this->Phone_Mother,
                'Nationality_Mother_id' => $this->Nationality_Mother_id,
                'Blood_Mother_id' => $this->Blood_Mother_id,
                'Religion_Mother_id' => $this->Religion_Mother_id,
            ]);
        }

        toastr()->success(trans('messages.Update'));
        return redirect()->route('add_parent');
    }


    //back
    public function back($step)
    {
        $this->currentStep = $step;
    }
}