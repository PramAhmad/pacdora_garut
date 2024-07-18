<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\CategoryModel;
use App\Models\Models;
use Livewire\WithPagination;

class Category extends Component
{
    use WithPagination;

    public $categoryKey;
    public $subcategoryKey;

    public function mount($categoryKey)
    {
        $this->categoryKey = $categoryKey;
    }

    public function setSubcategory($subcategoryKey)
    {
        $this->subcategoryKey = $subcategoryKey;
        $this->resetPage();
    }

    public function render()
    {
        $category = CategoryModel::where('key', $this->categoryKey)->with('subcategory')->first();
        $query = Models::query();

        if ($this->subcategoryKey) {
            $query->where('sub_category', $this->subcategoryKey);
        }

        $items = $query->paginate(9);

        return view('livewire.category', compact('category', 'items'));
    }
}
