<?php
namespace App\Livewire;

use Livewire\Component;
use App\Models\SubCategory as SubCategoryModel;
use App\Models\Models;
use App\Models\SubCategoryModel as ModelsSubCategoryModel;
use Livewire\WithPagination;

class Subcategory extends Component
{
    use WithPagination;

    public $subcategoryKey;

    public function mount($subcategoryKey)
    {
        $this->subcategoryKey = $subcategoryKey;
    }

    public function render()
    {
        $subcategory = ModelsSubCategoryModel::where('key', $this->subcategoryKey)->first();
        $items = Models::where('sub_category', $subcategory->id)->paginate(9);

        return view('livewire.subcategory', compact('items'));
    }
}
