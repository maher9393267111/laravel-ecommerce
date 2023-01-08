<?php

namespace App\Http\Livewire\Admin\Brands;

use App\Models\Brand;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class Index extends Component
{
    public function render()
    {
     //   return view('livewire.admin.brands.index');

        $brands = Brand::orderBy('id', 'DESC')->paginate(10);
        return view('livewire.admin.brands.index', ['brands' => $brands]);
    }
}
