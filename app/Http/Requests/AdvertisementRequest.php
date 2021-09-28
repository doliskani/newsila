<?php

namespace App\Http\Requests;

use App\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AdvertisementRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if (request()->category_id == "none"){
            return [
                'url'       => 'required|url',
                'image'     => 'required|url',
                'position'  => ['required',
                    Rule::in(['center', 'right'])
                ],
                'ad_number' => ['required',
                    Rule::in([
                        '1', '2', '3', '4',
                        '5', '6', '7', '8',
                    ])
                ],

            ];
        }

        return [
            'url'       => 'required|url',
            'image'     => 'required|url',
            'category_id' => ['required',
                Rule::in(array_merge(Category::all()->pluck("_id")->toArray() , ['other']))
            ],

        ];

    }
}
