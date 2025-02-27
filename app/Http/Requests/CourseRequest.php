<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CourseRequest extends FormRequest
{
    protected array $rules = [
        'grade_id'        => 'required|exists:grades,id',
        'title'           => 'required|string',
        'sub_title'       => 'required|string',
        'price'           => 'required|numeric',
        'sale_price'      => 'nullable|numeric',
        'video_url'       => 'nullable|string',
        'description'     => 'nullable|string',
        'image'           => 'required|image|mimes:jpeg,png,jpg,gif',
        // 'sections'        => 'required|array', // Ensure 'sections' is an array
//        'name' => 'required|array', // Validate each section name
//        'name.*' => 'required|string', // Validate each section name
        // 'details' => 'required|array', // Ensure 'details' is an array
        // 'details.*' => 'required|string', // Ensure 'details' is an array
        // 'section_title' => 'required|array',
        // 'section_title.*' => 'required|string',
        // 'url' => 'required|array',
        // 'url.*' => 'required|string',
        // 'type' => 'required|array',
        // 'type.*' => 'required|string|in:video,test,pdf',
    ];
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function onUpdate(): array
    {
        $this->rules['image'] = 'sometimes|nullable|image|mimes:jpeg,png,jpg,gif';
        return $this->rules;
    }
    protected function onCreate(): array
    {
        return $this->rules;
    }
    public function rules(): array
    {
        return request()->isMethod('put') || request()->isMethod('patch') ?
        $this->onUpdate() : $this->onCreate();
    }


}
