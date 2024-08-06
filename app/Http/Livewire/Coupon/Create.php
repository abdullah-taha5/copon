<?php

namespace App\Http\Livewire\Coupon;

use App\Models\Coupon;
use Livewire\Component;

class Create extends Component
{
    public Coupon $coupon;

    public function mount(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->coupon->total_views_limit = '0';
        $this->coupon->daily_views_limit = '0';
    }

    public function render()
    {
        return view('livewire.coupon.create');
    }

    public function submit()
    {
        $this->validate();

        $this->coupon->save();

        return redirect()->route('admin.coupons.index');
    }

    protected function rules(): array
    {
        return [
            'coupon.coupon' => [
                'string',
                'max:16',
                'nullable',
            ],
            'coupon.total_views_limit' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'coupon.daily_views_limit' => [
                'integer',
                'min:-2147483648',
                'max:2147483647',
                'nullable',
            ],
            'coupon.started_at' => [
                'nullable',
                'date_format:'.config('project.datetime_format'),
            ],
            'coupon.expire_at' => [
                'nullable',
                'date_format:'.config('project.datetime_format'),
            ],
        ];
    }
}
