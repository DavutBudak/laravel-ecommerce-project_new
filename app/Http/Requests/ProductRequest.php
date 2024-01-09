<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class ProductRequest extends FormRequest
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




       public function rules(): array
       {
        return [
            "category_id" => "required|numeric",
            "name" => "required",
            "price" => "required|numeric",
            "old_rice" => "required|numeric|sometimes",
            "lead" => "required|min:10",

        ];
    }



    public function messages()
    {
        return[
            "category_id.required" => "Bu alan zorunludur.",
            "category_id.numeric" => "Bu alan zorunludur",
            "name.required" => "Bu alan zorunludur.",
                "price.required" => "Bu alan zorunludur.",
            "price.numeric" => "Bu alan sayısal olmalıdır.",

              "old_rice.required" => "Bu alan zorunludur.",
            "old_rice.numeric" => "Bu alan sayısal olmalıdır.",

            "lead.required" => "Bu alan zorunludur.",
            "lead.min" => "Adres alanı en az 10 karakterden oluşmalıdır.",
        ];
    }


    protected function passedValidation()
    {
        if (!$this->request->has("slug")) {
            $name = $this->request->get("name");
            $slug = Str::of($name)->slug();
            $this->request->set("slug", $slug);
        }
    }


}
