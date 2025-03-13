<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Citizen;

use Illuminate\Support\Facades\DB;
class Citizens extends Component
{

    public $totalSteps = 4;
    public $currentStep = 1;
    public $pointMap =
    [
        'benefit_points' => [
            'no_association_benefits' => 3,
            'no_municipality_benefits' => 3,
            'no_social_security' => 3,
            
            // Add more frameworks and their points as needed.
        ],
        'lose_points'=>[
            'unemployed_husband_no_reason'=>8,
            'husband_drugs'=>6,
            'high_income'=>6,
            'family_negative_reputation'=>4,
            'owns_land'=>4,
            'owns_vehicle'=>4,
            'owns_trees'=>2,
            'full_heal_card'=>1,
            

        ],
    ];

    public function mount(){
        $this->currentStep = 1;
    }
    public function increaseStep()
    {
        dd('ff');
    }
    public function render()
    {
        $citizens = DB::table('citizens')->whereNull('deleted_at')->orderBy('total_points', 'desc')->simplePaginate(7);

         return view('livewire.citizens', ['citizens' => $citizens])
        ->layout('home')
        ->slot('slot');
        
    }
    public function destroy($id)
    {
        $citizen = Citizen::find($id);
          $citizen->delete();
        //$deletedRow= DB::table('citizens')->where('id', $id)->delete();
       return redirect('/home')->with('message', 'تم حذف البيانات بنجاح');
    }
    public function edit($id)
{
    
    
    return redirect()->route('citizens.show', $id);
}
     public function show($id)
    {$citizen = Citizen::findOrFail($id);
        return view('edit-form', ['citizen'=>$citizen,'currentStep'=>$this->currentStep])
        ->layout('app')
      ->slot('slot') ;
      
    } 
   
    
}
