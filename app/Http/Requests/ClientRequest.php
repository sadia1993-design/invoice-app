<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
        return [
            'name'=> 'required|max:255|string',
            'username'=> 'required|max:255|string|unique:clients',
        ];
    }

    /**
     * Return data
     *
     * @return array
     */
    public function persist()
    {
        $data = [
            'name' => $this->name,
            'username' => $this->username,
            'email' => $this->email,
            'phone' => $this->phone,
            'country' => $this->country,
            'status' => $this->status
        ];
        if($this->hasFile('picture')) {
            $data['picture'] = 'uploads/clients/'.$this->uploadFile();
        }
        return $data;
    }

    /**
     * Return data
     *
     * @return array
     */
    public function uploadFile()
    {
        if($this->hasFile('picture')) {
            $file = $this->file('picture');
            $extension = $file->getClientOriginalExtension();
            $fileName = time().'.'.$extension;
            $file->move('uploads/clients/', $fileName);
            return $fileName;
        }
    }
}
